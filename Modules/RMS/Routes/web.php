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
        Route::get('{researchRequest}/create','ProposalSubmitController@create')->name('research-proposal-submission.create');
        Route::post('/','ProposalSubmitController@store')->name('research-proposal-submission.store');
        Route::get('show/{id}','ProposalSubmitController@show')->name('research-proposal-submission.show');
    });

    Route::prefix('received-research-proposals')->group(function(){
        Route::get('/','ReceivedResearchProposalController@index')->name('received-research-proposal.index');
    });

    Route::prefix('organization')->group(function () {
        Route::get('/add-organization/{id?}', 'ReceivedResearchProposalController@addOrganization')->name('organization.add-research-organization');
        Route::post('/store-organization/{id?}', 'ReceivedResearchProposalController@storeOrganization')->name('organization.store-research-organization');
    });
    Route::prefix('member')->group(function () {
        Route::get('/add-member/{organizationId?}', 'OrganizationMemberController@addOrganizationMember')->name('member.add-org-member');
        Route::post('/store-organization-member/', 'OrganizationMemberController@storeOrganizationMember')->name('member.store-org-member');
        Route::get('/edit-organization-member/{memberId?}', 'OrganizationMemberController@editOrganizationMember')->name('member.edit-org-member');
        Route::post('/update-organization-member/{memberId?}', 'OrganizationMemberController@UpdateOrganizationMember')->name('member.update-org-member');
    });

    Route::prefix('invited-research-proposals')->group(function (){
        Route::get('/','InvitedResearchProposalController@index')->name('invited-research-proposal.index');
        Route::get('{researchRequest}','InvitedResearchProposalController@show')->name('invited-research-proposal.show');
        Route::get('file-download/{researchRequestAttachment}','InvitedResearchProposalController@fileDownload')->name('invited-research-proposal.file-download');
        Route::get('{researchRequest}/request-date-extend','InvitedResearchProposalController@requestDateExtend')->name('invited-research-proposal.request-date-extend');
        Route::post('/','InvitedResearchProposalController@storeDateExtendRequest')->name('invited-research-proposal.store-date-extend-request');
    });

    Route::prefix('task')->group(function () {
        Route::get('/{projectId}', 'TaskController@index')->name('research.task.index');
        Route::get('/show/{taskId}', 'TaskController@show')->name('research.task.show');
        Route::get('/create/{researchId}', 'TaskController@create')->name('research.task.create');
        Route::post('/create/{researchId}', 'TaskController@store')->name('research.task.store');
        Route::get('/edit/{taskId}', 'TaskController@edit')->name('research.task.edit');
        Route::post('/edit/{taskId}', 'TaskController@update')->name('research.task.update');
        Route::get('/start-end/{taskId}', 'TaskController@toggleStartEndTask')->name('research.task.toggleStartEnd');
        Route::delete('/delete/{taskId}', 'TaskController@destroy')->name('research.task.delete');
    });
});
