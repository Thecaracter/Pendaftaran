<?php

use App\Http\Controllers\CetakPendaftaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPendaftaranController;
use App\Http\Controllers\ForgotPassword;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PendaftaranUserController;
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

// Dashboar route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('isLogin');


// Group middleware untuk admin
Route::middleware(['role:admin'])->group(function () {
    // User route
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Lomba route
    Route::get('/lomba', [LombaController::class, 'index'])->name('lomba.index');
    Route::post('/lomba', [LombaController::class, 'create'])->name('lomba.create');
    Route::post('/lomba/{id}', [LombaController::class, 'update'])->name('lomba.update');
    Route::delete('/lomba/{id}', [LombaController::class, 'destroy'])->name('lomba.destroy');

    // Pendaftaran route
    Route::get('/data-pendaftaran', [DataPendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::post('/data-pendaftaran', [DataPendaftaranController::class, 'store'])->name('pendaftaran.create');
    Route::post('/data-pendaftaran/{id}', [DataPendaftaranController::class, 'update'])->name('pendaftaran.update');
    Route::delete('/data-pendaftaran/{id}', [DataPendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');

    // Pembayaran route
    Route::get('/data-pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/data-pembayaran/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('/data-pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
});

Route::get('/pendaftaran', [PendaftaranUserController::class, 'index'])->name('pendaftaranuser.index')->middleware('isLogin');
Route::post('/pendaftaran', [PendaftaranUserController::class, 'store'])->name('pendaftaranuser.create')->middleware('isLogin');
Route::post('/pendaftaran/{id}', [PendaftaranUserController::class, 'update'])->name('pendaftaranuser.update')->middleware('isLogin');
Route::delete('/pendaftaran/{id}', [PendaftaranUserController::class, 'destroy'])->name('pendaftaranuser.destroy')->middleware('isLogin');
Route::get('/cetak-pendaftaran/{id}', [CetakPendaftaranController::class, 'generateCetakPendaftaran'])->name('cetak-pendaftaran.generate')->middleware('isLogin');
// profile route
Route::get('/profile', function () {
    return view('profile.profile');
});

Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update')->middleware('isLogin');

// Forgot Password route
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', [ForgotPassword::class, 'index'])->middleware('guest')->name('password.email');

// Reset Password route
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', [ForgotPassword::class, 'reset'])->middleware('guest')->name('password.update');


Route::get('/payment/{id}', [PaymentController::class, 'redirectToPayment'])->name('payment.redirect');


// Route untuk pembaruan status pembayaran
Route::post('/payment/callback', [PaymentController::class, 'callbackPayment'])->name('payment.callback');