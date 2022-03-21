<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;

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





Route::middleware('auth:api')->group(function () {
    Route::get('user', [AuthController::class,'details']);
    // Route::resource('pokemons', 'Api\PokemonController');
    Route::resource('products', 'Api\ProductController');
});
Route::get('user', [AuthController::class, 'user']);
Route::post('login', [AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);
