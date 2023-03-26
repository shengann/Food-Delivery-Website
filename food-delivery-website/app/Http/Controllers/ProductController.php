<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProducts(){
        $data = Products::where('shop_id', '1')->get();
        return view('shop', ['products' => $data]);
    }
}
