<?php

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;

Route::post('/login', 'App\Http\Controllers\Api\AuthController@login')->name('login');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
