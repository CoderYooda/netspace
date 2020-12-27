<?php

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;

Route::post('/login', 'App\Http\Controllers\Api\AuthController@login')->name('login');
Route::post('/get_arches', 'App\Http\Controllers\Api\AbonentController@getArches')->name('arches');
Route::post('/addBalance', 'App\Http\Controllers\Api\AbonentController@addBalance')->name('balance.add');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
