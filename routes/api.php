<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login','authController@login');
Route::post('register','authController@register');
Route::middleware('auth:api')->post('logout','authController@logout');

Route::apiResource('/products','ProductController');
Route::group(['prefix'=>'products'],function(){
	Route::apiResource('/{product}/reviews','ReviewController');
});
