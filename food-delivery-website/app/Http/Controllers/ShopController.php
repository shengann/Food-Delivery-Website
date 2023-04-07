<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    //this function to retrieve all shop data
    public function getAllShops()
    {
        $data = Shop::all();
        return view('home', ['shops'=>$data]);
    }

    public function showProduct($shop_id){
        $shop = Shop::find($shop_id);
        $data = Shop::find($shop_id)->getProduct;
        // session()->put('shop', $shop_id);
        return view('shop',['products'=> $data,'shop'=>$shop]);
    }


}
