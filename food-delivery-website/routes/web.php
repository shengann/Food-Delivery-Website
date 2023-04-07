<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('shop',[ProductController::class, 'getProducts']);
Route::post('shop',[ProductController::class, 'addToCart']);
Route::get('shop/{shop_id}',[ShopController::class, 'showProduct']);
Route::post('shop/addToCart',[ProductController::class, 'addToCart']);
Route::get('showCart',[ProductController::class, 'showCart']);
<<<<<<< HEAD
Route::get('shop/removeItem/{product_id}',[ProductController::class, 'removeItem']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
// Route::get('add-to-cart/{id}/{quantity}', [ProductController::class, 'addToCart'])->name('add.to.cart');
// Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
// Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', [ShopController::class, 'getAllShops'])->middleware('auth');
Route::get('home', [ShopController::class, 'findShop'])->name('search')->middleware('auth');
Route::view('welcome', 'welcome');

Route::get('profile/{id}', [UserController::class, 'findUser']);
>>>>>>> 40a1f69a6512bc69b3dd58b474486e2154781e73
