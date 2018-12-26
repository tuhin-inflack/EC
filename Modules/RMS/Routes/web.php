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

Route::prefix('rms')->group(function() {
    Route::get('/', 'RMSController@index');

    Route::prefix('research-requests')->group(function () {
        Route::get('/create', 'ResearchRequestController@create')->name('research-request.create');
        Route::get('/', 'ResearchRequestController@index')->name('research-request.index');

    });

    Route::prefix('research-proposal-submission')->group(function(){
        Route::get('/','ProposalSubmitController@index')->name('research-proposal-submission.index');
        Route::get('create','ProposalSubmitController@create')->name('research-proposal-submission.create');
        Route::get('show/{id}','ProposalSubmitController@show')->name('research-proposal-submission.show');
    });

    Route::prefix('submitted-research-proposals')->group(function(){
        Route::get('/','ProposalSubmitController@submittedList')->name('research-proposal-submitted.index');
    });
});
