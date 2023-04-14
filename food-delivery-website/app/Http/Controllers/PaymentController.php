<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller{
    public function noPaymentMethod(){
        return view('confirmOrder', ['method'=> "", 'total'=>"Total amount will be calculated after payment method will be selected"]);
    }

    public function getPaymentMethod(Request $req){
        $paymentMethod = $req->input('paymentOption');

        $cart = session()->get('cart');

        $total=0;
        foreach($cart as $item)
        {
            $total += $item['price'] * $item['quantity'];
        }
        session()->put('total', $total);
        
        if($paymentMethod)
        {
            return view('confirmOrder', ['method'=> $paymentMethod, 'total'=>$total]);
        }
    }



    public function confirm(Request $req, $userId){
        $cart = session()->get('cart');
        $shop = session()->get('shop');
        $total = session()->get('total');
        session()->put('history', $cart);

        $order = new Order;
        $order->shop_id = $shop;
        $order->user_id = $userId;
        $order->total_price = $total;
        $order->is_completed = "Yes";
        $order->save();
        
        foreach($cart as $item)
        {
            $order_item = new Order_item;
            $order_item->order_id = $order->id;
            $order_item->product_id = $item['id'];
            $order_item->quantity = $item['quantity'];
            $order_item->subtotal = $item['quantity'] * $item['price'];
            $order_item->item_price = $item['price'];
            $order_item->save();
        }

        Session::forget('cart');
        Session::forget('shop');
        Session::forget('total');

        $req->session()->flash('status', 'Your order will arrive shortly!');

        $data = Shop::all();
        return redirect('home');
    }
}