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
    });

    Route::prefix('requested-project-proposals')->group(function (){
        Route::get('/','RequestedProjectProposalController@index')->name('requested-project.index');
    });

    Route::prefix('project-proposal-submission')->group(function(){
        Route::get('/','ProjectProposalController@index')->name('project-proposal-submission.index');
        Route::get('/create','ProjectProposalController@create')->name('project-proposal-submission.create');
        Route::post('/','ProjectProposalController@store')->name('project-proposal-submission.store');
    });

    Route::prefix('project-proposal-submitted')->group(function(){
        Route::get('/','ProposalSubmittedController@index')->name('project-proposal-submitted.index');
    });

});
