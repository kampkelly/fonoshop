<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Product;
use App\Cryptocurrency;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['myprofile', 'myitems', 'updateprofile']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


     public function newindex()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        $products = Product::where('status', 'active')->orderBy('id', 'desc')->simplePaginate(10);
        $prods = Product::where('status', 'active')->orderBy('id', 'desc')->simplePaginate(3);
        $cryptocurrencies = Cryptocurrency::simplePaginate(15);
        return view('home', compact('categories', 'products', 'cryptocurrencies', 'prods'));
    }

    public function index()
    {
        $categories = Category::all();
        $products = Product::where('status', 'active')->orderBy('id', 'desc')->simplePaginate(1);
        return view('welcome', compact('categories', 'products'));
    }

    public function myprofile($email)
    {
       // $categories = Category::all();
        if(Auth::user()->email == $email) {
            $user = User::where('email', $email)->first();
            return view('users.profile', compact('user'));
        }else{
            session()->flash('message', 'Invalid Operation!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
            return redirect()->back();
        }
    }

    public function myitems($email)
    {
       // $categories = Category::all();
        if( (checkPermission(['user'])) ){
            if(Auth::user()->email == $email) {
                $user = User::where('email', $email)->first();
                $products = $user->products()->orderBy('id', 'desc')->get();
                $cryptocurrencies = $user->cryptocurrencies()->orderBy('id', 'desc')->get();
                return view('users.items', compact('user', 'products', 'cryptocurrencies'));
            }else{
                 session()->flash('message', 'Invalid Operation!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
                return redirect()->back();
            }
         }else{
             session()->flash('message', 'Sorry, This operation is not allowed!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
                return redirect()->back();
        }
    }

    public function updateprofile(Request $request, $email)
    {
       $this->validate(request(), [
           'email' => 'required',
           'name' => 'required'
        ]);
       if(Auth::user()->email == $email) {

       $user = User::where('email', $email)->first();
            if (Input::has('email')) $user->email = $request->email;
            if (Input::has('name')) $user->name = $request->name;
            if (Input::has('phone')) $user->phone = $request->phone;
            if (Input::has('city')) $user->city = $request->city;
            
            $user->save();
            session()->flash('message', 'Profile Updated'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
            return redirect()->back();
        }else{
             session()->flash('message', 'Invalid Operation!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
            return redirect()->back();
        }
       
    }

}
