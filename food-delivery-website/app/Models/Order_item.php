<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getOrder()
    {
        return $this->belongsTo('App\Models\Order');
    }
    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function getProduct()
    {
        return $this->hasOne('App\Models\Product');
    }
}
