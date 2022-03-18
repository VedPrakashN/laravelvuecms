<?php

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


    
Route::get('/sub-category/{category_id}', [App\Http\Controllers\API\ApiController::class, 'subCategory']);
Route::get('/products/{sub_category_id}', [App\Http\Controllers\API\ApiController::class, 'product']);
Route::get('/product-view/{product_id}', [App\Http\Controllers\API\ApiController::class, 'productView']);



