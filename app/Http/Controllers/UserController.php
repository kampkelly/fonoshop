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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
