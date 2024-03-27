<?php

use App\Http\Controllers\Api\GenresController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypologyController;
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

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{slug}', [RestaurantController::class, 'show']);
Route::get('/restaurants/typologies/{slug}', [RestaurantController::class, 'typology_restaurants']);

Route::get('/typologies', [TypologyController::class, 'index']);

Route::get('/genres', [GenresController::class, 'index']);

Route::get('/menu/{slug}', [MenuController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
