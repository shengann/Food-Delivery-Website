<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

    public function showProduct($shop_id){
        $data = Shop::find($shop_id)->getProduct;
        return view('shop',['products'=> $data]);
    }

}
