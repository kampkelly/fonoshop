<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cryptocurrency;
use App\ProductsPhoto;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class ProductsPhotoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['']]);
    }

    public function destroy(Request $request, $id)
    {
        $id = request('photo_id');
        $deleted = ProductsPhoto::find($id);
        if(Auth::user()->id == $deleted->user_id OR (checkPermission(['admin'])) ) {
        $deleted->delete();
        return redirect()->back()->with('message', 'Image deleted!');
        }else{
            session()->flash('message', 'Invalid Operation!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
            return redirect()->back();
        }
    }

}
