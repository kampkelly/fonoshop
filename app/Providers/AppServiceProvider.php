<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Product;
use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         view()->composer('*', function ($view) {
           
            $side_categories = \App\Category::orderBy('id', 'asc')->get();
            $side_news = \App\Post::orderBy('id', 'desc')->simplePaginate(5);
          #  $categories = \App\Category::has('startups')->get();
            $side_products = \App\Product::where('status', 'active')->orderBy('id', 'desc')->take(10)->get();
           # $tags = \App\Tag::has('posts')->pluck('name');
            $view->with(compact('side_categories', 'side_products', 'side_news'));
            }); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
