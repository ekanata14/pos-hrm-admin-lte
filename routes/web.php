<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemInOutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class)
->name('index', 'users.index')
->name('create', 'users.create')
->name('store', 'users.create.perform')
->name('edit', 'users.edit')
->name('update', 'users.edit.perform')
->name('destroy', 'users.delete.perform');

Route::resource('profile', UserProfileController::class)
->name('index', 'profiles.index')
->name('create', 'profiles.create')
->name('store', 'profiles.create.perform')
->name('edit', 'profiles.edit')
->name('update', 'profiles.edit.perform')
->name('destroy', 'profiles.delete.perform');

Route::resource('supplier', SupplierController::class)
->name('index', 'suppliers.index')
->name('create', 'suppliers.create')
->name('store', 'suppliers.create.perform')
->name('edit', 'suppliers.edit')
->name('update', 'suppliers.edit.perform')
->name('destroy', 'suppliers.delete.perform');

Route::resource('category', CategoryController::class)
->name('index', 'category.index')
->name('create', 'category.create')
->name('store', 'category.create.perform')
->name('edit', 'category.edit')
->name('update', 'category.edit.perform')
->name('destroy', 'category.delete.perform');

Route::resource('items', ItemController::class)
->name('index', 'items.index')
->name('create', 'items.create')
->name('store', 'items.create.perform')
->name('show', 'items.show')
->name('edit', 'items.edit')
->name('update', 'items.edit.perform')
->name('destroy', 'items.delete.perform');

Route::resource('itemsInOut', ItemInOutController::class)
->name('index', 'inout.index')
->name('create', 'inout.create')
->name('store', 'inout.create.perform')
->name('show', 'inout.show')
->name('edit', 'inout.edit')
->name('update', 'inout.edit.perform')
->name('destroy', 'inout.delete.perform');

Route::resource('cart', CartController::class)
->name('index', 'cart.index')
->name('create', 'cart.create')
->name('store', 'cart.create.perform')
->name('show', 'cart.show')
->name('edit', 'cart.edit')
->name('update', 'cart.edit.perform')
->name('destroy', 'cart.delete.perform');

Route::resource('checkout', CheckoutController::class)
->name('index', 'checkout.index')
->name('create', 'checkout.create')
->name('store', 'checkout.create.perform')
->name('show', 'checkout.show')
->name('edit', 'checkout.edit')
->name('update', 'checkout.edit.perform')
->name('destroy', 'checkout.delete.perform');

Route::resource('pos', PosController::class)
->name('index', 'pos.index')
->name('create', 'pos.create')
->name('store', 'pos.create.perform')
->name('show', 'pos.show')
->name('edit', 'pos.edit')
->name('update', 'pos.edit.perform')
->name('destroy', 'pos.delete.perform');
