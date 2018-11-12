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

		Route::post( 'education_info', 'EmployeeEducationController@store' );
		Route::post( 'training_info', 'EmployeeController@storeTrainingInfo' );
		Route::post( 'publication_info', 'EmployeeController@storePublicationInfo' );
		Route::post( 'research_info', 'EmployeeController@storeResearchInfo' );

		Route::get( '/test', 'HRMController@test' );
	} );

	Route::resources( [ 'employee' => 'EmployeeController', ] );
} );

