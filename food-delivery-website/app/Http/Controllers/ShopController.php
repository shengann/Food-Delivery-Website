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

    //this function to find a shop using name
    public function findShop(Request $request)
    {
        $name = $request->input('searchName');
        $data = Shop::where('shop_name', 'like', '%'.$name.'%')->get();
        return view('home', ['shops'=>$data]);
    }
    public function showProduct($shop_id){
        $shop = Shop::find($shop_id);
        $data = Shop::find($shop_id)->getProduct;
        // session()->put('shop', $shop_id);
        return view('shop',['products'=> $data,'shop'=>$shop]);
    }

    public function showProduct_api($shop_id)
    {
        $data = Shop::find($shop_id)->getProduct;
        return $data;
    }

    public function showShop($shop_id)
    {
        $shop = Shop::find($shop_id);
        $data = Shop::find($shop_id)->getOrder;
        // session()->put('shop', $shop_id);
        return $data;
    }



}
