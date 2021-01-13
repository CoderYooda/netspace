<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'base')->name('lk');
Route::view('/login', 'login')->name('login');


Route::view('/lending', 'lending.pages.home')->name('lending');
Route::view('/policy', 'lending.pages.policy')->name('policy');


