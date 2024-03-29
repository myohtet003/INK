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
Route::get('artists/list',[App\Http\Controllers\ArtistController::class, 'index']);

Route::get('artworks/list',[App\Http\Controllers\ArtworkController::class, 'indexArtwork']);

Route::get('blogs/list',[App\Http\Controllers\BlogController::class, 'indexBlog']); 





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


