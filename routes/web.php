<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login-email');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', [UserController::class, 'admin'])->name('admin');
Route::get('login/pass', [UserController::class, 'loginPass'])->name('login-pass');
Route::get('login/email', [UserController::class, 'loginEmail'])->name('login-email');
Route::post('check/email', [UserController::class, 'checkEmail'])->name('check-email');
Route::post('check/password', [UserController::class, 'checkPassword'])->name('check-password');
Route::get('profile', [UserController::class, 'profile'])->name('profile');
Route::post('user/profile', [UserController::class, 'avatar'])->name('user/profile');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('user-edit/{id}', [UserController::class, 'edit'])->name('user/edit');
Route::put('user-update/{id}', [UserController::class, 'update'])->name('user-update');
