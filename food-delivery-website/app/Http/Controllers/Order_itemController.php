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

    public function showhistory_item($order_id)
    {
        $data = Order_Item::where('order_id',$order_id)->with('product', 'order')->get();

        return $data;
    }


}
