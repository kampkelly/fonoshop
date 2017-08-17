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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
              //  $file->move('static-pics/categories', $newfilename);
            }

             Category::create([
                'name' => request('name'),
                'image' => $newfilename
            ]);
            session()->flash('message', 'Category Created!');
                return redirect()->back();
         }else{
             session()->flash('message', 'Sorry, This operation is not allowed!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
                return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $pro = Product::all();
         #$category->startups->simplePaginate(1);
         $products = $category->products()->where('status', 'active')->orderBy('id', 'desc')->simplePaginate(15);
         //
     /*    if(Auth::check()) {
         $email_data = array(
          //   'recipient' => $user->user_email,
             'recipient' => Auth::user()->email,
             'subject' => 'Thanks For Registering'
              );
            $view_data = array(
                'email' => Auth::user()->email,
            );

              Mail::send('emails.registered', $view_data, function($message) use ($email_data) {
                  $message->to( $email_data['recipient'] )
                          ->subject( $email_data['subject'] );
              }); 
            } */
         //
        return view('categories.show', compact('category', 'products', 'pro'));
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
        if( (checkPermission(['admin'])) ){
            if(Input::hasFile('image')){
                $file=Input::file('image');
                $dd = $file->getClientOriginalName();
                $file_basename = substr($dd, 0, strripos($dd, '.')); // get file name
                $file_ext = substr($dd, strripos($dd, '.')); // get file extension
                $t = date("i-s");
                $newfilename = md5($file_basename) . $t . $file_ext;
              //  Image::make($file)->resize(900, 600)->save(public_path('/static-pics/categories/'. $newfilename));
                Image::make($file)->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/categories/'. $newfilename));
               // $file->move('static-pics/categories', $newfilename);
            }

             $category = Category::find($id);

                if (Input::has('name')) $category->name = Input::get('name');
                if (Input::hasFile('image')) $category->image = $newfilename;
                if (Input::has('description')) $category->description = Input::get('description');
                
                $category->save();

                session()->flash('message', 'Category Updated!');
                return redirect()->back();
             }else{
                 session()->flash('message', 'Sorry, This operation is not allowed!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
                    return redirect()->back();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if( (checkPermission(['admin'])) ){
            $id = request('category_id');
            $deleted = Category::find($id);
            $deleted->delete();
           // $id = request('category_id');
            session()->flash('message', 'Category Deleted!');
            return redirect()->back();
        }else{
         session()->flash('message', 'Sorry, This operation is not allowed!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
        return redirect()->back();
        }
    }
}
