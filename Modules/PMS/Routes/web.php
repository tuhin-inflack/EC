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

Route::prefix('pms')->group(function () {
    Route::get('/', 'PMSController@index')->name('pms');

    Route::prefix('project-requests')->group(function () {
        Route::get('/', 'ProjectRequestController@index')->name('project_request.index');
        Route::get('/create', 'ProjectRequestController@create')->name('project_request.create');
        Route::post('/', 'ProjectRequestController@store')->name('project_request.store');
        Route::get('{projectRequest}', 'ProjectRequestController@show')->name('project_request.show');
        Route::get('{projectRequest}/edit', 'ProjectRequestController@edit')->name('project_request.edit');
        Route::put('{projectRequest}', 'ProjectRequestController@update')->name('project_request.update');
        Route::delete('{projectRequest}', 'ProjectRequestController@destroy')->name('project_request.destroy');
        Route::get('{projectRequest}/approve', 'ProjectRequestController@approve')->name('project_request.approve');
        Route::get('{projectRequest}/reject', 'ProjectRequestController@reject')->name('project_request.reject');
        Route::get('{projectRequest}/forward', 'ProjectRequestController@forward')->name('project_request.forward');
        Route::post('forward-store', 'ProjectRequestController@forward_store')->name('project_request.forward_store');

    });

    Route::get('project-request-forwards', 'ProjectRequestForwardController@index')->name('project-request-forwards.index');
});
