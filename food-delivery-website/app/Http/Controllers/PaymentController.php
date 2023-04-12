<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller{
    public function noPaymentMethod(){
        return view('confirmOrder', ['method'=> ""]);
    }

    public function getPaymentMethod(Request $req){
        $paymentMethod = $req->input('paymentOption');
        
        if($paymentMethod)
        {
            return view('confirmOrder', ['method'=> $paymentMethod]);
        }
    }

    public function confirm(Request $req){
        $cart = session()->get('cart');
        session()->put('history', $cart);
        Session::forget('cart');
        Session::forget('shop');

        $req->session()->flash('status', 'Your order will arrive shortly!');

        $data = Shop::all();
        return view('home', ['shops'=>$data]);
    }
}