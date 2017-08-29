<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Product;
use App\Cryptocurrency;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth', ['except' => ['']]);
    }

        public function myprofile($email)
    {
        if(Auth::user()->email == $email) {
            $user = User::where('email', $email)->first();
            $cities = ['Airport Road', 'Aduwawa', 'Ekewan', 'G.R.A', 'Iguobazuwa', 'Ikpoba hill', 'Oka', 'Oluku', 'Ugbiyoko', 'Ugbowo', 'Upper Mission', 'Upper Sakonba', 'Uselu', 'Benin'];
            return view('users.profile', compact('user', 'cities'));
        }else{
            session()->flash('message', 'Invalid Operation!'); 
            return redirect()->back();
        }
    }

    public function myitems($email)
    {
        if( (checkPermission(['user'])) ){
            if(Auth::user()->email == $email) {
                $user = User::where('email', $email)->first();
                $products = $user->products()->orderBy('id', 'desc')->get();
                $cryptocurrencies = $user->cryptocurrencies()->orderBy('id', 'desc')->get();
                return view('users.items', compact('user', 'products', 'cryptocurrencies'));
            }else{
                 session()->flash('message', 'Invalid Operation!'); 
                return redirect()->back();
            }
         }else{
             session()->flash('message', 'Sorry, This operation is not allowed!');
                return redirect()->back();
        }
    } 

    public function newitems($email)
    {
        if( (checkPermission(['user'])) ){
            if(Auth::user()->email == $email) {
                $user = User::where('email', $email)->first();
                $products = $user->products()->orderBy('id', 'desc')->get();
                $cryptocurrencies = $user->cryptocurrencies()->orderBy('id', 'desc')->get();
                return view('users.new_items', compact('user', 'products', 'cryptocurrencies'));
            }else{
                 session()->flash('message', 'Invalid Operation!'); 
                return redirect()->back();
            }
         }else{
             session()->flash('message', 'Sorry, This operation is not allowed!');
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
            session()->flash('message', 'Profile Updated'); 
            return redirect()->back();
        }else{
             session()->flash('message', 'Invalid Operation!'); 
            return redirect()->back();
        }
       
    }
    
}
