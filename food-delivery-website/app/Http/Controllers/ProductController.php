<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        if (empty(session('shop')->shop_id))
        {
            if ($req-> quantity!= "Quantity"){
                $id= $req->id;
                $product = Product::find($id);
                error_log($id);
                $cart = session()->get('cart', []);
                if(isset($cart[$id]) && $cart[$id]!== "") {
                    error_log('no isset');
                    $cart[$id]['quantity']+= $req -> quantity;
                } else {
                    $cart[$id] = [
                        "id" => $id,
                        "name" => $product->product_name,
                        "quantity" => $req -> quantity,
                        "price" => $product->product_price,
                        "image" => $product->product_image,
                    ];
                }
                session()->put('shop', $req->shop_id);
            }
            else{
                return view('welcome');
            }
    

        }
        else{
            return view('error');
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

    // public function update(Request $req)
    // {
    // $post=Post::find($req->id);
    // $cart[$request->id]["quantity"] = $request->quantity;
    // session()->put('cart', $cart);
    // session()->flash('success', 'Cart updated successfully');
    // }

    public function removeItem($id)
    {
        // if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
                $checkCart = session()->get('cart');
                if(!$checkCart)
                {
                    Session::forget('shop');
                }
                error_log('delete liaooo');
                return redirect('/showCart');
            }
            // session()->flash('success', 'Product removed successfully');
        // }
    }

    public function showCart(){
        $cart = session()->get('cart');
        return view('cart',['details'=>$cart]);
    }

    public function createProduct(Request $request){
        return Product::create($request->all());
    }

    public function updateProduct(Request $request,$id)
    {
        $item = Product::findorFail($id);
        $item->update($request->all());
        return $item;
    }

    public function deleteProduct($id)
    {
        $item = Product::findorFail($id);
        $item->delete();
        return 204;
    }

    public function getProduct( $id)
    {
        $item = Product::findorFail($id);
        return $item;
    }

    
}
