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

Route::prefix('hm')->group(function () {
    Route::get('/', 'HMController@index')->name('hm');
    Route::get('hostel-detail', 'HMController@show')->name('hostels.detail');

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

    Route::prefix('rooms')->group(function () {
        Route::get('/', 'RoomController@index')->name('rooms.index');
        Route::get('create', 'RoomController@create')->name('rooms.create');
        Route::post('/', 'RoomController@store')->name('rooms.store');
        Route::get('{room}/edit', 'RoomController@edit')->name('rooms.edit');
        Route::put('{room}', 'RoomController@update')->name('rooms.update');
        Route::delete('{room}', 'RoomController@destroy')->name('rooms.destroy');
    });

    Route::prefix('inventory-types')->group(function () {
        Route::get('create', 'InventoryTypeController@create')->name('inventory-types.create');
        Route::post('/', 'InventoryTypeController@store')->name('inventory-types.store');
    });

    Route::prefix('inventory-items')->group(function () {
        Route::get('create', 'InventoryItemController@create')->name('inventory-items.create');
        Route::post('/', 'InventoryItemController@store')->name('inventory-items.store');
    });

    Route::prefix('room-types')->group(function () {
        Route::get('create', 'RoomTypeController@create')->name('room-types.create');
    });

    Route::prefix('hostel-budgets')->group(function () {
        Route::get('create', 'HostelBudgetController@create')->name('hostel-budgets.create');
        Route::post('/', 'HostelBudgetController@store')->name('hostel-budgets.store');
    });

    Route::prefix('annual-purchases')->group(function () {
        Route::get('create', 'AnnualPurchaseController@create')->name('annual-purchases.create');
        Route::post('/', 'AnnualPurchaseController@store')->name('annual-purchases.store');
    });

    Route::prefix('stores')->group(function () {
        Route::get('create', 'HostelStoreController@create')->name('stores.create');
        Route::post('/', 'HostelStoreController@store')->name('stores.store');
    });

    Route::prefix('bookings')->group(function () {
        Route::get('create', 'HostelBookingController@create')->name('bookings.create');
    });

    Route::prefix('booking-rates')->group(function () {
        Route::get('create', 'HostelBookingRateController@create')->name('booking-rates.create');
    });

    Route::prefix('booking-requests')->group(function () {
        Route::get('/', 'BookingRequestController@index')->name('booking-requests.index');
        Route::get('show/{id}', 'BookingRequestController@show')->name('booking-requests.show');
    });
});

