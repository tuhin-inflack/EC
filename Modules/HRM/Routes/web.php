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

Route::prefix( 'hrm' )->group( function () {
	Route::get( '/', 'HRMController@index' );

//	Route for employee

	Route::prefix( 'employee' )->group( function () {
//		Route::get('/general-info', 'EmployeePersonalInfoController@update');

		Route::post( 'general-info', 'EmployeeController@store' );


		Route::post( 'personal-info', 'EmployeePersonalInfoController@store' );
		Route::put( 'update-personal-info/{id}', 'EmployeePersonalInfoController@update' );

		Route::post( 'education-info', 'EmployeeEducationController@store' );
		Route::put( 'update-education-info/{id}', 'EmployeeEducationController@update' );


		Route::post( 'training-info', 'EmployeeTrainingController@store' );
		Route::put( 'update-training-info/{id}', 'EmployeeTrainingController@update' );

		Route::post( 'publication-info', 'EmployeePublicationController@store' );
		Route::put( 'update-publication-info/{id}', 'EmployeePublicationController@update' );


		Route::post( 'research-info', 'EmployeeResearchController@store' );

		Route::get( '/test', 'HRMController@test' );
	} );

	Route::resources( [ 'employee' => 'EmployeeController', ] );
} );

