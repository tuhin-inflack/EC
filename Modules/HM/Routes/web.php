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

    Route::prefix('hostels')->group(function () {
        Route::get('/', 'HostelController@index')->name('hostels.index');
        Route::get('create', 'HostelController@create')->name('hostels.create');
        Route::post('/', 'HostelController@store')->name('hostels.store');
        Route::get('{hostel}/edit', 'HostelController@edit')->name('hostels.edit');
        Route::get('{hostel}', 'HostelController@show')->name('hostels.show');
        Route::put('{hostel}', 'HostelController@update')->name('hostels.update');
        Route::delete('{hostel}', 'HostelController@destroy')->name('hostels.destroy');
    });

    Route::prefix('room-types')->group(function () {
        Route::get('/', 'RoomTypeController@index')->name('room-types.index');
        Route::get('create', 'RoomTypeController@create')->name('room-types.create');
        Route::post('/', 'RoomTypeController@store')->name('room-types.store');
        Route::get('{roomType}/edit', 'RoomTypeController@edit')->name('room-types.edit');
        Route::put('{roomType}', 'RoomTypeController@update')->name('room-types.update');
        Route::delete('{roomType}', 'RoomTypeController@destroy')->name('room-types.destroy');
    });
});

