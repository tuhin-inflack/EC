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

use Illuminate\Http\Request;

Route::prefix('rms')->group(function() {
    Route::get('/', 'RMSController@index')->name('rms.index');

    Route::prefix('research-requests')->group(function () {
        Route::get('/create', 'ResearchRequestController@create')->name('research-request.create');
        Route::get('/', 'ResearchRequestController@index')->name('research-request.index');
        Route::post('/','ResearchRequestController@store')->name('research-request.store');
        Route::get('attachment-download/{researchRequest}','ResearchRequestController@requestAttachmentDownload')->name('research-request.attachment-download');
    });

    Route::prefix('research-proposal-submission')->group(function(){
        Route::get('/','ProposalSubmitController@index')->name('research-proposal-submission.index');
        Route::get('create','ProposalSubmitController@create')->name('research-proposal-submission.create');
        Route::get('show/{id}','ProposalSubmitController@show')->name('research-proposal-submission.show');
    });

    Route::prefix('submitted-research-proposals')->group(function(){
        Route::get('/','ProposalSubmitController@submittedList')->name('research-proposal-submitted.index');
    });

    Route::prefix('invited-research-proposals')->group(function (){
        Route::get('/','InvitedResearchProposalController@index')->name('invited-research-proposal.index');
        Route::get('{researchRequest}','InvitedResearchProposalController@show')->name('invited-research-proposal.show');
        Route::get('file-download/{researchRequestAttachment}','InvitedResearchProposalController@fileDownload')->name('invited-research-proposal.file-download');
    });

});
