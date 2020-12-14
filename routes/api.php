<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\UserController;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
   
});



Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('orders/{user}', [OrderController::class, 'show']);