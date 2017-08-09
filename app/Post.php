<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'username', 'user_id', 'slug'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
