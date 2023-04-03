<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProducts(){
        $data = Product::where('shop_id', '1')->get();
        return view('shop', ['products' => $data]);
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart(Request $req)
    {
        if ($req-> quantity!= 0 ){
            $id= $req->id;
            $product = Product::find($id);
            $cart = session()->get('cart', []);
            if(isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->product_price,
                    // "image" => $product->image
                ];
            }
        }
        else{
            return view('welcome');
        }
        
        session()->put('cart', $cart);
        return view('cart',['details' => $cart ]);
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // public function update(Request $request)
    // {
    //     if($request->id && $request->quantity){
    //         $cart = session()->get('cart');
    //         $cart[$request->id]["quantity"] = $request->quantity;
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'Cart updated successfully');
    //     }
    // }

    public function update(Request $req)
    {
    $post=Post::find($req->id);
    $cart[$request->id]["quantity"] = $request->quantity;
    session()->put('cart', $cart);
    session()->flash('success', 'Cart updated successfully');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function showCart(){
        $cart = session()->get('cart');
        return view('cart',['details'=>$cart]);
    }
}
