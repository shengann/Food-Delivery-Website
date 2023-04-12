<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_Item;

class Order_itemController extends Controller
{
    public function getOrder_items()
    {   
        $data = Order_Item::where('order_id', '1')->get();
        return $data;
    }

}
