<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php'; */



require __DIR__ . '/test-auth.php';

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Notification
Route::get('/notification', function () {
    return view('notification');
})->name('notification');

// Wallet
Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet');

// Transaction History
Route::get('/history', function () {
    return view('transaction-history');
})->name('transaction-history');

// Settings
Route::get('/settings', function () {
    return view('settings');
})->name('settings');

// Profile
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

// Security
Route::get('/security', function () {
    return view('security');
})->name('security');

// Help / Support
Route::get('/help-support', function () {
    return view('help-support');
})->name('help-support');

// Promotions
Route::get('/promotions', function () {
    return view('promotions');
})->name('promotions');
