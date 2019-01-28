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
        Route::get('show/{project}', 'ProjectController@show')->name('project.show');
    });

    Route::prefix('project-requests')->group(function () {
        Route::get('/', 'ProjectRequestController@index')->name('project-request.index');
        Route::get('/create', 'ProjectRequestController@create')->name('project-request.create');
        Route::post('/', 'ProjectRequestController@store')->name('project-request.store');
        Route::get('{projectRequest}/show', 'ProjectRequestController@show')->name('project-request.show');
        Route::get('attachment-download/{projectRequest}', 'ProjectRequestController@requestAttachmentDownload')->name('project-request.attachment-download');
        Route::get('file-download/{projectRequestAttachment}','ProjectRequestController@fileDownload')->name('project-request.file-download');
    });

    Route::prefix('requested-project-proposals')->group(function () {
        Route::get('/', 'RequestedProjectProposalController@index')->name('requested-project.index');
    });

    Route::prefix('project-proposal-submission')->group(function () {
        Route::get('/', 'ProjectProposalController@index')->name('project-proposal-submission.index');
        Route::get('/create', 'ProjectProposalController@create')->name('project-proposal-submission.create');
        Route::post('/', 'ProjectProposalController@store')->name('project-proposal-submission.store');
        Route::get('attachment-download/{projectProposal}', 'ProjectProposalController@proposalAttachmentDownload')->name('project-proposal.attachment-download');
    });

    Route::prefix('project-proposal-submitted')->group(function () {
        Route::get('/', 'ReceivedProjectProposalController@index')->name('project-proposal-submitted.index');
        Route::get('/{id?}', 'ReceivedProjectProposalController@show')->name('project-proposal-submitted.view');

        //Routes related to Project Monthly Update
        Route::prefix('monthly-update')->group(function (){
            Route::get('/view/{projectId}/{monthYear?}', 'ProjectMonthlyUpdateController@index')->name('project-proposal-submitted.monthly-update');
            Route::get('/create/{projectId}', 'ProjectMonthlyUpdateController@create')->name('project-proposal-submitted.create-monthly-update');
            Route::post('/store/{projectId}', 'ProjectMonthlyUpdateController@store')->name('project-proposal-submitted.store-monthly-update');
        });
    });

    Route::get('projects/{projectProposal}/monitors/tables', 'MonitorProjectTabularViewController@index')->name('project-monitor-tables.index');
    Route::get('projects/{projectProposal}/monitors/graphs', 'MonitorProjectGraphController@index')->name('project-monitor-graphs.index');
    Route::get('projects/{projectProposal}/monitors/graphs/{attribute}', 'MonitorProjectGraphController@update')->name('project-monitor-graphs.update');

    Route::prefix('organization')->group(function () {
        Route::get('/add-organization/{id?}', 'ReceivedProjectProposalController@addOrganization')->name('organization.add-organization');
        Route::post('/store-organization/{id?}', 'ReceivedProjectProposalController@storeOrganization')->name('organization.store-organization');
    });

    Route::prefix('member')->group(function () {
        Route::get('/add-member/{organizationId?}', 'OrganizationMemberController@addOrganizationMember')->name('member.add-member');
        Route::post('/store-organization-member/', 'OrganizationMemberController@storeOrganizationMember')->name('member.store-organization-member');
        Route::get('/edit-organization-member/{memberId?}', 'OrganizationMemberController@editOrganizationMember')->name('member.edit-organization-member');
        Route::post('/update-organization-member/{memberId?}', 'OrganizationMemberController@UpdateOrganizationMember')->name('member.update-organization-member');
    });

    Route::prefix('task')->group(function () {
        Route::get('/{projectId}', 'TaskController@index')->name('task.index');
        Route::get('/show/{taskId}', 'TaskController@show')->name('task.show');
        Route::get('/create/{projectId}', 'TaskController@create')->name('task.create');
        Route::post('/create/{projectId}', 'TaskController@store')->name('task.store');
        Route::get('/edit/{taskId}', 'TaskController@edit')->name('task.edit');
        Route::post('/edit/{taskId}', 'TaskController@update')->name('task.update');
        Route::get('/start-end/{taskId}', 'TaskController@toggleStartEndTask')->name('task.toggleStartEnd');
        Route::delete('/delete/{taskId}', 'TaskController@destroy')->name('task.delete');
    });

    Route::prefix('attributes')->group(function () {
        Route::get('/', 'AttributeController@index')->name('attributes.index');
        Route::get('create', 'AttributeController@create')->name('attributes.create');
        Route::post('/', 'AttributeController@store')->name('attributes.store');
        Route::get('{attribute}/edit', 'AttributeController@edit')->name('attributes.edit');
        Route::put('{attribute}', 'AttributeController@update')->name('attributes.update');
        Route::delete('{attribute}', 'AttributeController@destroy')->name('attributes.destroy');
        // values
        Route::get('{attribute}/values/create', 'AttributeValueController@create')->name('attribute-values.create');
        Route::post('{attribute}/values', 'AttributeValueController@store')->name('attribute-values.store');
    });
});
