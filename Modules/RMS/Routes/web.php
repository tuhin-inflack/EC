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

Route::prefix('rms')->group(function () {
    Route::get('/', 'RMSController@index')->name('rms.index');

    Route::prefix('researches')->group(function () {
        Route::get('/', 'ResearchController@index')->name('research.index');
        Route::get('/create', 'ResearchController@create')->name('research.create');
        Route::post('/', 'ResearchController@store')->name('research.store');
        Route::get('{research}', 'ResearchController@show')->name('research.show');
        Route::prefix('{research}')->group(function () {
            // research organizations
            Route::prefix('organizations')->group(function () {
                Route::get('create', 'OrganizationController@create')->name('rms-organizations.create');
                Route::get('{organization}', 'OrganizationController@show')->name('rms-organizations.show');
            });
            // research tasks
            Route::prefix('tasks')->group(function () {
                Route::get('create', 'TaskController@create')->name('rms-tasks.create');
                Route::post('/', 'TaskController@store')->name('rms-tasks.store');
                Route::get('{task}', 'TaskController@show')->name('rms-tasks.show');
                Route::get('{task}/edit', 'TaskController@edit')->name('rms-tasks.edit');
                Route::put('{task}', 'TaskController@update')->name('rms-tasks.update');
                Route::delete('{task}', 'TaskController@destroy')->name('rms-tasks.destroy');
                // Task time
                Route::put('{task}/time', 'TaskTimeController@update')->name('rms-tasks.time');
            });
        });
    });
    // organization
    Route::prefix('organizations/{organization}')->group(function () {
        // organization members
        Route::prefix('members')->group(function () {
            $OrganizationMemberController = '\App\Http\Controllers\OrganizationMemberController';
            Route::get('create', $OrganizationMemberController . '@create')->name('rms-organization-members.create');
            Route::post('/', $OrganizationMemberController . '@store')->name('rms-organization-members.store');
            Route::get('{member}/edit', $OrganizationMemberController . '@edit')->name('rms-organization-members.edit');
            Route::put('{member}', $OrganizationMemberController . '@update')->name('rms-organization-members.update');
        });
        // organization attribute
        Route::prefix('attributes')->group(function () {
            $AttributeController = '\App\Http\Controllers\AttributeController';
            Route::get('create', $AttributeController . '@create')->name('rms-attributes.create');
            Route::get('{attribute}/edit', $AttributeController . '@edit')->name('rms-attributes.edit');
            Route::get('{attribute}', $AttributeController . '@show')->name('rms-attributes.show');
        });
    });
    // attributes attribute values
    Route::prefix('attributes/{attribute}/values')->group(function () {
        $AttributeValueController = '\App\Http\Controllers\AttributeValueController';
        Route::get('create', $AttributeValueController . '@create')->name('rms-attribute-values.create');
        Route::get('{attributeValue}/edit', $AttributeValueController . '@edit')->name('rms-attribute-values.edit');
    });

    Route::prefix('research-requests')->group(function () {
        Route::get('/create', 'ResearchRequestController@create')->name('research-request.create');
        Route::get('/', 'ResearchRequestController@index')->name('research-request.index');
        Route::post('/', 'ResearchRequestController@store')->name('research-request.store');
        Route::get('attachment-download/{researchRequest}', 'ResearchRequestController@requestAttachmentDownload')->name('research-request.attachment-download');
        Route::get('file-download/{researchRequestAttachment}', 'ResearchRequestController@fileDownload')->name('research-request.file-download');
        Route::get('{researchRequest}/show', 'ResearchRequestController@show')->name('research-request.show');
        Route::get('{researchRequest}/edit', 'ResearchRequestController@edit')->name('research-request.edit');
        Route::put('{researchRequest}', 'ResearchRequestController@update')->name('research-request.update');
    });

    Route::prefix('research-proposal-submission')->group(function(){
        Route::get('/','ProposalSubmitController@index')->name('research-proposal-submission.index');
        Route::get('{researchRequest}/create','ProposalSubmitController@create')->name('research-proposal-submission.create');
        Route::post('/','ProposalSubmitController@store')->name('research-proposal-submission.store');
        Route::get('show/{id}','ProposalSubmitController@show')->name('research-proposal-submission.show');
        Route::get('{researchProposal}/edit','ProposalSubmitController@edit')->name('research-proposal-submission.edit');
        Route::put('{researchProposalSubmission}','ProposalSubmitController@update')->name('research-proposal-submission.update');
        Route::get('attachment-download/{researchProposalSubmission}','ProposalSubmitController@submissionAttachmentDownload')->name('research-proposal-submission.attachment-download');
        Route::get('file-download/{researchSubmissionAttachment}','ProposalSubmitController@fileDownload')->name('research-proposal-submission.file-download');
        Route::get('review/{researchProposalSubmissionId?}/{featureName?}/{workflowMasterId?}/{workflowConversationId?}','ProposalSubmitController@review');
        Route::post('/reviewUpdate','ProposalSubmitController@reviewUpdate')->name('research-proposal-submission.reviewUpdate');
        Route::get('re-initiate/{researchProposalSubmissionId?}/','ProposalSubmitController@reInitiate');
        Route::post('store-re-initiate/{researchProposalId?}/','ProposalSubmitController@storeInitiate')->name('store-re-initiate');
        Route::get('workflow-close/{workflowMasterId?}/','ProposalSubmitController@closeWorkflow')->name('workflow-close');
        Route::get('apc-review/{researchProposalSubmissionId?}','ProposalSubmitController@apcReview')->name('apc-review');
        Route::post('apc-review/{researchProposalSubmissionId?}','ProposalSubmitController@approveApcReview')->name('approve-apc-review');


    });

    Route::prefix('received-research-proposals')->group(function () {
        Route::get('/', 'ReceivedResearchProposalController@index')->name('received-research-proposal.index');
    });

    Route::prefix('invited-research-proposals')->group(function () {
        Route::get('/', 'InvitedResearchProposalController@index')->name('invited-research-proposal.index');
        Route::get('{researchRequest}', 'InvitedResearchProposalController@show')->name('invited-research-proposal.show');
        Route::get('file-download/{researchRequestAttachment}', 'InvitedResearchProposalController@fileDownload')->name('invited-research-proposal.file-download');
        Route::get('{researchRequest}/request-date-extend', 'InvitedResearchProposalController@requestDateExtend')->name('invited-research-proposal.request-date-extend');
        Route::post('/', 'InvitedResearchProposalController@storeDateExtendRequest')->name('invited-research-proposal.store-date-extend-request');
    });
});
