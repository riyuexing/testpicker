<?php

use Illuminate\Http\Request;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

//User api
Route::post('/register', 'Auth\RegisterController@postRegister');
Route::post('/login', 'Auth\LoginController@postLogin');
Route::post('users/reset-password', 'Auth\PasswordController@postReset');


//Dashboard Controller
