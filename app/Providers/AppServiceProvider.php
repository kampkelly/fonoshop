<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Product;

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
          #  $categories = \App\Category::has('startups')->get();
            $side_products = \App\Product::where('status', 'active')->orderBy('id', 'desc')->take(10)->get();
           # $tags = \App\Tag::has('posts')->pluck('name');
            $view->with(compact('side_categories', 'side_products'));
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
