<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'base')->name('lk');
Route::view('/login', 'login')->name('login');
