<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_name', 'product_price', 'product_quantity', 'shop_id'
    ];

    public function getShop(){
        return $this -> belongsTo('App\Models\Shop');
    }
    public function getOrder_item(){
        return $this -> belongsTo('App\Models\Order_item');
    }
}
