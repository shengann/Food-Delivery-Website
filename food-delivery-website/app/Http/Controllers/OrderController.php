<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\user;


class OrderController extends Controller
{
    public function getOrders()
    {
        $data = Order::where('shop_id', '1')->get();
        return view('shop', ['orders' => $data]);
    }

    public function showOrder_item($order_id)
    {
        $order = Order::find($order_id);
        $data = Order::find($order_id)->getOrder_items;
        return $data;
    }
}
