<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('encode', function () {
    Route::get('url', 'UrlEncoderController@index')->name('urlencoder.index');
    Route::get('url', 'UrlEncoderController@encode')->name('urlencoder.encode');
    Route::get('url', 'UrlEncoderController@decode')->name('urlencoder.decode');

    Route::get('base64', 'Base64EncoderController@index')->name('base64encoder.index');
    Route::get('base64', 'Base64EncoderController@encode')->name('base64encoder.encode');
    Route::get('base64', 'Base64EncoderController@decode')->name('base64encoder.decode');
});

Route::get('/yoyu/{url}', 'YoYuSurgeConfController@transfer')->where('url', '.*$');
