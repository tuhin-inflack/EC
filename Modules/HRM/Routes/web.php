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
    Route::prefix('loan')->group(function () {
        Route::get('/', 'EmployeeLoanController@create')->name('employee-loan.apply');
        Route::post('/', 'EmployeeLoanController@store')->name('employee-loan.store');
        Route::get('/list', 'EmployeeLoanController@index')->name('employee-loan.list');
    });

    // Routes for Employee HRM Training
    Route::prefix('training')->group(function () {
        Route::get('/', 'HRMTrainingController@create')->name('employee-training.apply');
        Route::post('/', 'HRMTrainingController@store')->name('employee-training.store');
        Route::get('/list/{trainingId?}', 'HRMTrainingController@index')->name('employee-training.list');
    });

    // Routes for Employee Attendance
    Route::prefix('attendance')->group(function () {
        Route::get('/', 'EmployeeAttendanceController@index')->name('employee-attendance.index');
        Route::post('/', 'EmployeeAttendanceController@store')->name('employee-training.store');
    });

    // Routes for Employee Punishment
    Route::prefix('punishment')->group(function () {
        Route::get('/list', 'EmployeePunishmentController@index')->name('employee-punishment.list');
        Route::get('/show/{punishmentId}', 'EmployeePunishmentController@show')->name('employee-punishment.show');
        Route::get('/create', 'EmployeePunishmentController@create')->name('employee-punishment.create');
        Route::post('/create', 'EmployeePunishmentController@store')->name('employee-punishment.store');
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
    #--------------- // House Rent Urls ---------------------------------

    #---------------- Notes Urls-----------------------------#
    Route::prefix('notes')->group(function () {
        Route::get('/', 'NotesController@index');
        Route::get('/create', 'NotesController@create');
        Route::get('/{id}', 'NotesController@show');
        Route::delete('/{id}', 'NotesController@destroy');
        Route::get('edit/{id}', 'NotesController@edit');
    });
    #--------------- // Note Urls ---------------------------------

    #---------------- Appraisal Urls-----------------------------#
    Route::prefix('appraisal')->group(function () {
        Route::get('/', 'AppraisalController@index');
        Route::get('/create', 'AppraisalController@create');
        Route::get('/{id}', 'AppraisalController@show');
        Route::delete('/{id}', 'AppraisalController@destroy');
        Route::get('/edit/{id}', 'AppraisalController@edit');

    });
    #--------------- // Appraisal Urls ---------------------------------

    #---------------- promotion Urls-----------------------------#
    Route::prefix('promotion')->group(function () {
        Route::get('/', 'PromotionController@index');
        Route::get('/promote', 'PromotionController@promote');

    });
    #--------------- // Promotion Urls ---------------------------------

    #---------------- Retirement Urls-----------------------------#
    Route::prefix('retirement')->group(function () {
        Route::get('/', 'AppraisalController@retirement');
        Route::get('/create', 'AppraisalController@create');
        Route::get('/{id}', 'AppraisalController@show');
        Route::delete('/{id}', 'AppraisalController@destroy');
        Route::get('edit/{id}', 'AppraisalController@edit');
    });
    #--------------- // Retirement Urls ---------------------------------

    #---------------- Contact Urls-----------------------------#
    Route::prefix('contact')->group(function () {
        Route::get('/', 'ContactController@index');
        Route::get('/create', 'ContactController@create');
        Route::get('/{id}', 'ContactController@show');
        Route::delete('/{id}', 'ContactController@destroy');
        Route::get('edit/{id}', 'ContactController@edit');
    });
    #--------------- // Contact Urls ---------------------------------

    #---------------- Contact Type Urls-----------------------------#
    Route::prefix('contact/type')->group(function () {
        Route::get('/create', 'ContactTypeController@create');

    });
    #--------------- // Contact Type Urls ---------------------------------


    Route::resources(
        [
            'employee' => 'EmployeeController',
            'department' => 'DepartmentController',
            'designation' => 'DesignationController',
            'job-circular' => 'JobCircularController'
        ]
    );
});

//} );