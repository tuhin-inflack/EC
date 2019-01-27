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
//Route::middleware( 'auth:web' )->group( function () {
Route::prefix( 'hrm' )->group( function () {
	Route::get('/', 'HRMController@index' );
	Route::get('/show', 'HRMController@show' ); // Temporary & Demo

	Route::prefix( 'employee' )->group( function () {

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
		Route::put( 'update-research-info/{id}', 'EmployeeResearchController@update' );
	} );

	Route::resources(
		[
			'employee'   => 'EmployeeController',
			'department' => 'DepartmentController',
			'designation' => 'DesignationController',
		]
	);

} );

//} );