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

Route::get('/home', function () {
    return view('home');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Artist Routes
Route::get('/admin/artist/list', [App\Http\Controllers\ArtistController::class, 'index']);

Route::post('/admin/artist/add', [App\Http\Controllers\ArtistController::class, 'store']);

Route::get('/admin/artist/delete/{id}', [App\Http\Controllers\ArtistController::class, 'delete']);

Route::get('/admin/artist/update/{id}', [App\Http\Controllers\ArtistController::class, 'show']);

Route::post('/admin/artist/update/{id}', [App\Http\Controllers\ArtistController::class, 'update']);


// //artwork Routes
Route::get('/admin/artwork/list', [App\Http\Controllers\ArtworkController::class, 'indexArtwork']);

Route::post('/admin/artwork/add', [App\Http\Controllers\ArtworkController::class, 'storeArtwork']);

Route::get('/admin/artwork/delete/{id}', [App\Http\Controllers\ArtworkController::class, 'deleteArtwork']);

Route::get('/admin/artwork/update/{id}', [App\Http\Controllers\ArtworkController::class, 'showArtwork']);

Route::post('/admin/artwork/update/{id}', [App\Http\Controllers\ArtworkController::class, 'updateArtwork']);


// //blog Routes
Route::get('/admin/blog/list', [App\Http\Controllers\BlogController::class, 'indexBlog']);

Route::post('/admin/blog/add', [App\Http\Controllers\BlogController::class, 'storeBlog']);

Route::get('/admin/blog/delete/{id}', [App\Http\Controllers\BlogController::class, 'deleteBlog']);

Route::get('/admin/blog/update/{id}', [App\Http\Controllers\BlogController::class, 'showBlog']);

Route::post('/admin/blog/update/{id}', [App\Http\Controllers\BlogController::class, 'updateBlog']);
