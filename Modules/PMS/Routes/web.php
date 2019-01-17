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
        Route::get('attachment-download/{projectRequest}', 'ProjectRequestController@requestAttachmentDownload')->name('project-request.attachment-download');
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

    });

    Route::prefix('organization')->group(function () {
        Route::get('/add-organization/{id?}', 'OrganizationController@addOrganization')->name('organization.add-organization');
        Route::post('/store-organization/{id?}', 'OrganizationController@storeOrganization')->name('organization.store-organization');
    });
    Route::prefix('task')->group(function () {
        Route::get('/{projectId}', 'TaskController@index')->name('task.index');
        Route::get('/create/{projectId}', 'TaskController@create')->name('task.create');
        Route::post('/create/{projectId}', 'TaskController@store')->name('task.store');
        Route::get('/start-end/{taskId}', 'TaskController@toggleStartEndTask')->name('task.toggleStartEnd');

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
