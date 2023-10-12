<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', 'Auth\LoginController@login');
Route::post('/register', 'Auth\RegisterController@register');
Route::middleware('auth:api')->group(function () {
    Route::get('/user', 'UserController@user');
    Route::post('/logout', 'Auth\LoginController@logout');
});
