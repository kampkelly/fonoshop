<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoCategory extends Model
{
    protected $fillable = [ 'currency_name', 'user_id' ];
}
