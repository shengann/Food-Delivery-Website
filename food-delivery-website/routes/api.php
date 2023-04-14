<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Order_ItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('orders/{shopId}',[ShopController::class, 'showShop']);
Route::get('order-items/{orderId}', [OrderController::class, 'showOrder_item']);
Route::get('historyitem/{orderId}', [Order_ItemController::class, 'showhistory_item']);

Route::get('history/{id}', [UserController::class, 'showHistory']);

Route::get('ordershop/{shopId}', [OrderController::class, 'showShop']);
Route::get('shop/{shopId}/item', [ShopController::class, 'showProduct_api']);
Route::put('item/{itemId}', [ProductController::class, 'updateProduct']);
Route::get('item/{itemId}', [ProductController::class, 'getProduct']);
Route::post('item', [ProductController::class, 'createProduct']);
Route::delete('item/{itemId}', [ProductController::class, 'deleteProduct']);
Route::get('user/{id}',[UserController::class, 'findUser_api']);