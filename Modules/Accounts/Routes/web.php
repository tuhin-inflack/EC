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

Route::prefix('accounts')->group(function() {
    Route::get('/', 'AccountsController@index');

    Route::prefix('account-head')->group(function () {
        Route::get('/', 'AccountHeadController@index')->name('account-head.index');
        Route::get('create', 'AccountHeadController@create')->name('account-head.create');
        Route::post('/', 'AccountHeadController@store')->name('account-head.store');
        Route::get('{accountHead}/edit', 'AccountHeadController@edit')->name('account-head.edit');
        Route::put('{accountHead}', 'AccountHeadController@update')->name('account-head.update');
        Route::delete('{accountHead}', 'AccountHeadController@destroy')->name('account-head.destroy');
    });
});