<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cryptocurrency;
use App\ProductsPhoto;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 'active')->simplePaginate(15);
         return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $categories = Category::all();
         return view('products.create', compact('categories'));
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
                'product_title' => 'required|max:255',
                'price' => 'required',
                'description'=> 'required',
                'phone'=>'required',
                'category_id'=>'required',
                'condition'=>'required'
            ]); 

        if(Input::hasFile('image')){
            $file=Input::file('image');
            $dd = $file->getClientOriginalName();
            $file_basename = substr($dd, 0, strripos($dd, '.')); // get file name
            $file_ext = substr($dd, strripos($dd, '.')); // get file extension
            $t = date("i-s");
            $newfilename = md5($file_basename) . $t . $file_ext;
          //  Image::make($file)->resize(300, 300)->save(public_path('/uploads/'. $newfilename));
            $file->move('uploads', $newfilename);
        }

            $slug_title = request('product_title');
            $slug_random = rand();
            $slug_date = date("Y-m-d");
            $slug_combine = $slug_title.' '.$slug_random.' '.$slug_date;
            $slug_format = strtr($slug_combine, ' ', '-');
            $slug = $slug_format;

        $product = Product::create([
            'title' => $request->product_title,
            'image' => $newfilename,
            'description' => 'desrcibe',
            'category_id' => $request->category_id,
            'price' => $request->price,
            'phone' => $request->phone,
            'condition' => $request->condition,
            'user_id' => Auth::user()->id,
            'slug' => $slug,
            'active' => 'active'
        //    'address' => $request->address,
           ]); 

        if(Input::hasFile('photos')){
                 foreach (request('photos') as $photo) {
                    //uploading photo starts
                    $file = $photo;
                    $dd = $file->getClientOriginalName();
                    $file_basename = substr($dd, 0, strripos($dd, '.')); // get file name
                    $file_ext = substr($dd, strripos($dd, '.')); // get file extension
                    $t = date("i-s");
                    $filename = md5($file_basename) . $t . $file_ext;
                    $file->move('uploads', $filename);
                    //uploading photo ends
                    ProductsPhoto::create([
                        'product_id' => $product->id,
                        'image' => $filename,
                        'user_id' => Auth::user()->id
                     ]);
                }
            }
            session()->flash('message', 'Product Added!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
        return redirect('/myitems/'.Auth::user()->email);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
         $product = Product::where('slug', $slug)->where('status', 'active')->first();
         $productphotos = $product->productsphoto()->orderBy('id', 'desc')->get();
        return view('products.show', compact('product', 'productphotos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
         $product = Product::where('slug', $slug)->first();
         if(Auth::user()->id == $product->user_id) {
         $productphotos = $product->productsphoto()->orderBy('id', 'desc')->get();
          $categories = Category::all();
         return view('products.edit', compact('product', 'productsphotos', 'categories'));
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
    public function update(Request $request, $slug)
    {
         $this->validate(request(), [
          // 'title' => 'required',
          // 'price' => 'required',
         //  'description' => 'required'
        ]);

         if(Input::hasFile('image')){
            $file=Input::file('image');
            $dd = $file->getClientOriginalName();
            $file_basename = substr($dd, 0, strripos($dd, '.')); // get file name
            $file_ext = substr($dd, strripos($dd, '.')); // get file extension
            $t = date("i-s");
            $newfilename = md5($file_basename) . $t . $file_ext;
           // Image::make($file)->resize(300, 300)->save(public_path('/uploads/'. $newfilename));
            $file->move('uploads', $newfilename);
        }

         $product = Product::where('slug', $slug)->first();
         if(Auth::user()->id == $product->user_id) {
            if (Input::has('product_title')) $product->title = $request->product_title;
            if (Input::has('price')) $product->price = $request->price;
            if (Input::has('description')) $product->description = $request->description;
            if (Input::hasFile('image')) $product->image = $newfilename;
            if (Input::has('phone')) $product->phone = $request->phone;
            if (Input::has('category_id')) $product->category_id = $request->category_id;
            if (Input::has('condition')) $product->condition = $request->condition;
            if (Input::has('status')) $product->status = $request->status;
            $product->save();

             if(Input::hasFile('photos')){
                 foreach (request('photos') as $photo) {
                    //uploading photo starts
                    $file = $photo;
                    $dd = $file->getClientOriginalName();
                    $file_basename = substr($dd, 0, strripos($dd, '.')); // get file name
                    $file_ext = substr($dd, strripos($dd, '.')); // get file extension
                    $t = date("i-s");
                    $filename = md5($file_basename) . $t . $file_ext;
                    $file->move('uploads', $filename);
                    //uploading photo ends
                    ProductsPhoto::create([
                        'product_id' => $product->id,
                        'image' => $filename,
                        'user_id' => Auth::user()->id
                     ]);
                }
            }

            session()->flash('message', 'Product Updated'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
            return redirect()->back();
        }else{
            session()->flash('message', 'Invalid Operation!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
            return redirect()->back();
        }
    }

     public function search()
    {
        $categories = Category::all();
        $item = Input::get ( 'item' );
        $products = Product::Where(function ($query) {
                $item = Input::get ( 'item' );
                $query->where('title', 'LIKE', '%'.$item.'%')
                      ->where('status', '=', 'active');
            })
            ->orWhere(function ($query) {
                $item = Input::get ( 'item' );
                $query->where('condition', 'LIKE', '%'.$item.'%')
                      ->where('status', '=', 'active');
            })->orderBy('id', 'desc')->simplePaginate(15);
        if(count($products) > 0) {
            return view('products.search')->withDetails($products)->withQuery( $item );
        }
        else{ return view ('products.search')->withMessage('No products found. Try to search again !')->withQuery($item);
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
