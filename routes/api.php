<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ProductController;
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
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('insert-product', [ProductController::class, 'insert']);
Route::post('delete-product', [ProductController::class, 'delete']);
Route::post('insert-category', [crud_category_controller::class, 'insert']);
Route::post('delete-category', [crud_category_controller::class, 'delete']);


Route::group( ['middleware' => ["auth:sanctum"]], function(){
    //rutas
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout', [UserController::class, 'logout']);
});
