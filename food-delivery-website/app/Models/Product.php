<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'image'
    ];

    public function getShop(){
        return $this -> belongsTo('App\Models\Shop');
    }
    public function getOrder_item(){
        return $this -> belongsTo('App\Models\Order_item');
    }
}
