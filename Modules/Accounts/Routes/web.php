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
    Route::get('/', 'AccountsController@index')->name('accounts');

    Route::prefix('account-head')->group(function () {
        Route::get('/', 'AccountHeadController@index')->name('account-head.index');
        Route::get('create', 'AccountHeadController@create')->name('account-head.create');
        Route::post('/', 'AccountHeadController@store')->name('account-head.store');
        Route::get('edit/{id}', 'AccountHeadController@edit')->name('account-head.edit');
        Route::put('update/{id}', 'AccountHeadController@update')->name('account-head.update');
        Route::delete('delete/{id}', 'AccountHeadController@destroy')->name('account-head.destroy');
    });
});