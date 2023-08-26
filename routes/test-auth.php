<?php

use Illuminate\Support\Facades\Route;

Route::view('/register', 'auth.register')->name('register');
Route::view('/login', 'auth.login')->name('login');
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
Route::view('/reset-password/{token}', 'auth.reset-password')->name('password.reset');
Route::view('/verify-email', 'auth.verify-email')->name('verification.notice');
Route::view('/verify-email/{id}/{hash}', 'auth.verify-email')->name('verification.verify');
Route::view('/confirm-password', 'auth.confirm-password')->name('password.confirm');
