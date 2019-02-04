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

    Route::prefix('project')->group(function () {
        Route::get('/', 'ProjectController@index')->name('project.index');
        Route::get('/create', 'ProjectController@create')->name('project.create');
        Route::post('/', 'ProjectController@store')->name('project.store');
        Route::get('{project}', 'ProjectController@show')->name('project.show');

        Route::prefix('{project}/budget')->group(function () {
            Route::get('create', 'ProjectBudgetController@create')->name('project.budget');
            Route::post('create', 'ProjectBudgetController@create')->name('project.budget');
            Route::get('spreadsheet', 'ProjectBudgetController@spreadsheet')->name('project.spreadsheet'); // Demo of spreadsheet
        });
        // project organisations
        Route::prefix('{project}/organizations')->group(function () {
            Route::get('create', 'OrganizationController@create')->name('pms-organizations.create');
            Route::get('{organization}', 'OrganizationController@show')->name('pms-organizations.show');
        });
        // research tasks
        Route::prefix('{project}/tasks')->group(function () {
            Route::get('create', 'TaskController@create')->name('pms-tasks.create');
            Route::post('/', 'TaskController@store')->name('pms-tasks.store');
            Route::get('{task}', 'TaskController@show')->name('pms-tasks.show');
            Route::get('{task}/edit', 'TaskController@edit')->name('pms-tasks.edit');
            Route::put('{task}', 'TaskController@update')->name('pms-tasks.update');
            Route::delete('{task}', 'TaskController@destroy')->name('pms-tasks.destroy');
            // Task time
            Route::put('{task}/time', 'TaskTimeController@update')->name('pms-tasks.time');
        });
    });
    // Organization
    Route::prefix('organizations/{organization}')->group(function () {
        // organization members
        Route::prefix('members')->group(function () {
            $OrganizationMemberController = '\App\Http\Controllers\OrganizationMemberController';
            Route::get('create', $OrganizationMemberController . '@create')->name('pms-organization-members.create');
            Route::post('/', $OrganizationMemberController . '@store')->name('pms-organization-members.store');
            Route::get('{member}/edit', $OrganizationMemberController . '@edit')->name('pms-organization-members.edit');
            Route::put('{member}', $OrganizationMemberController . '@update')->name('pms-organization-members.update');
        });
        // organization attribute
        Route::prefix('attributes')->group(function () {
            $AttributeController = '\App\Http\Controllers\AttributeController';
            Route::get('create', $AttributeController . '@create')->name('pms-attributes.create');
            Route::get('{attribute}/edit', $AttributeController . '@edit')->name('pms-attributes.edit');
            Route::get('{attribute}', $AttributeController . '@show')->name('pms-attributes.show');
        });
    });
    // attributes attribute values
    Route::prefix('attributes/{attribute}/values')->group(function () {
        $AttributeValueController = '\App\Http\Controllers\AttributeValueController';
        Route::get('create', $AttributeValueController . '@create')->name('pms-attribute-values.create');
        Route::get('{attributeValue}/edit', $AttributeValueController . '@edit')->name('pms-attribute-values.edit');
    });

    Route::prefix('project-requests')->group(function () {
        Route::get('/', 'ProjectRequestController@index')->name('project-request.index');
        Route::get('/create', 'ProjectRequestController@create')->name('project-request.create');
        Route::post('/', 'ProjectRequestController@store')->name('project-request.store');
        Route::get('{projectRequest}/show', 'ProjectRequestController@show')->name('project-request.show');
        Route::get('attachment-download/{projectRequest}', 'ProjectRequestController@requestAttachmentDownload')->name('project-request.attachment-download');
        Route::get('file-download/{projectRequestAttachment}','ProjectRequestController@fileDownload')->name('project-request.file-download');
    });

    Route::prefix('project-proposal-submission')->group(function () {
        Route::get('/', 'ProjectProposalController@index')->name('project-proposal-submission.index');
        Route::get('{projectRequest}/create', 'ProjectProposalController@create')->name('project-proposal-submission.create');
        Route::post('/', 'ProjectProposalController@store')->name('project-proposal-submission.store');
        Route::get('attachment-download/{projectProposal}', 'ProjectProposalController@proposalAttachmentDownload')->name('project-proposal.attachment-download');
    });

    Route::prefix('project-proposal-submitted')->group(function () {
        Route::get('/', 'ReceivedProjectProposalController@index')->name('project-proposal-submitted.index');
        Route::get('/{id?}', 'ReceivedProjectProposalController@show')->name('project-proposal-submitted.view');
        //Routes for workflow
        Route::get('/review/{proposalId}/{wfMasterId}/{wfConvId}/{featureId}', 'PMSController@review')->name('project-proposal-submitted-review');
        Route::post('/review/{proposalId}', 'PMSController@reviewUpdate')->name('project-proposal-submitted-review-update');
        Route::get('/resubmit/{proposalId}/{featureId}', 'PMSController@resubmit')->name('project-proposal-submitted-resubmit');
        Route::post('/resubmit/{proposalId}', 'PMSController@storeResubmit')->name('project-proposal-submitted-save-resubmit');
        Route::get('/close/{wfMasterId}', 'PMSController@close')->name('project-proposal-submitted-close');
        Route::get('/approve/{proposalId}', 'PMSController@approve')->name('project-proposal-submitted-approve');
        Route::post('/approve/{proposalId}', 'PMSController@storeApprove')->name('project-proposal-submitted-store-approve');

        //Routes related to Project Monthly Update
        Route::prefix('monthly-update')->group(function (){
            Route::get('/view/{projectId}/{monthYear?}', 'ProjectMonthlyUpdateController@index')->name('project-proposal-submitted.monthly-update');
            Route::get('/create/{projectId}', 'ProjectMonthlyUpdateController@create')->name('project-proposal-submitted.create-monthly-update');
            Route::post('/store/{projectId}', 'ProjectMonthlyUpdateController@store')->name('project-proposal-submitted.store-monthly-update');
            Route::get('/edit/{monthlyUpdateId}', 'ProjectMonthlyUpdateController@edit')->name('project-proposal-submitted.edit-monthly-update');
            Route::post('/update/{monthlyUpdateId}', 'ProjectMonthlyUpdateController@update')->name('project-proposal-submitted.update-monthly-update');
        });
    });
});
