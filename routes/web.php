<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);


Route::prefix('admin')->group(function () {

    Route::get('/category-list', [App\Http\Controllers\Admin\CategoryController::class, 'getAllData']);
    Route::resource('category', CategoryController::class);

    Route::get('/sub-category-list', [App\Http\Controllers\Admin\SubcategoryController::class, 'getAllData']);
    Route::resource('sub-category', SubcategoryController::class);

    Route::get('/products-list', [App\Http\Controllers\Admin\ProductController::class, 'getAllData']);
    Route::resource('products', ProductController::class);

});

Route::get('/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'category']);
Route::get('/{category_slug}/{sub_category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'subCategory']);
Route::get('/{category_slug}/{sub_category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'product']);




