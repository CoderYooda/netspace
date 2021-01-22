<?php

use Illuminate\Support\Facades\Route;

//Route::view('/{any?}', 'index')->name('index');

//Route::view('/home', 'base')->name('lk');
//Route::view('/login', 'login')->name('login');

Route::view('/lc/{any?}/{var?}', 'index')->name('lk');


Route::view('/login', 'login')->name('login');


Route::view('/', 'lending.pages.home')->name('lending');
Route::view('/policy', 'lending.pages.policy')->name('policy');

Route::post('/check', 'App\Http\Controllers\Api\AbonentController@check')->name('check.call');
