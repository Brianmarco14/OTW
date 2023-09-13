<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
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

Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/profile', [AuthController::class, 'profile'])->middleware(['auth:sanctum']);

Route::post('/users', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']);
Route::middleware('auth:sanctum')->prefix('adm')->group(function () {
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::put('/users/{id}', [UserController::class, 'update']);
});

Route::get('/pagesHome', [PageController::class, 'new']);
Route::get('/pages', [PageController::class, 'index']);
Route::post('/pages', [PageController::class, 'store']);
Route::get('/pages/{id}', [PageController::class, 'show']);
Route::delete('/pages/{id}', [PageController::class, 'destroy']);
Route::put('/pages/{id}', [PageController::class, 'update']);

Route::get('/playlistsHome', [PlaylistController::class, 'new']);
Route::get('/playlists', [PlaylistController::class, 'index']);
Route::post('/playlists', [PlaylistController::class, 'store']);
Route::get('/playlists/{id}', [PlaylistController::class, 'show']);
Route::delete('/playlists/{id}', [PlaylistController::class, 'destroy']);
Route::put('/playlists/{id}', [PlaylistController::class, 'update']);

Route::get('/worksHome', [WorkController::class, 'new']);
Route::get('/works', [WorkController::class, 'index']);
Route::post('/works', [WorkController::class, 'store']);
Route::get('/works/{id}', [WorkController::class, 'show']);
Route::delete('/works/{id}', [WorkController::class, 'destroy']);
Route::put('/works/{id}', [WorkController::class, 'update']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);

Route::get('/genres', [GenreController::class, 'index']);
Route::post('/genres', [GenreController::class, 'store']);
Route::get('/genres/{id}', [GenreController::class, 'show']);
Route::delete('/genres/{id}', [GenreController::class, 'destroy']);
Route::put('/genres/{id}', [GenreController::class, 'update']);

Route::get('/likes', [LikeController::class, 'index']);
Route::post('/likes', [LikeController::class, 'store']);
Route::get('/likes/{id}', [LikeController::class, 'show']);
Route::delete('/likes/{id}', [LikeController::class, 'destroy']);
Route::put('/likes/{id}', [LikeController::class, 'update']);

Route::get('/subs', [SubscribeController::class, 'index']);
Route::post('/subs', [SubscribeController::class, 'store']);
Route::get('/subs/{id}', [SubscribeController::class, 'show']);
Route::delete('/subs/{id}', [SubscribeController::class, 'destroy']);
Route::put('/subs/{id}', [SubscribeController::class, 'update']);
