<?php

use Illuminate\Support\Facades\Route;

Route::view('/home', 'base')->name('lk');
Route::view('/login', 'login')->name('login');

Route::view('/{any?}', 'index')->name('index');

Route::view('/home', 'base')->name('lk');
Route::view('/login', 'login')->name('login');
