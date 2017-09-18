<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cryptocurrency;
use App\ProductsPhoto;
use App\CryptoCategory;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendTestEmail;
use App\Jobs\WelcomeRegistrationEmail;

class CryptocurrencyController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
    
    public function index()
    {
        $user = Auth::user();
        $cryptocurrencies = Cryptocurrency::simplePaginate(15);      
         return view('cryptocurrencies.index', compact('cryptocurrencies'));
    }

    public function create()
    {
        if(Auth::check()) {
            if( (checkPermission(['user'])) ){
                $categories = Category::all();
                $cryptocategories = CryptoCategory::orderBy('id', 'asc')->get();
                 return view('cryptocurrencies.create', compact('categories', 'cryptocategories'));
            }else{
                 session()->flash('message', 'Sorry, This operation is not allowed! Please login as user'); 
                    return redirect()->back();
            } 
        }else{
            $categories = Category::all();
            $cities = ['Airport Road', 'Aduwawa', 'Ekewan', 'G.R.A', 'Iguobazuwa', 'Ikpoba hill', 'Oka', 'Oluku', 'Ugbiyoko', 'Ugbowo', 'Upper Mission', 'Upper Sakponba', 'Uselu', 'Benin'];
            $cryptocategories = CryptoCategory::orderBy('id', 'asc')->get();
                 return view('cryptocurrencies.regcreate', compact('categories', 'cryptocategories', 'cities')); 
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                'price' => 'required',
                'currency'=>'required'
            ]); 
        if( (checkPermission(['user'])) ){
            $cryptocurrency = Cryptocurrency::create([
                'price' => $request->price,
                'currency' => $request->currency,
                'phone' => $request->phone,
                'address' => $request->address,
                'user_id' => Auth::user()->id,
               ]); 
            session()->flash('message', 'Cryptocurrency Added!'); 
            return redirect('/allmyitems/'.Auth::user()->email);
        }else{
            session()->flash('message', 'Sorry, This operation is not allowed! Please login as user'); 
                return redirect()->back();
        }

    }
   
    public function edit($id)
    {
        if( (checkPermission(['user'])) ){
            $cryptocurrency = Cryptocurrency::find($id);
            if(Auth::user()->id == $cryptocurrency->user_id) {
            $categories = Category::all();
            $cryptocategories = CryptoCategory::orderBy('id', 'asc')->get();
             return view('cryptocurrencies.edit', compact('cryptocurrency', 'cryptocategories'));
            }else{
                session()->flash('message', 'Invalid Operation!'); 
                return redirect()->back();
            }
        }else{
            session()->flash('message', 'Sorry, This operation is not allowed! Please login as user'); 
                return redirect()->back();
        }
    }

   
    public function update(Request $request, $id)
    {
        if( (checkPermission(['user'])) ){
        $cryptocurrency = Cryptocurrency::find($id);
            if(Auth::user()->id == $cryptocurrency->user_id) {
                if (Input::has('price')) $cryptocurrency->price = $request->price;
                if (Input::has('currency')) $cryptocurrency->currency = $request->currency;
                if (Input::has('phone')) $cryptocurrency->phone = $request->phone;
                if (Input::has('address')) $cryptocurrency->address = $request->address;
                $cryptocurrency->save();

                session()->flash('message', 'Cryptocurrency Updated'); 
                return redirect()->back();
            }else{
                session()->flash('message', 'Invalid Operation!'); 
                return redirect()->back();
            }
         }else{
            session()->flash('message', 'Sorry, This operation is not Please login as user! '); 
                return redirect()->back();
        }
    }

   
     public function destroy(Request $request,$id)
    {
        if( (checkPermission(['admin'])) ){
            $id = request('cryptocurrency_id');
            $deleted = Cryptocurrency::find($id);
            $deleted->delete();
            session()->flash('message', 'Cryptocurrency Deleted!');
            return redirect()->back();
        }else{
         session()->flash('message', 'Sorry, This operation is not allowed!'); 
        return redirect()->back();
        }
    }

    public function user_destroy(Request $request,$id)
    {
        if( (checkPermission(['user'])) ){
            $deleted = Cryptocurrency::find($id);
            $deleted->delete();
            session()->flash('message', 'Cryptocurrency Deleted!');
            return redirect()->back();
        }else{
         session()->flash('message', 'Sorry, This operation is not allowed!'); 
        return redirect()->back();
        }
    }
}
