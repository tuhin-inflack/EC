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

Route::prefix('ims')->group(function () {

    Route::get('/', 'IMSController@index')->name('inventory');

    Route::prefix('product')->group(function() {
        Route::get('/', 'Product\ProductController@index')->name('inventory.product.index');
        Route::get('create', 'Product\ProductController@create')->name('inventory.product.create');
        Route::post('/', 'Product\ProductController@store')->name('inventory.product.store');
        Route::get('{product}', 'Product\ProductController@show')->name('inventory.product.show');
        Route::get('{product}/edit', 'Product\ProductController@edit')->name('inventory.product.edit');
        Route::put('{product}/update','Product\ProductController@update')->name('inventory.product.update');
        Route::get('transfer', 'Product\TransferController@create')->name('inventory.product.transfer');
    });

    Route::prefix('warehouse')->group(function () {
        Route::get('list', 'Warehouse\WarehouseController@index')->name('inventory.warehouse.list');
        Route::get('add', 'Warehouse\WarehouseController@create')->name('inventory.warehouse.create');
        Route::post('/', 'Warehouse\WarehouseController@store')->name('inventory.warehouse.store');
        Route::get('{warehouse}', 'Warehouse\WarehouseController@show')->name('inventory.warehouse.show');
        Route::get('{warehouse}/edit','Warehouse\WarehouseController@edit')->name('inventory.warehouse.edit');
        Route::put('{warehouse}/update','Warehouse\WarehouseController@update')->name('inventory.warehouse.update');
    });

    Route::prefix('inventory')->group(function () {
        Route::get('/', 'Inventory\InventoryController@index')->name('inventory.list');
        Route::get('/create', 'Inventory\InventoryController@create')->name('inventory.create');
        Route::get('/warehouse/list', 'Inventory\InventoryController@show')->name('inventory.list.by.warehouse');
    });

    //fixed-asset route
    Route::prefix('fixed-asset')->group(function () {
        Route::get('/', 'FixedAsset\FixedAssetController@index')->name('fixed-asset.list');
        Route::get('/add', 'FixedAsset\FixedAssetController@create')->name('fixed-asset.add');
        Route::post('/add', 'FixedAsset\FixedAssetController@store')->name('fixed-asset.add');
        Route::get('/{id}', 'FixedAsset\FixedAssetController@show')->name('fixed-asset.show');
        Route::get('add/{type}', 'FixedAsset\FixedAssetController@change_value')->name('fixed-asset.add_appreciation_depreciation');
    });

    //Routes for Asset Management
    Route::prefix('asset')->group(function () {
        Route::get('/', 'AssetManagementController@index')->name('asset.list');
        Route::get('/add', 'AssetManagementController@create')->name('asset.add');
        Route::post('/add', 'AssetManagementController@store')->name('asset.store');
        Route::get('/{id}', 'AssetManagementController@show')->name('asset.show');
        Route::get('add/{type}', 'AssetManagementController@change_value')->name('asset.add_appreciation_depreciation');
    });



});
