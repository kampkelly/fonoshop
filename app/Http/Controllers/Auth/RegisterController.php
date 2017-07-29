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
use Illuminate\Support\Facades\Mail;
use Image;

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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
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
                'email' => 'required|email|unique:users',
                'password'=> 'required|min:6',
                'product_title'=>'required|min:2',
                'price'=>'required',
                'photos'=>'required',
                'phone'=>'required',
                'condition'=>'required'
            ]);  

            $slug_title = request('product_title');
            $slug_random = rand();
            $slug_date = date("Y-m-d");
            $slug_combine = $slug_title.' '.$slug_random.' '.$slug_date;
            $slug_format = strtr($slug_combine, ' ', '-');
            $slug = $slug_format;

            foreach (request('photos') as $key=>$photo) {
                //uploading photo starts
                if($key == 1) {
                  //  $file=Input::file('photo');
                    $file = $photo;
                    $dd = $file->getClientOriginalName();
                    $file_basename = substr($dd, 0, strripos($dd, '.')); // get file name
                    $file_ext = substr($dd, strripos($dd, '.')); // get file extension
                    $t = date("i-s");
                    $newfilename = md5($file_basename) . $t . $file_ext;
                  //  Image::make($file)->resize(300, 300)->save(public_path('/uploads/'. $newfilename));
                    Image::make($file)->resize(1500, null, function ($constraint) {
                      $constraint->aspectRatio();
                  })->save(public_path('/uploads/'. $newfilename));
                 //   $file->move('uploads', $newfilename);
                }else {}
            }

           $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'status' => 'pending'
           ]);

           $product = Product::create([
            'title' => $request->product_title,
            'image' => $newfilename,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'phone' => $request->phone,
            'user_id' => $user->id,
            'slug' => $slug,
            'condition' => $request->condition,
            'status' => 'active'
        //    'address' => $request->address,
           ]);

            foreach (request('photos') as $key=>$photo) {
                //uploading photo starts
                if($key == 1) {

                }else {
                    $file = $photo;
                    $dd = $file->getClientOriginalName();
                    $file_basename = substr($dd, 0, strripos($dd, '.')); // get file name
                    $file_ext = substr($dd, strripos($dd, '.')); // get file extension
                    $t = date("i-s");
                    $filename = md5($file_basename) . $t . $file_ext;
                    Image::make($file)->resize(1500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('/uploads/'. $filename));
                  //  $file->move('uploads', $filename);
                    //uploading photo ends
                    ProductsPhoto::create([
                        'product_id' => $product->id,
                        'image' => $filename,
                        'user_id' => $user->id
                     ]);
                } 
            }
         /*   $email_data = array(
          //   'recipient' => $user->user_email,
             'recipient' => $request->email,
             'subject' => 'Thanks For Registering'
              );
            $view_data = array(
                'email' => $request->email,
            );

              Mail::send('emails.registered', $view_data, function($message) use ($email_data) {
                  $message->to( $email_data['recipient'] )
                          ->subject( $email_data['subject'] );
              });  */
            Auth::login($user);
        
            session()->flash('message', 'Thanks for registering!'); 
             return redirect('/');
           //  return redirect('/toverify_email');
    }

     public function bit_register(Request $request){
        $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password'=> 'required|min:6',
                'phone'=>'required',
                'price'=>'required',
                'currency'=>'required'
            ]);

            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'status' => 'pending'
           ]);

           $cryptocurrency = Cryptocurrency::create([
            'price' => $request->price,
            'currency' => $request->currency,
            'user_id' => $user->id
        //    'address' => $request->address,
           ]);  
           /*
           $email_data = array(
          //   'recipient' => $user->user_email,
             'recipient' => $request->email,
             'subject' => 'Thanks For Registering'
              );
            $view_data = array(
                'email' => $request->email,
            );

              Mail::send('emails.registered', $view_data, function($message) use ($email_data) {
                  $message->to( $email_data['recipient'] )
                          ->subject( $email_data['subject'] );
              }); */

           Auth::login($user);
            session()->flash('message', 'Thanks for registering!'); 
             return redirect('/');
    }

}
