<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\BanksController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TwoFactorAuthentication;
use App\Models\FlaggedTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    //acepts the verification link for authentication
    /*     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify'); */

    Route::post('verify-email-token', [VerifyEmailController::class, 'validate_token'])
        ->name('verify.token');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');


    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::post('wallet/generate', [WalletController::class, 'generateWallet'])->name('wallet.generate');

    Route::post('wallet/topup', [TransactionController::class, 'topUp'])->name('wallet.topup');

    Route::get('two-factor-authentication', [TwoFactorAuthentication::class, 'index'])->name('two-factor');

    Route::post('two-factor-authentication', [TwoFactorAuthentication::class, 'index'])->name('two-factor');

    Route::post('banks', [BanksController::class, 'get_banks'])->name('banks');

    Route::post('verify-wallet', [BanksController::class, 'get_wallet'])->name('verify-wallet');

    Route::post('verify-bank-account', [BanksController::class, 'verify_bank_account'])->name('verify-bank-account');

    Route::post('wallet/transfer', [TransactionController::class, 'transfer'])->name('wallet.transfer');

    Route::post('wallet/withdraw', [TransactionController::class, 'withdraw'])->name('wallet.withdraw');

    Route::post('wallet/bill', [TransactionController::class, 'payBill'])->name('wallet.bill');

    Route::get('verify/transaction', [TransactionController::class, 'verify_PG_transaction']);

    Route::post('/transaction/flag', function (Request $request) {
        $request->validate([
            'transaction_id' => 'required',
            'reason' => 'required|string',
        ]);

        $transaction = (new TransactionController())->show($request->transaction_id);

        if ($transaction === null) {
            return redirect()->route('dashboard')->with('error', 'Transaction not found');
        }

        if ($transaction->sender_id !== auth()->user()->id) {
            return redirect()->route('dashboard')->with('error', 'Sorry, You cannot flag this transaction since your are not the sender');
        }

        $flagged_transaction = FlaggedTransaction::create([
            'user_id' => $transaction->sender_id,
            'transaction_id' => $transaction->id,
            'recipient_id' => $transaction->receiver_id,
            'reason' => $request->reason,
        ]);


        return redirect()->route('dashboard')->with('success', 'Transaction flagged successfully. you would be notified when the issue is resolved');
    })->name('transaction.flag');
});
