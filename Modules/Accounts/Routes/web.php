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
    Route::get('show', 'AccountsController@show'); // Temporary & demo
    Route::get('/chart-of-account', 'AccountsController@chartOfAccount')->name('chart-of-account');

    Route::prefix('account-head')->group(function () {
        Route::get('create', 'AccountHeadController@create')->name('account-head.create');
        Route::post('/', 'AccountHeadController@store')->name('account-head.store');
        Route::get('edit/{id}', 'AccountHeadController@edit')->name('account-head.edit');
        Route::put('update/{id}', 'AccountHeadController@update')->name('account-head.update');
        Route::delete('delete/{id}', 'AccountHeadController@destroy')->name('account-head.destroy');
    });

    Route::prefix('account-ledger')->group(function () {
        Route::get('create', 'AccountLedgerController@create')->name('account-ledger.create');
        Route::post('/', 'AccountLedgerController@store')->name('account-ledger.store');
        Route::get('edit/{id}', 'AccountLedgerController@edit')->name('account-ledger.edit');
        Route::put('update/{id}', 'AccountLedgerController@update')->name('account-ledger.update');
        Route::delete('delete/{id}', 'AccountLedgerController@destroy')->name('account-ledger.destroy');
    });

    Route::prefix('economy-code')->group(function () {
        Route::get('/', 'EconomyCodeController@index')->name('economy-code.index');
        Route::get('create', 'EconomyCodeController@create')->name('economy-code.create');
        Route::post('store', 'EconomyCodeController@store')->name('economy-code.store');
        Route::get('edit/{economyCode}', 'EconomyCodeController@edit')->name('economy-code.edit');
        Route::put('update/{economyCode}', 'EconomyCodeController@update')->name('economy-code.update');
        Route::delete('delete/{economyCode}', 'EconomyCodeController@destroy')->name('economy-code.destroy');
    });

    Route::prefix('economy-head')->group(function () {
        Route::get('/', 'EconomyHeadController@index')->name('economy-head.index');
        Route::get('create', 'EconomyHeadController@create')->name('economy-head.create');
        Route::post('store', 'EconomyHeadController@store')->name('economy-head.store');
        Route::get('edit/{economyHead}', 'EconomyHeadController@edit')->name('economy-head.edit');
        Route::put('update/{economyHead}', 'EconomyHeadController@update')->name('economy-head.update');
        Route::delete('delete/{economyHead}', 'EconomyHeadController@destroy')->name('economy-head.destroy');
    });
});