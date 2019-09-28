<?php

Use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('users', 'UserController@store')->name('user.store');

Route::put('users/{id}', 'UserController@update')->name('user.update');

Route::get('users/{id}', 'UserController@delete')->name('user.delete');

