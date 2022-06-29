<?php

use App\Http\ApiV1\Modules\Product\Controllers\ProductController;
use App\Http\ApiV1\Modules\Store\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/v1')->group(function(){
    Route::prefix('/products')->group(function(){
        Route::get('/', [ProductController::class, 'getProducts']);
        Route::get('/{id}', [ProductController::class, 'getProduct']);
        Route::post('/', [ProductController::class, 'createProduct']);
        Route::delete('/{id}', [ProductController::class, 'deleteProduct']);
        Route::put('/{id}', [ProductController::class, 'replaceProduct']);
        Route::patch('/{id}', [ProductController::class, 'patchProduct']);
    });
    Route::prefix('/stores')->group(function(){
        Route::get('/', [StoreController::class, 'getStores']);
        Route::get('/{id}', [StoreController::class, 'getStore']);
        Route::post('/', [StoreController::class, 'createStore']);
        Route::delete('/{id}', [StoreController::class, 'deleteStore']);
        Route::put('/{id}', [StoreController::class, 'replaceStore']);
        Route::patch('/{id}', [StoreController::class, 'patchStore']);
    });
});