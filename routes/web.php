<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mhk', function () {
    return 'myo htet kyaw';
});

Route::get('/products', function () {
    return 'product lists';
});

Route::get('/products/detail', function () {
    return 'product Detail';
});

Route::get('/products/detail/{id}', function ($id) {
    return "product Detail - $id";
});

Route::get('/myo', function () {
    return view('myo');
});

//Category Routes
Route::get('/admin/category/list', [App\Http\Controllers\CategoryController::class, 'listCategory']);

Route::post('/admin/category/add', [App\Http\Controllers\CategoryController::class, 'addCategory']);

Route::get('/admin/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory']);

Route::get('/admin/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'updCategory']);

Route::post('/admin/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'updateCategory']);


//item Routes
Route::get('/admin/item/list', [App\Http\Controllers\ItemController::class, 'listItem']);

Route::post('/admin/item/add', [App\Http\Controllers\ItemController::class, 'addItem']);

Route::get('/admin/item/delete/{id}', [App\Http\Controllers\ItemController::class, 'deleteItem']);

Route::get('/admin/item/update/{id}', [App\Http\Controllers\ItemController::class, 'updItem']);

Route::post('/admin/item/update/{id}', [App\Http\Controllers\ItemController::class, 'updateItem']);


//Product Routes
Route::get('/admin/product/list', [App\Http\Controllers\ProductController::class, 'listProduct']);

Route::post('/admin/product/add', [App\Http\Controllers\ProductController::class, 'addProduct']);

Route::get('/admin/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct']);

Route::get('/admin/product/update/{id}', [App\Http\Controllers\ProductController::class, 'updProduct']);

Route::post('/admin/product/update/{id}', [App\Http\Controllers\ProductController::class, 'updateProduct']);

//Category view

Route::get('/product/category/view/{id}', [App\Http\Controllers\ProductController::class, 'categoryView']);

//Detail view
Route::get('/product/detail/view/{id}', [App\Http\Controllers\ProductController::class, 'detailView']);

//addToCartQty
Route::get('/product/addToCartQty/{id}',[App\Http\Controllers\ProductController::class, 'getAddToCartQty']);

//shoppingCart
Route::get('/product/shoppingCart',[App\Http\Controllers\ProductController::class, 'getCart']);

//Plus(+) shoppingCart
Route::get('/product/addToCart/{id}',[App\Http\Controllers\ProductController::class, 'getAddToCart']);

//Minus(-) shoppingCart
Route::get('/product/subToCart/{id}',[App\Http\Controllers\ProductController::class, 'getSubToCart']);

//RemoveshoppingCart
Route::get('/product/removeFromCart/{id}',[App\Http\Controllers\ProductController::class, 'getRemoveFromCart']);

//Clear ShoppingCart
Route::get('/product/clearCart',[App\Http\Controllers\ProductController::class, 'getClearCart']);

//Order
Route::get('/order',[App\Http\Controllers\ProductController::class, 'getOrder'])->middleware('auth');

//Payment
Route::get('/payment',[App\Http\Controllers\ProductController::class, 'getPayment']);
Route::post('/payment',[App\Http\Controllers\ProductController::class, 'createPayment']);