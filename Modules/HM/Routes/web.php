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

Route::prefix('hm')->group(function() {
    Route::get('/', 'HMController@index');

    Route::prefix('room-types')->group(function () {
        Route::get('/', 'RoomTypeController@index');
        Route::get('create', 'RoomTypeController@create');
        Route::post('/', 'RoomTypeController@store')->name('Store-room-type');
    });
});

