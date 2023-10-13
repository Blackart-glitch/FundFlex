<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::view('/register', 'auth.register')->name('register');
Route::view('/login', 'auth.login')->name('login');
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
Route::view('/reset-password', 'auth.reset-password')->name('password.reset');
Route::view('/verify-email', 'auth.verify-email')->name('verification.notice');
Route::view('/verify-email/{id}/{hash}', 'auth.verify-email')->name('verification.verify');
Route::view('/confirm-pepepe', 'auth.confirm-password')->name('password.confirm');
Route::view('/updatepass', 'auth.confirm-password')->name('password.update');
Route::view('/hfssu-password', 'auth.confirm-password')->name('password.email');
Route::post('/confirm-password', 'TransactionCategoryMappingController@bind')->name('password.store');

Route::view('/confirm-password', 'auth.confirm-password')->name('token');
