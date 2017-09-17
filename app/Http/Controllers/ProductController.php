<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cryptocurrency;
use App\ProductsPhoto;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use App\Http\Controllers\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendTestEmail;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'search', 'show']]);
    }

      public function index()
    {
        $products = Product::where('status', 'active')->simplePaginate(15);
         return view('products.index', compact('products'));
    }

    public function create()
    {
         if( (checkPermission(['user'])) ){
            $cities = ['Airport Road', 'Aduwawa', 'Ekewan', 'G.R.A', 'Iguobazuwa', 'Ikpoba hill', 'Oka', 'Oluku', 'Ugbiyoko', 'Ugbowo', 'Upper Mission', 'Upper Sakponba', 'Uselu', 'Benin'];
              $categories = Category::all();
             return view('products.create', compact('categories', 'states', 'cities'));
         }else{
             session()->flash('message', 'Sorry, This operation is not allowed! Please login as user'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
                return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                'product_title' => 'required|max:255',
                'price' => 'required',
                'description'=> 'required',
                'phone'=>'required',
                'category_id'=>'required',
                'condition'=>'required'
            ]); 
        if( (checkPermission(['user'])) ){
            if(filesize(Input::file('image')) < 1000){
                session()->flash('message', 'Image too big');
                return redirect('/fileuploaderror');
            }else{
                if(Input::hasFile('image')){
                    $file=Input::file('image');
                    $dd = $file->getClientOriginalName();
                    $file_basename = substr($dd, 0, strripos($dd, '.')); 
                    $file_ext = substr($dd, strripos($dd, '.')); 
                    $t = date("i-s");
                    $newfilename = md5($file_basename) . $t . $file_ext;
                    Image::make($file)->resize(1500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('/uploads/cover/'. $newfilename));
                }
            }

                $slug_title = request('product_title');
                $slug_random = rand();
                $slug_date = date("Y-m-d");
                $slug_combine = $slug_title.' '.$slug_random.' '.$slug_date;
                $slug_format = strtr($slug_combine, ' ', '-');
                $slug = $slug_format;
                if (Input::get('negotiable') == '1')
                { $negotiable = True;}
                else
                { $negotiable = False;}

            $product = Product::create([
                'name' => $request->name,
                'title' => $request->product_title,
                'image' => $newfilename,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'phone' => $request->phone,
                'condition' => $request->condition,
                'negotiable' => $negotiable,
                'user_id' => Auth::user()->id,
                'slug' => $slug,
                'city' => $request->city,
                'status' => 'active'
               ]); 

            if(Input::hasFile('photos')){
                     foreach (request('photos') as $photo) {
                        if(filesize($photo) < 1000){
                            session()->flash('message', 'Image too big');
                            return redirect('/fileuploaderror');
                        }else{
                            $file = $photo;
                            $dd = $file->getClientOriginalName();
                            $file_basename = substr($dd, 0, strripos($dd, '.'));
                            $file_ext = substr($dd, strripos($dd, '.')); 
                            $t = date("i-s");
                            $filename = md5($file_basename) . $t . $file_ext;
                            Image::make($file)->resize(1500, null, function ($constraint) {
                                $constraint->aspectRatio();
                            })->save(public_path('/uploads/photos/'. $filename));
                            ProductsPhoto::create([
                                'product_id' => $product->id,
                                'image' => $filename,
                                'user_id' => Auth::user()->id
                             ]);
                        }
                    }
                }
                session()->flash('message', 'Product Added!'); 
            return redirect('/products');
        }else{
             session()->flash('message', 'Sorry, This operation is not allowed! Please login as user!'); 
                return redirect()->back();
        }

    }

    public function show($slug)
    {
         $product = Product::where('slug', $slug)->where('status', 'active')->first();
         $productphotos = $product->productsphoto()->orderBy('id', 'desc')->get();
       //  $viewcounts = 0;  s_naija_pro_count  /product/'.$slug.'
      //  $cookie_count = "s_naija_pro_count";
        $cookie_count = $slug;
        
        if(!isset($_COOKIE[$cookie_count])) {
            $cookie_value =  1;
            setcookie($cookie_count, $cookie_value, time() + (1800), "/");
            $viewcounts = $product->viewcounts + 1;
            $product->viewcounts = $viewcounts;
            $product->save();
            $ok = '';
        } else {
            $ok = $_COOKIE[$cookie_count];
        }
        return view('products.show', compact('product', 'productphotos', 'ok'));
    }

    public function edit($slug)
    {
        if( (checkPermission(['user'])) ){
            $cities = ['Airport Road', 'Aduwawa', 'Ekewan', 'G.R.A', 'Iguobazuwa', 'Ikpoba hill', 'Oka', 'Oluku', 'Ugbiyoko', 'Ugbowo', 'Upper Mission', 'Upper Sakponba', 'Uselu', 'Benin'];
             $product = Product::where('slug', $slug)->first();
             if(Auth::user()->id == $product->user_id) {
             $productphotos = $product->productsphoto()->orderBy('id', 'desc')->get();
              $categories = Category::all();
             return view('products.edit', compact('product', 'productsphotos', 'categories', 'states', 'cities'));
            }else{
                session()->flash('message', 'Sorry, incorrect request!'); 
                return redirect()->back();
            }
        }else{
             session()->flash('message', 'Sorry, This operation is not allowed! Please login as user!');
                return redirect()->back();
        }
              
    }

    public function update(Request $request, $slug)
    {
         $this->validate(request(), [
          
        ]);

    if( (checkPermission(['user'])) ){
         if(Input::hasFile('image')){
            if(filesize(Input::file('image')) < 1000){
                session()->flash('message', 'Image too big');
                return redirect('/fileuploaderror');
            }else{
                $file=Input::file('image');
                $dd = $file->getClientOriginalName();
                $file_basename = substr($dd, 0, strripos($dd, '.'));
                $file_ext = substr($dd, strripos($dd, '.')); 
                $t = date("i-s");
                $newfilename = md5($file_basename) . $t . $file_ext;
                Image::make($file)->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/uploads/cover/'. $newfilename));
            }
        }

         $product = Product::where('slug', $slug)->first();
         if(Auth::user()->id == $product->user_id) {
            if (Input::has('name')) $product->name = $request->name;
            if (Input::has('product_title')) $product->title = $request->product_title;
            if (Input::has('price')) $product->price = $request->price;
            if (Input::has('description')) $product->description = $request->description;
            if (Input::hasFile('image')) $product->image = $newfilename;
            if (Input::has('phone')) $product->phone = $request->phone;
            if (Input::has('category_id')) $product->category_id = $request->category_id;
            if (Input::has('condition')) $product->condition = $request->condition;
         //   if (Input::has('negotiable')) $product->negotiable = True;
         //   if (isset($request->negotiable)) $product->negotiable = True;
            if (Input::get('negotiable') == '1')
            { $product->negotiable = True;}
            else
            { $product->negotiable = False;}
            if (Input::has('state')) $product->state = $request->state;
            if (Input::has('city')) $product->city = $request->city;
            if (Input::has('status')) $product->status = $request->status;
            $product->save();

             if(Input::hasFile('photos')){
                 foreach (request('photos') as $photo) {
                    if(filesize($photo) < 10500){
                        session()->flash('message', 'Image is too big');
                        return redirect('/fileuploaderror');
                    }else{
                        //uploading photo starts
                        $file = $photo;
                        $dd = $file->getClientOriginalName();
                        $file_basename = substr($dd, 0, strripos($dd, '.')); 
                        $file_ext = substr($dd, strripos($dd, '.')); 
                        $t = date("i-s");
                        $filename = md5($file_basename) . $t . $file_ext;
                        Image::make($file)->resize(1500, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(public_path('/uploads/photos/'. $filename));
                        //uploading photo ends
                        ProductsPhoto::create([
                            'product_id' => $product->id,
                            'image' => $filename,
                            'user_id' => Auth::user()->id
                         ]);
                    }
                }
            }

            session()->flash('message', 'Product Updated');
            return redirect()->back();
        }else{
            session()->flash('message', 'Sorry, incorrect request!'); 
            return redirect()->back();
        }
    }else{
         session()->flash('message', 'Sorry, This operation is not allowed! Please login as user!'); 
            return redirect()->back();
    }
    }

     public function search()
    {
        $categories = Category::all();
        $item = Input::get ( 'item' );
        $products = Product::Where(function ($query) {
                $item = Input::get ( 'item' );
                $query->where('title', 'LIKE', '%'.$item.'%')
                      ->where('status', '=', 'active');
            })
            ->orWhere(function ($query) {
                $item = Input::get ( 'item' );
                $query->where('condition', 'LIKE', '%'.$item.'%')
                      ->where('status', '=', 'active');
            })->orderBy('id', 'desc')->simplePaginate(15);
        $cryptocurrencies = Cryptocurrency::where('currency', 'LIKE', '%'.$item.'%')->orderBy('id', 'desc')->simplePaginate(15);
        if(count($products) > 0) {
            return view('products.search')->withDetails($products, $cryptocurrencies)->withQuery( $item );
        }
        else{ return view ('products.search')->withMessage('No products found!')->withQuery($item);
        }
    }   

    public function destroy(Request $request,$id)
    {
        if( (checkPermission(['admin'])) ){
            $id = request('product_id');
            $deleted = Product::find($id);
            $productphotos = $deleted->productsphoto()->get();
            $deleted->delete();
            foreach($productphotos as $productsphoto) {
                $productsphoto->delete();
            }
            session()->flash('message', 'Product Deleted!');
            return redirect()->back();
        }else{
         session()->flash('message', 'Sorry, This operation is not allowed!'); 
        return redirect()->back();
        }
    }
}
