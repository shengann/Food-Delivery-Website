<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    use HasFactory;


    public function getShop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function shop(){
        return $this->belongsTo(Shop::class, 'shop_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function order_items()
    {
        return $this->hasMany(Order_item::class, 'order_id','id');
    }
    public function getOrder_items()
    {
        return $this->hasMany('App\Models\Order_item');
    }

    public function getUser()
    {
        return $this->belongsTo('App\Models\User');
    }
}
