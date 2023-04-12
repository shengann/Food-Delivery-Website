<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function getOrders()
    {
        $data = Order::where('shop_id', '1')->get();
        return view('shop', ['orders' => $data]);
    }
}
