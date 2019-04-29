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

Route::prefix('ims')->group(function() {

    Route::get('/', 'IMSController@index')->name('inventory');

    Route::prefix('product')->group(function() {
        Route::get('list', 'Product\ProductController@index')->name('inventory.product.list');
        Route::get('add', 'Product\ProductController@create')->name('inventory.product.create');
        Route::get('transfer', 'Product\TransferController@create')->name('inventory.product.transfer');
    });

    Route::prefix('warehouse')->group(function() {
        Route::get('list', 'Warehouse\WarehouseController@index')->name('inventory.warehouse.list');
        Route::get('add', 'Warehouse\WarehouseController@create')->name('inventory.warehouse.create');
    });

    Route::prefix('inventory')->group(function() {
        Route::get('/', 'Inventory\InventoryController@index')->name('inventory.list');
        Route::get('/add', 'Inventory\InventoryController@edit')->name('inventory.add');
        Route::get('/warehouse/list', 'Inventory\InventoryController@show')->name('inventory.list.by.warehouse');
    });

    //fixed-asset route
    Route::prefix('fixed-asset')->group(function() {
        Route::get('/', 'FixedAsset\FixedAssetController@index')->name('fixed-asset.list');
        Route::get('/add', 'FixedAsset\FixedAssetController@create')->name('fixed-asset.add');
        Route::post('/add', 'FixedAsset\FixedAssetController@store')->name('fixed-asset.add');
    });

});
