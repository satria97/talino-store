<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CouponController as AdminCouponController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;


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


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [ProductController::class, 'index']);
Route::get('/product', [ProductController::class, 'product']);
Route::get('/category', [ProductController::class, 'category']);
Route::get('/category/{slug}', [ProductController::class, 'productCategory']);
Route::get('/category/{slug}/{product_slug}', [ProductController::class, 'detailProduct']);
Route::post('/add-to-cart', [CartController::class, 'insert']);
Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/delete/{id}', [CartController::class, 'delete']);
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/place-order', [CheckoutController::class, 'placeOrder']);
Route::get('/history', [PenggunaController::class, 'history']);
Route::get('/history/detail-order/{id}', [PenggunaController::class, 'detailOrder']);
Route::get('/profile', [PenggunaController::class, 'profile']);
Route::post('/profile', [PenggunaController::class, 'update']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'middleware' => 'is_admin'], function () {
    Route::get('/', [AdminDashboardController::class, 'index']);
    Route::prefix('user')->group(function () {
        Route::get('/', [AdminUserController::class, 'index']);
        Route::get('/insert', [AdminUserController::class, 'insert']);
        Route::post('/insert-proses', [AdminUserController::class, 'insertAction']);
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'index']);
        Route::get('/check-slug', [AdminCategoryController::class, 'check']);
        Route::get('/insert', [AdminCategoryController::class, 'insert']);
        Route::post('/insert-proses', [AdminCategoryController::class, 'insertAction']);
        Route::get('/edit/{id}', [AdminCategoryController::class, 'edit']);
        Route::PUT('/{id}', [AdminCategoryController::class, 'update']);
        Route::get('/delete/{id}', [AdminCategoryController::class, 'delete']);
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index']);
        Route::get('/insert', [AdminProductController::class, 'insert']);
        Route::post('/insert-proses', [AdminProductController::class, 'insertAction']);
        Route::get('/edit/{id}', [AdminProductController::class, 'edit']);
        Route::PUT('/{id}', [AdminProductController::class, 'update']);
        Route::get('/delete/{id}', [AdminProductController::class, 'delete']);
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index']);
        Route::get('/insert', [AdminOrderController::class, 'insertOrder']);
        Route::post('/insert-proses', [AdminOrderController::class, 'insertOrderAction']);
        Route::get('/insert_item/{id}', [AdminOrderController::class, 'insertOrderItem']);
        Route::post('/insert_item-proses/{id}', [AdminOrderController::class, 'insertOrderItemAction']);
        Route::get('/edit/{id}', [AdminOrderController::class, 'editOrder']);
        Route::PUT('/{id}', [AdminOrderController::class, 'updateOrder']);
        Route::get('insert_item/{order_id}/edit/{id}', [AdminOrderController::class, 'editOrderItem']);
        Route::PUT('insert_item/{order_id}/{id}', [AdminOrderController::class, 'updateOrderItem']);
        Route::get('insert_item/{order_id}/delete/{id}', [AdminOrderController::class, 'deleteOrderItem']);
        Route::get('/delete/{id}', [AdminOrderController::class, 'deleteOrder']);
    });
    Route::prefix('coupon')->group(function () {
        Route::get('/', [AdminCouponController::class, 'index']);
        Route::get('/insert', [AdminCouponController::class, 'insert']);
        Route::post('/insert-proses', [AdminCouponController::class, 'insertAction']);
        Route::get('/edit/{id}', [AdminCouponController::class, 'edit']);
        Route::put('/{id}', [AdminCouponController::class, 'update']);
        Route::get('/delete/{id}', [AdminCouponController::class, 'delete']);
    });
});
Auth::routes();
