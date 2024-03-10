<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemInOutController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/me', [AuthController::class, 'me'])->middleware("auth:sanctum");

// User
Route::post('/editUser', [UserController::class, 'updateApi'])->middleware('auth:sanctum');
Route::post('changePassword', [UserController::class, 'updatePasswordApi'])->middleware('auth:sanctum');

// Item
Route::get('/items', [ItemController::class, 'indexApi'])->middleware('auth:sanctum');
Route::get('/items/{id}', [ItemController::class, 'getByCategoryApi'])->middleware('auth:sanctum');

// Category
Route::get('/category', [CategoryController::class, 'indexApi'])->middleware('auth:sanctum');

// Cart
Route::get('/checkCart/{id}', [CartController::class, 'checkCart'])->middleware('auth:sanctum');
Route::post('/cart', [CartController::class, 'storeApi'])->middleware('auth:sanctum');

// Item In Out
Route::get('/iteminout', [ItemInOutController::class, 'indexApi'])->middleware('auth:sanctum');
Route::post('/itemOut', [ItemInOutController::class, 'storeApi'])->middleware('auth:sanctum');
Route::get('/itemByCart/{id}', [ItemInOutController::class, 'findByCart'])->middleware('auth:sanctum');
Route::get('/itemDestroy/{id}', [ItemInOutController::class, 'destroyApi'])->middleware('auth:sanctum');
Route::get('/itemToday', [ItemInOutController::class, 'historyPerDay'])->middleware('auth:sanctum');

// Checkout
Route::post('/checkout', [CheckoutController::class, 'storeApi'])->middleware('auth:sanctum');
Route::get('/checkoutLeaderboard', [CheckoutController::class, 'checkOutLeaderBoard'])->middleware('auth:sanctum');


// In Out
// Route::post('/out')