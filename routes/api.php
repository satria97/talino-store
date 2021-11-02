<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderItemController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('order')->group(function () {
    Route::get('/insert_item/{id}', [OrderItemController::class, 'index']);
    Route::post('/insert_item/{id}', [OrderItemController::class, 'store']);
    Route::put('/insert_item/{id}', [OrderItemController::class, 'update']);
    Route::delete('{order_id}/insert_item/{id}', [OrderItemController::class, 'destroy']);
});
