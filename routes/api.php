<?php

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;

Route::post('/login', 'App\Http\Controllers\Api\AuthController@login')->name('login');
Route::post('/get_arches', 'App\Http\Controllers\Api\AbonentController@getArches')->name('arches');
Route::post('/pay', 'App\Http\Controllers\Api\AbonentController@pay')->name('balance.pay');
Route::post('/pay_check', 'App\Http\Controllers\Api\AbonentController@getOrderStatus')->name('balance.check');
Route::post('/change_pass', 'App\Http\Controllers\Api\AuthController@changePass')->name('pass.change');
Route::post('/change_phone', 'App\Http\Controllers\Api\AuthController@changePhone')->name('phone.change');

Route::post('/master_call', 'App\Http\Controllers\Api\AbonentController@masterCall')->name('master.call');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
