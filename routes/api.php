<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LinkController;
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

Route::get('/affiliates', [AffiliateController::class, 'index']);
Route::prefix('/affiliate')->group(function(){
    Route::post('/store', [AffiliateController::class, 'store']);
    Route::put('/{id}', [AffiliateController::class, 'update']);
    Route::delete('/{id}', [AffiliateController::class, 'destroy']);
});

Route::get('/products', [ProductController::class, 'index']);
Route::prefix('/product')->group(function(){
    Route::post('/store', [ProductController::class, 'store']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});

Route::get('/links', [LinkController::class, 'index']);
Route::prefix('/link')->group(function(){
    Route::post('/store', [LinkController::class, 'store']);
    Route::put('/{id}', [LinkController::class, 'update']);
    Route::delete('/{id}', [LinkController::class, 'destroy']);
});