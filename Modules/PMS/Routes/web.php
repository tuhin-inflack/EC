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
        Route::get('/', 'ProjectRequestController@index')->name('project-request.index');
        Route::get('/create', 'ProjectRequestController@create')->name('project-request.create');
        Route::post('/', 'ProjectRequestController@store')->name('project-request.store');
        Route::get('attachment-download/{projectRequest}','ProjectRequestController@requestAttachmentDownload')->name('project-request.attachment-download');
        Route::get('{projectRequest}', 'ProjectRequestController@show')->name('project-request.show');
        Route::get('{projectRequest}/edit', 'ProjectRequestController@edit')->name('project_request.edit');
        Route::put('{projectRequest}', 'ProjectRequestController@update')->name('project_request.update');
        Route::delete('{projectRequest}', 'ProjectRequestController@destroy')->name('project_request.destroy');
        Route::get('{projectRequest}/status-update', 'ProjectRequestController@statusUpdate')->name('project-request.status-update');
        Route::get('{projectRequest}/reject', 'ProjectRequestController@reject')->name('project_request.reject');
        Route::get('{projectRequest}/forward', 'ProjectRequestController@forward')->name('project_request.forward');
        Route::post('forward-store', 'ProjectRequestController@forward_store')->name('project_request.forward_store');

    });

    Route::prefix('requested-project-proposals')->group(function (){
        Route::get('/','RequestedProjectProposalController@index')->name('requested-project.index');
    });

    Route::prefix('project-proposal-submission')->group(function(){
        Route::get('/create','ProposalSubmissionController@create')->name('project-proposal-submission.create');
        Route::get('/','ProposalSubmissionController@index')->name('project-proposal-submission.index');
    });

    Route::prefix('project-proposal-submitted')->group(function(){
        Route::get('/','ProposalSubmittedController@index')->name('project-proposal-submitted.index');
    });

});
