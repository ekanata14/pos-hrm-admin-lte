<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemInOutController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Models\ItemInOut;

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

// Profile
Route::post('/editUser', [UserController::class, 'updateApi'])->middleware('auth:sanctum');
Route::post('/changePassword', [UserController::class, 'updatePasswordApi'])->middleware('auth:sanctum');

// User
Route::get('/users', [UserController::class, 'getUsersApi'])->middleware('auth:sanctum');
Route::get('/users/{id}', [UserController::class, 'getUserById'])->middleware('auth:sanctum');
Route::post('/users', [UserController::class, 'storeUserApi'])->middleware('auth:sanctum');
Route::post('/users/edit', [UserController::class, 'updateApi'])->middleware('auth:sanctum');
Route::get('/users/delete/{id}', [UserController::class, 'deleteUserApi'])->middleware('auth:sanctum');

// Supplier
Route::get('/supplier', [SupplierController::class, 'getSupplier'])->middleware('auth:sanctum');
Route::get('/supplier/{id}', [SupplierController::class, 'getSupplierById'])->middleware('auth:sanctum');
Route::post('/supplier', [SupplierController::class, 'storeSupplierApi'])->middleware('auth:sanctum');
Route::post('/supplier/edit', [SupplierController::class, 'updateSupplierApi'])->middleware('auth:sanctum');
Route::get('/supplier/delete/{id}', [SupplierController::class, 'deleteSupplierApi'])->middleware('auth:sanctum');

// Item
Route::get('/items', [ItemController::class, 'indexApi'])->middleware('auth:sanctum');
Route::get('/itemsById/{id}', [ItemController::class, 'getItemsById'])->middleware('auth:sanctum');
Route::get('/itemsSup/{id}', [ItemController::class, 'getItemsBySupplier'])->middleware('auth:sanctum');
Route::get('/items/{id}', [ItemController::class, 'getByCategoryApi'])->middleware('auth:sanctum');
Route::post('/items', [ItemController::class, 'storeItemsApi'])->middleware('auth:sanctum');
Route::post('/items/edit', [ItemController::class, 'updateItemsApi'])->middleware('auth:sanctum');
Route::get('/items/delete/{id}', [ItemController::class, 'deleteItemsApi'])->middleware('auth:sanctum');

// Category
Route::get('/category', [CategoryController::class, 'indexApi'])->middleware('auth:sanctum');

// Cart
Route::get('/checkCart/{id}', [CartController::class, 'checkCart'])->middleware('auth:sanctum');
Route::post('/cart', [CartController::class, 'storeApi'])->middleware('auth:sanctum');

// Item In Out
Route::get('/iteminout', [ItemInOutController::class, 'indexApi'])->middleware('auth:sanctum');
Route::post('/itemInOut', [ItemInOutController::class, 'storeApi'])->middleware('auth:sanctum');
Route::get('/itemByCart/{id}', [ItemInOutController::class, 'findByCart'])->middleware('auth:sanctum');
Route::get('/itemDestroy/{id}', [ItemInOutController::class, 'destroyApi'])->middleware('auth:sanctum');
Route::get('/itemToday/{date}', [ItemInOutController::class, 'historyPerDay'])->middleware('auth:sanctum');
Route::get('/totalPerDay/{date}', [ItemInOutController::class, 'totalPerDay'])->middleware('auth:sanctum');
Route::get('/totalAll', [ItemInOutController::class, 'totalAll'])->middleware('auth:sanctum');

// Checkout
Route::post('/checkout', [CheckoutController::class, 'storeApi'])->middleware('auth:sanctum');
Route::get('/checkoutLeaderboard', [CheckoutController::class, 'checkOutLeaderBoard'])->middleware('auth:sanctum');
Route::get('/total', [CheckoutController::class, 'totalApi'])->middleware('auth:sanctum');


// In Out
// Route::post('/out')