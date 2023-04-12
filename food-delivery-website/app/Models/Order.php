<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function getShop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function getOrder_items()
    {
        return $this->hasMany('App\Models\Order_item');
    }
}
