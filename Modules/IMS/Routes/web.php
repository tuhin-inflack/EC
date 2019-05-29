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

Route::middleware(['auth', 'can:ims-access'])->prefix('ims')->group(function () {

    Route::get('/', 'IMSController@index')->name('inventory');

    // Inventory
    Route::prefix('inventory')->group(function () {
        Route::get('/', 'Inventory\InventoryController@index')->name('inventory.list');
        Route::get('/save/{reqId}', 'Inventory\InventoryController@save')->name('inventory.save');
        Route::get('/create', 'Inventory\InventoryController@create')->name('inventory.create');
        Route::get('/add', 'Inventory\InventoryController@edit')->name('inventory.add');
    });

    // Inventory Request
    Route::prefix('inventory-request')->group(function () {
        Route::get('/', 'Inventory\InventoryRequestController@index')->name('inventory-request.index');
        Route::get('create/{type?}', 'Inventory\InventoryRequestController@create')
            ->name('inventory-request.create')
            ->where('type', 'requisition|transfer|scrap|abandon');
        Route::post('create/{type?}', 'Inventory\InventoryRequestController@store')
            ->name('inventory-request.store')
            ->where('type', 'requisition|transfer|scrap|abandon');
        Route::get('{inventoryRequest}/edit', 'Inventory\InventoryRequestController@edit')->name('inventory-request.edit');
        Route::post('{inventoryRequest}/edit', 'Inventory\InventoryRequestController@update')->name('inventory-request.update');
        Route::delete('{inventoryRequest}/delete', 'Inventory\InventoryRequestController@destroy')->name('inventory-request.destroy');
    });

    // Inventory Item Category
    Route::prefix('inventory-item-category')->group(function (){
        Route::get('/','Inventory\InventoryCategoryController@index')->name('inventory-item-category.index');
        Route::get('/departmental-item-categories','Inventory\InventoryCategoryController@departmentalItemCategory')->name('inventory-item-category.departmental-item-categories');
        Route::get('/create','Inventory\InventoryCategoryController@create')->name('inventory-item-category.create');
        Route::post('/','Inventory\InventoryCategoryController@store')->name('inventory-item-category.store');
        Route::get('{inventoryItemCategory}/edit','Inventory\InventoryCategoryController@edit')->name('inventory-item-category.edit');
        Route::put('{inventoryItemCategory}/update','Inventory\InventoryCategoryController@update')->name('inventory-item-category.update');
        Route::get('{inventoryItemCategory}','Inventory\InventoryCategoryController@show')->name('inventory-item-category.show');
    });

    // Location
    Route::prefix('inventory-locations')->group(function (){
        Route::get('/','InventoryLocation\InventoryLocationController@index')->name('inventory-locations.index');
        Route::get('/create','InventoryLocation\InventoryLocationController@create')->name('inventory-locations.create');
        Route::post('/','InventoryLocation\InventoryLocationController@store')->name('inventory-locations.store');
        Route::get('{location}','InventoryLocation\InventoryLocationController@show')->name('inventory-locations.show');
        Route::get('{location}/edit','InventoryLocation\InventoryLocationController@edit')->name('inventory-locations.edit');
        Route::put('{location}/update','InventoryLocation\InventoryLocationController@update')->name('inventory-locations.update');
    });

    // Auction route
    Route::prefix('auction')->group(function () {
        Route::get('/', 'Auction\AuctionController@index')->name('auction.index');
        Route::get('/create', 'Auction\AuctionController@create')->name('auction.create');
        Route::post('/create', 'Auction\AuctionController@store')->name('auction.create');
        Route::get('/{id}', 'Auction\AuctionController@show')->name('auction.show');
        Route::get('/{id}/edit', 'Auction\AuctionController@edit')->name('auction.edit');
        Route::put('/{auction}/update', 'Auction\AuctionController@update')->name('auction.update');

        // Auction sales
        Route::prefix('sales')->group(function () {
            Route::get('create', 'AuctionSaleController@create')->name('auctions.sales.create');
        });
    });

    // Vendor
    Route::prefix('vendor')->group(function () {
       Route::get('/','Vendor\VendorController@index')->name('vendor.index');
       Route::get('/create','Vendor\VendorController@create')->name('vendor.create');
       Route::post('/','Vendor\VendorController@store')->name('vendor.store');
       Route::get('/{vendor}','Vendor\VendorController@show')->name('vendor.show');
       Route::get('{vendor}/edit','Vendor\VendorController@edit')->name('vendor.edit');
       Route::put('{vendor}/update','Vendor\VendorController@update')->name('vendor.update');
    });
});
