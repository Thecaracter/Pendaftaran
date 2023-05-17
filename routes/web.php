<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

//login route
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

// register route
Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/register', [RegisterController::class, 'register'])->name('register');

//logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//dashboard route
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('isLogin');
// User route
Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('isLogin');
Route::post('/user', [UserController::class, 'create'])->name('user.create')->middleware('isLogin');
Route::post('/user/{id}', [UserController::class, 'update'])->name('user.update')->middleware('isLogin');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('isLogin');

// Lomba route
Route::get('/lomba', [LombaController::class, 'index'])->name('lomba.index')->middleware('isLogin');
Route::post('/lomba', [LombaController::class, 'create'])->name('lomba.create')->middleware('isLogin');
Route::delete('/lomba/{id}', [LombaController::class, 'destroy'])->name('lomba.destroy')->middleware('isLogin');