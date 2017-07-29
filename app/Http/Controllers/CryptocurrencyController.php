<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cryptocurrency;
use App\ProductsPhoto;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class CryptocurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cryptocurrencies = Cryptocurrency::simplePaginate(15);
         return view('cryptocurrencies.index', compact('cryptocurrencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
         return view('cryptocurrencies.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'price' => 'required',
                'currency'=>'required'
            ]); 
        $cryptocurrency = Cryptocurrency::create([
            'price' => $request->price,
            'currency' => $request->currency,
            'user_id' => Auth::user()->id,
        //    'address' => $request->address,
           ]); 
        session()->flash('message', 'Cryptocurrency Added!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
        return redirect('/myitems/'.Auth::user()->email);

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
        $cryptocurrency = Cryptocurrency::find($id);
        if(Auth::user()->id == $cryptocurrency->user_id) {
        $categories = Category::all();
         return view('cryptocurrencies.edit', compact('cryptocurrency'));
        }else{
            session()->flash('message', 'Invalid Operation!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
            return redirect()->back();
        }
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
        $cryptocurrency = Cryptocurrency::find($id);
        if(Auth::user()->id == $cryptocurrency->user_id) {
            if (Input::has('price')) $cryptocurrency->price = $request->price;
            if (Input::has('currency')) $cryptocurrency->currency = $request->currency;
            $cryptocurrency->save();

            session()->flash('message', 'Cryptocurrency Updated'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
            return redirect()->back();
        }else{
            session()->flash('message', 'Invalid Operation!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
            return redirect()->back();
        }
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
