<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cryptocurrency;
use App\ProductsPhoto;
use App\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Post::orderBy('id', 'desc')->paginate(40);
        return view('posts.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
           'post_title' => 'required|min:1',
            'body' => 'required'
        ]); 
        if( (checkPermission(['admin'])) ){
            $slug_title = request('post_title');
            $slug_date = date("Y-m-d");
            $slug_combine = $slug_title.' '.$slug_date;
            $slug_format = strtr($slug_combine, ' ', '-');
            $slug = $slug_format;
            //
           $post = Post::create([
                'title' => request('post_title'),
                'body' => request('body'),
                'user_id' => Auth::user()->id,
                'slug' => $slug
            ]);
            return redirect('/news');
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
    public function show($slug)
    {
        $news = Post::where('slug', $slug)->first();
        return view('posts.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if( (checkPermission(['admin'])) ){
            $news = Post::where('slug', $slug)->first();
            return view('posts.edit', compact('news'));
        }else{
             session()->flash('message', 'Sorry, This operation is not allowed!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
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
           'post_title' => 'required|min:1'
        //    'body' => 'required'
        ]); 
        if( (checkPermission(['admin'])) ){
            $news = Post::where('slug', $slug)->first();
            $slug_title = request('post_title');
            $slug_date = date("Y-m-d");
            $slug_combine = $slug_title.' '.$slug_date;
            $slug_format = strtr($slug_combine, ' ', '-');
            $slug = $slug_format;

          //  $news = Post::find();
            if (Input::has('post_title')) $news->title = Input::get('post_title');
            if (Input::has('body')) $news->body = Input::get('body');
            $news->slug = $slug;
            $news->user_id = Auth::user()->id;
            $news->save();
            return redirect('/news');
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
    public function destroy($slug)
    {
        if( (checkPermission(['admin'])) ){
            $deleted = Post::where('slug', $slug)->first();
            $deleted->delete();
            session()->flash('message', 'Post Deleted!');
            return redirect()->back();
        }else{
             session()->flash('message', 'Sorry, This operation is not allowed!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
                return redirect()->back();
        }
    }
}
