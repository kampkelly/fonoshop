<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Product;
use App\ProductsPhoto;
use App\Cryptocurrency;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Category;
use App\Http\Controllers\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Jobs\WelcomeRegistrationEmail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
       // $this->middleware('guest')->except(' ');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

        public function toregister(Request $request)
    {
        $product_title = $request->product_title;
        $price = $request->price;
        return redirect('/register/'.$product_title.'/'.$price);
    }

    public function register(Request $request, $product_title, $price)
    {
        $cities = ['Airport Road', 'Aduwawa', 'Ekewan', 'G.R.A', 'Iguobazuwa', 'Ikpoba hill', 'Oka', 'Oluku', 'Ugbiyoko', 'Ugbowo', 'Upper Mission', 'Upper Sakponba', 'Uselu'];
        $categories = Category::all();
        $products = Product::where('status', 'active')->orderBy('id', 'desc')->simplePaginate(10);
        session()->flash('message', 'Thanks for filling the form, just a little more before submitting!');
        return view('auth.register', compact('categories', 'products', 'product_title', 'price', 'cities'));
    }

    public function newregister(Request $request)
    {
        $cities = ['Airport Road', 'Aduwawa', 'Ekewan', 'G.R.A', 'Iguobazuwa', 'Ikpoba hill', 'Oka', 'Oluku', 'Ugbiyoko', 'Ugbowo', 'Upper Mission', 'Upper Sakponba', 'Uselu'];
        $categories = Category::all();
        $products = Product::where('status', 'active')->orderBy('id', 'desc')->simplePaginate(10);
        return view('auth.register', compact('categories', 'products', 'cities'));
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function new_register(Request $request){

               $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required',
                'password'=> 'required|min:4',
                'product_title'=>'required',
                'price'=>'required',
                'image'=>'required',
                'phone'=>'required',
                'condition'=>'required'
            ]);  

            $user = User::where('email', '=', Input::get('email'))->first();
            if ($user === null) {

            $slug_title = request('product_title');
            $slug_random = rand();
            $slug_date = date("Y-m-d");
            $slug_combine = $slug_title.' '.$slug_random.' '.$slug_date;
            $slug_format = strtr($slug_combine, ' ', '-');
            $slug = $slug_format;

                    $file=Input::file('image');
                    $dd = $file->getClientOriginalName();
                    $file_basename = substr($dd, 0, strripos($dd, '.')); 
                    $file_ext = substr($dd, strripos($dd, '.')); 
                    $t = date("i-s");
                    $newfilename = md5($file_basename) . $t . $file_ext;
                    Image::make($file)->resize(1500, null, function ($constraint) {
                      $constraint->aspectRatio();
                  })->save(public_path('/uploads/'. $newfilename));               

           $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'status' => 'pending',
            'is_permission' => 0
           ]);

           $product = Product::create([
            'name' => $request->name,
            'title' => $request->product_title,
            'image' => $newfilename,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'phone' => $request->phone,
            'user_id' => $user->id,
            'slug' => $slug,
            'condition' => $request->condition,
            'state' => $request->state,
            'city' => $request->city,
            'status' => 'active'
           ]);

           if(Input::hasFile('photos')) {
            foreach (request('photos') as $key=>$photo) {
                //uploading photo starts
                    $file = $photo;
                    $dd = $file->getClientOriginalName();
                    $file_basename = substr($dd, 0, strripos($dd, '.')); 
                    $file_ext = substr($dd, strripos($dd, '.')); 
                    $t = date("i-s");
                    $filename = md5($file_basename) . $t . $file_ext;
                    Image::make($file)->resize(1500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('/uploads/'. $filename));
                    //uploading photo ends
                    ProductsPhoto::create([
                        'product_id' => $product->id,
                        'image' => $filename,
                        'user_id' => $user->id
                     ]);
            }
          }
            Auth::login($user);
         //   $this->dispatch(new WelcomeRegistrationEmail());
            $email_data = array(
             'recipient' => Auth::user()->email,
             'subject' => 'Welcome To SalesNaija'
              );
                $act_code = str_random(60);
                $view_data = array(
                'email' => Auth::user()->email,
                'name' => Auth::user()->name,
            );

              Mail::send('emails.welcomeregistration', $view_data, function($message) use ($email_data) {
                  $message->to( $email_data['recipient'] )
                          ->subject( $email_data['subject'] );
              }); 
            session()->flash('message', 'Thanks for registering!'); 
             return redirect('/home');
        }else{
           session()->flash('message', 'Email Already Exists'); 
                return redirect()->back();
        }
    }

     public function bit_register(Request $request){
        $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password'=> 'required|min:6',
                'phone'=>'required',
                'price'=>'required',
                'currency'=>'required',
                'city'=>'required'
            ]);

            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'city' => $request->city,
            'is_permission' => 0,
            'status' => 'pending'
           ]);

           $cryptocurrency = Cryptocurrency::create([
            'price' => $request->price,
            'currency' => $request->currency,
            'user_id' => $user->id
           ]);  
           
           $email_data = array(
             'recipient' => $request->email,
             'subject' => 'Welcome To SalesNaija'
              );
            $view_data = array(
                'email' => $request->email,
            );

              Mail::send('emails.welcomeregistration', $view_data, function($message) use ($email_data) {
                  $message->to( $email_data['recipient'] )
                          ->subject( $email_data['subject'] );
              }); 

           Auth::login($user);
            session()->flash('message', 'Thanks for registering, your cryptocurrency has been added!'); 
             return redirect('/cryptocurrencies');
    }

}
