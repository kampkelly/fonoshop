<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    protected $fillable = [ 'price', 'currency', 'user_id' ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
