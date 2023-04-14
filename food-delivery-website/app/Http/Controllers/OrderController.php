<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\user;
use App\Models\Shop;

class OrderController extends Controller
{
    public function getOrders()
    {
        $data = Order::where('shop_id', '1')->get();
        return view('shop', ['orders' => $data]);
    }

    public function showOrder_item($order_id)
    {
        $data = Order::find($order_id)->getOrder_items;
        return $data;
    }

    public function showShop($order_id)
    {
        $order = Order::with("Shop")->get();
        return $order;
    }

    public function showhistory_item($order_id){
        dd($data = Order::where('id',$order_id)->with('order_items')->get());
        // return $data;
    }
}
