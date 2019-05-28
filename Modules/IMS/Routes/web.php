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

Route::prefix('ims')->middleware(['auth'])->group(function () {

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
        Route::get('/save/{reqId}', 'Inventory\InventoryController@save')->name('inventory.save');
        Route::get('/create', 'Inventory\InventoryController@create')->name('inventory.create');
        Route::get('/add', 'Inventory\InventoryController@edit')->name('inventory.add');
        Route::get('/warehouse/list', 'Inventory\InventoryController@show')->name('inventory.list.by.warehouse');
    });

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
        Route::get('/create','Inventory\InventoryCategoryController@create')->name('inventory-item-category.create');
        Route::post('/','Inventory\InventoryCategoryController@store')->name('inventory-item-category.store');
        Route::get('{inventoryItemCategory}/edit','Inventory\InventoryCategoryController@edit')->name('inventory-item-category.edit');
        Route::put('{inventoryItemCategory}/update','Inventory\InventoryCategoryController@update')->name('inventory-item-category.update');
        Route::get('{inventoryItemCategory}','Inventory\InventoryCategoryController@show')->name('inventory-item-category.show');
    });


    //Location
    Route::prefix('location')->group(function (){
        Route::get('/','Location\InventoryLocationController@index')->name('location.index');
        Route::get('/create','Location\InventoryLocationController@create')->name('location.create');
        Route::post('/','Location\InventoryLocationController@store')->name('location.store');
        Route::get('{location}','Location\InventoryLocationController@show')->name('location.show');
        Route::get('{location}/edit','Location\InventoryLocationController@edit')->name('location.edit');
        Route::put('{location}/update','Location\InventoryLocationController@update')->name('location.update');
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

    //Auction route
    Route::prefix('auction')->group(function () {
        Route::get('/', 'Auction\AuctionController@index')->name('auction.index');
        Route::get('/create', 'Auction\AuctionController@create')->name('auction.create');
        Route::post('/create', 'Auction\AuctionController@store')->name('auction.create');
        Route::get('/{id}', 'Auction\AuctionController@show')->name('auction.show');
        Route::get('/{id}/edit', 'Auction\AuctionController@edit')->name('auction.edit');
        Route::put('/{auction}/update', 'Auction\AuctionController@update')->name('auction.update');
    });
    //Vendor
    Route::prefix('vendor')->group(function () {
       Route::get('/','Vendor\VendorController@index')->name('vendor.index');
       Route::get('/create','Vendor\VendorController@create')->name('vendor.create');
       Route::post('/','Vendor\VendorController@store')->name('vendor.store');
       Route::get('/{vendor}','Vendor\VendorController@show')->name('vendor.show');
       Route::get('{vendor}/edit','Vendor\VendorController@edit')->name('vendor.edit');
       Route::put('{vendor}/update','Vendor\VendorController@update')->name('vendor.update');
    });


    // Auction sales
    Route::prefix('auctions/sales')->group(function () {
        Route::get('create', 'AuctionSaleController@create')->name('auctions.sales.create');
    });

});
