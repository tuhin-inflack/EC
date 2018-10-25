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
	Route::resources( [ 'employee' => 'EmployeeController', ] );
	Route::prefix( 'employee' )->group( function () {
		Route::post( 'general-info', 'EmployeeController@storeGeneralInfo' );
		Route::post( 'personal-info', 'EmployeeController@storePersonalInfo' );
		Route::post( 'education_info', 'EmployeeController@storeEducationalInfo' );
<<<<<<< HEAD
=======
		Route::post( 'training_info', 'EmployeeController@storeTrainingInfo' );
		Route::post( 'publication_info', 'EmployeeController@storePublicationInfo' );
		Route::post( 'research_info', 'EmployeeController@storeResearchInfo' );
>>>>>>> 1637a374d4cd8b7cc7f8f82d272599c10a60054e
	} );


} );
