<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\TransactionController;

use Illuminate\Http\Request;

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
    return view('welcome'); // resources/views/welcome.blade.php
})->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {

    // Notification
    Route::get('/notification', function () {
        return view('notification');
    })->name('notification');

    // Wallet
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');

    // Transaction History
    Route::get('/history', [TransactionController::class, 'index'])->name('transaction-history');

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
    Route::get('/support', function () {
        return view('support');
    })->name('support');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Promotions
    Route::get(
        '/promotions',
        function () {
            return view('promotions');
        }
    )->name('promotions');

    Route::get('/services', function () {

        $bills = (new BillController())->getallbills();

        return view('services', [
            'bills' => $bills,
        ]);
    })->name('services');



    Route::get(
        '/processing',
        function (Request $request) {
            session()->reflash();
            return view('processing');
        }
    )->name('processing');
});

require __DIR__ . '/auth.php';



//require __DIR__ . '/test-auth.php';
