<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('shop',[ProductController::class, 'getProducts']);
Route::get('shop/{shop_id}',[ShopController::class, 'showProduct']);
Route::post('shop/addToCart',[ProductController::class, 'addToCart']);
Route::get('showCart',[ProductController::class, 'showCart']);
// Route::get('add-to-cart/{id}/{quantity}', [ProductController::class, 'addToCart'])->name('add.to.cart');
// Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
// Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');