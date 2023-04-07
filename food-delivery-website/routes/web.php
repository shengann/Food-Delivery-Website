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
Route::post('shop',[ProductController::class, 'addToCart']);
Route::get('shop/{shop_id}',[ShopController::class, 'showProduct']);
Route::post('shop/addToCart',[ProductController::class, 'addToCart']);
Route::get('showCart',[ProductController::class, 'showCart']);
Route::get('shop/removeItem/{product_id}',[ProductController::class, 'removeItem']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
