<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;

    public function getOrder()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
