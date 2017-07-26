<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [ 'title', 'image', 'description', 'category_id', 'price', 'phone', 'user_id', 'address', 'slug' ];

     public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productsphoto(){
        return $this->hasMany(ProductsPhoto::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
