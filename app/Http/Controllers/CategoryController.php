<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Product;
use App\ProductsPhoto;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Image;

class CategoryController extends Controller
{
  
    public function store(Request $request)
    {
        $this->validate(request(), [
           'name' => 'required'
        ]); 
        if( (checkPermission(['admin'])) ){
            if(Input::hasFile('image')){
                $file=Input::file('image');
                $dd = $file->getClientOriginalName();
                $file_basename = substr($dd, 0, strripos($dd, '.')); // get file name
                $file_ext = substr($dd, strripos($dd, '.')); // get file extension
                $t = date("i-s");
                $newfilename = md5($file_basename) . $t . $file_ext;
                Image::make($file)->resize(1500, null, function ($constraint) {
                      $constraint->aspectRatio();
                  })->save(public_path('/categories/'. $newfilename));
            }
             Category::create([
                'name' => request('name'),
                'image' => $newfilename
            ]);
            session()->flash('message', 'Category Created!');
                return redirect()->back();
         }else{
             session()->flash('message', 'Sorry, This operation is not allowed!');
                return redirect()->back();
        }
    }

   
    public function show($id)
    {
        $category = Category::find($id);
        $pro = Product::all();
         $products = $category->products()->where('status', 'active')->orderBy('id', 'desc')->simplePaginate(15);
        return view('categories.show', compact('category', 'products', 'pro'));
    }

    public function update(Request $request, $id)
    {
        if( (checkPermission(['admin'])) ){
            if(Input::hasFile('image')){
                $file=Input::file('image');
                $dd = $file->getClientOriginalName();
                $file_basename = substr($dd, 0, strripos($dd, '.')); 
                $file_ext = substr($dd, strripos($dd, '.'));
                $t = date("i-s");
                $newfilename = md5($file_basename) . $t . $file_ext;
                Image::make($file)->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/categories/'. $newfilename));
            }

             $category = Category::find($id);

                if (Input::has('name')) $category->name = Input::get('name');
                if (Input::hasFile('image')) $category->image = $newfilename;
                if (Input::has('description')) $category->description = Input::get('description');
                
                $category->save();

                session()->flash('message', 'Category Updated!');
                return redirect()->back();
             }else{
                 session()->flash('message', 'Sorry, This operation is not allowed!'); "SHOW"
                    return redirect()->back();
            }
    }

    public function destroy(Request $request,$id)
    {
        if( (checkPermission(['admin'])) ){
            $id = request('category_id');
            $deleted = Category::find($id);
            $deleted->delete();
            session()->flash('message', 'Category Deleted!');
            return redirect()->back();
        }else{
         session()->flash('message', 'Sorry, This operation is not allowed!');
        return redirect()->back();
        }
    }
}
