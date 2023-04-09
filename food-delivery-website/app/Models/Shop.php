<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function getProduct(){
        return $this -> hasMany('App\Models\Product');
    }

    public function getOrder()
    {
        return $this->hasMany('App\Models\Order');
    }
}
