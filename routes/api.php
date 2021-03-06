<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login')->name("login");
    Route::post('logout', 'AuthController@logout')->name("logout");
});

Route::get('close-contacts', 'CloseContactController@index')->name('close-contacts');
Route::group(['prefix' => 'close-contact'], function () {
    Route::post('save', 'CloseContactController@create')->name('close-contact-create');
});
