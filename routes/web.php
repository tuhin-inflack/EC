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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::middleware(['force_password'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/', 'HomeController@landing')->name('welcome');

        Route::resource('system/user', 'UserController');
        Route::resource('user/role', 'RoleController');
        Route::resource('user/permission', 'PermissionController');
    });

    Route::get('/change/password', 'ChangePasswordController@change');
    Route::post('/change/password', 'ChangePasswordController@update');
});

Route::get('booking-requests', 'PublicBookingRequestController@create')->name('public-booking-requests.create');
Route::post('booking-requests', 'PublicBookingRequestController@store')->name('public-booking-requests.store');
