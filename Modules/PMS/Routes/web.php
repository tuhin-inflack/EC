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

Route::prefix('pms')->group(function() {
    Route::get('/', 'PMSController@index')->name('pms');

    Route::prefix('project-requests')->group(function () {
        Route::get('/','ProjectRequestController@index')->name('project_request.index');
        Route::get('/create','ProjectRequestController@create')->name('project_request.create');
        Route::post('/','ProjectRequestController@store')->name('project_request.store');
        Route::get('{projectRequest}/edit', 'ProjectRequestController@edit')->name('project_request.edit');
        Route::put('{projectRequest}', 'ProjectRequestController@update')->name('project_request.update');
        Route::delete('{projectRequest}', 'ProjectRequestController@destroy')->name('project_request.destroy');
    });
});
