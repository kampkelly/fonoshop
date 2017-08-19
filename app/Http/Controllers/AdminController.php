<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cryptocurrency;
use App\ProductsPhoto;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['']]);
       # $this->middleware('guest', ['except' => ['index']]);
    }

    public function index()
    {
        $products = Product::where('status', 'active')->simplePaginate(15);
         return view('admin.index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::all();
         return view('admin.categories', compact('categories'));
    } 

       public function products()
    {
        $products = Product::all();
         return view('admin.products', compact('products'));
    } 

    public function posts()
    {
        $posts = Post::all();
         return view('admin.posts', compact('posts'));
    } 

    public function cryptocurrencies()
    {
        $cryptocurrencies = Cryptocurrency::orderBy('id', 'desc')->simplePaginate(40);
         return view('admin.cryptocurrencies', compact('cryptocurrencies'));
    }

    //set product status
    public function product_active($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->status = 'active';
        $product->save();
        session()->flash('message', 'Product status changed!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
        return redirect()->back();
    } 

    public function product_pause($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->status = 'paused';
        $product->save();
        session()->flash('message', 'Product status changed!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
        return redirect()->back();
    } 

    public function product_sold($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->status = 'sold';
        $product->save();
        session()->flash('message', 'Product status changed!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
        return redirect()->back();
    }
    //set product status

    public function products_photos()
    {
        $productsphotos = ProductsPhoto::orderBy('id', 'desc')->simplePaginate(40);
         return view('admin.products_photos', compact('productsphotos'));
    } 

    public function users()
    {
        $users = User::all();
         return view('admin.users', compact('users'));
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
