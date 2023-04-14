<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
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
    return redirect('home');
})->middleware('auth');

Auth::routes();

Route::get('shop/{shop_id}',[ShopController::class, 'showProduct'])->middleware('auth');
Route::post('shop/addToCart',[ProductController::class, 'addToCart'])->middleware('auth');
Route::get('showCart',[ProductController::class, 'showCart'])->middleware('auth');
Route::get('confirmOrder', [PaymentController::class, 'noPaymentMethod'])->middleware('auth');
Route::post('confirmOrder', [PaymentController::class, 'getPaymentMethod'])->name('payment')->middleware('auth');
Route::get('confirmOrder/confirm', [PaymentController::class, 'confirm'])->middleware('auth');
Route::get('shop/removeItem/{product_id}',[ProductController::class, 'removeItem'])->middleware('auth');
Route::get('removeItem/{product_id}',[ProductController::class, 'removeItem'])->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', [ShopController::class, 'getAllShops'])->middleware('auth');
Route::get('home', [ShopController::class, 'findShop'])->name('search')->middleware('auth');
Route::view('welcome', 'welcome');

Route::get('profile/{id}', [UserController::class, 'findUser']);
Route::get('profile/{id}/edit', [UserController::class, 'editProfile']);
Route::post('profile/{id}', [UserController::class, 'updateUser'])->name('users.update');


Route::get('orderhistory/{id}', function(){
    return view('orderHistory');
})->middleware('auth');


Route::get('/admin',function(){
    return view('adminProfile');
});

Route::get('/admin/listed-item', function () {
    return view('listedItem');
});

// Route::get('/admin/{shop_id}/order',[ShopController::class, 'showOrder'])->middleware('auth');
// Route::get('/admin/{shop_id}/order/{order_id}', [OrderController::class, 'showOrder_item'])->middleware('auth');

