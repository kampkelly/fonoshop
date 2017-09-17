<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'city', 'is_permission', 'status', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function productsphoto(){
        return $this->hasMany(ProductsPhoto::class);
    }

    public function cryptocurrencies(){
        return $this->hasMany(Cryptocurrency::class);
    }

}
