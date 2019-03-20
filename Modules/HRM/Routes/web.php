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
Route::prefix('hrm')->group(function () {
    Route::get('/', 'HRMController@index');
    Route::get('/show', 'HRMController@show'); // Temporary & Demo

    Route::prefix('employee')->group(function () {

        Route::post('general-info', 'EmployeeController@store');


        Route::post('personal-info', 'EmployeePersonalInfoController@store');
        Route::put('update-personal-info/{id}', 'EmployeePersonalInfoController@update');

        Route::post('education-info', 'EmployeeEducationController@store');
        Route::put('update-education-info/{id}', 'EmployeeEducationController@update');


        Route::post('training-info', 'EmployeeTrainingController@store');
        Route::put('update-training-info/{id}', 'EmployeeTrainingController@update');

        Route::post('publication-info', 'EmployeePublicationController@store');
        Route::put('update-publication-info/{id}', 'EmployeePublicationController@update');


        Route::post('research-info', 'EmployeeResearchController@store');
        Route::put('update-research-info/{id}', 'EmployeeResearchController@update');
    });

    // Routes for Employee Leave
    Route::prefix('leave')->group(function () {
        Route::get('/', 'EmployeeLeaveController@create')->name('employee-leave.apply');
        Route::post('/', 'EmployeeLeaveController@store')->name('employee-leave.store');
        Route::get('/list', 'EmployeeLeaveController@index')->name('employee-leave.list');
    });

    // Routes for Employee Loan
    Route::prefix('loan')->group( function (){
        Route::get('/', 'EmployeeLoanController@create')->name('employee-loan.apply');
        Route::post('/', 'EmployeeLoanController@store')->name('employee-loan.store');
        Route::get('/list', 'EmployeeLoanController@index')->name('employee-loan.list');
    });

    // Routes for Employee HRM Training
    Route::prefix('training')->group( function (){
        Route::get('/', 'HRMTrainingController@create')->name('employee-training.apply');
        Route::post('/', 'HRMTrainingController@store')->name('employee-training.store');
        Route::get('/list/{trainingId?}', 'HRMTrainingController@index')->name('employee-training.list');
    });

    // Routes for Employee Attendance
    Route::prefix('attendance')->group( function (){
        Route::get('/', 'EmployeeAttendanceController@index')->name('employee-attendance.index');
        Route::post('/', 'EmployeeAttendanceController@store')->name('employee-training.store');
    });

    #---------------- House Rent Urls-----------------------------#
    Route::prefix('house-rent')->group(function () {
        Route::get('/circulate-house', 'HouseRentController@index');
        Route::get('/apply-for-house', 'HouseRentController@applyForHouse');
        Route::get('/show-house', 'HouseRentController@showHouse');
        Route::get('/approve-house-rent', 'HouseRentController@approveHouseRent');
        Route::get('/apply', 'HouseRentController@showApplyForm');
        Route::get('/applications', 'HouseRentController@showAllApplications');
    });
    #--------------- /House Rent Urls ---------------------------------

    #---------------- Notes Urls-----------------------------#
    Route::prefix('notes')->group(function () {
        Route::get('/', 'NotesController@index');
        Route::get('/create', 'NotesController@create');
    });


	Route::resources(
		[
			'employee'   => 'EmployeeController',
			'department' => 'DepartmentController',
			'designation' => 'DesignationController',
            'job-circular' => 'JobCircularController'
		]
	);
});

//} );