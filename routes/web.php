<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;

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
