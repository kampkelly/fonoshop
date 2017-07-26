<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
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
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('welcome', compact('categories'));
    }

    public function myprofile($email)
    {
       // $categories = Category::all();
        $user = User::where('email', $email)->first();
        return view('users.profile', compact('user'));
    }

    public function myitems($email)
    {
       // $categories = Category::all();
        $user = User::where('email', $email)->first();
        $products = $user->products()->orderBy('id', 'desc')->get();
        $cryptocurrencies = $user->cryptocurrencies()->orderBy('id', 'desc')->get();
        return view('users.items', compact('user', 'products', 'cryptocurrencies'));
    }

    public function updateprofile(Request $request, $email)
    {
       $this->validate(request(), [
           'email' => 'required',
           'name' => 'required'
        //   'phone' => 'required|min:8'
          // 'city' => 'required|min:8'
        ]);

       $user = User::where('email', $email)->first();
            if (Input::has('email')) $user->email = $request->email;
            if (Input::has('name')) $user->name = $request->name;
            if (Input::has('phone')) $user->phone = $request->phone;
            if (Input::has('city')) $user->city = $request->city;
            
            $user->save();
            session()->flash('message', 'Profile Updated'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
            //SESSION FLASH also include in the view with if 
          //  return redirect('/startup/edit/'.$slug);
            return redirect()->back();
       
    }

}
