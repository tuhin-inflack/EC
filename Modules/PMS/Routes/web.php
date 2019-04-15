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

Route::prefix('pms')->middleware(['auth'])->group(function () {
    Route::get('/', 'PMSController@index')->name('pms');

    Route::prefix('projects')->group(function () {
        Route::get('/', 'ProjectController@index')->name('project.index');
        Route::get('/create', 'ProjectController@create')->name('project.create');
        Route::post('/', 'ProjectController@store')->name('project.store');
        Route::get('{project}', 'ProjectController@show')->name('project.show');
        // project budgeting
        Route::prefix('{project}/budget')->group(function () {
            Route::get('export/{tableType}', 'ProjectBudgetController@exportExcel')->name('project-budget.export-excel');
            Route::get('/', 'ProjectBudgetController@index')->name('project-budget.index');
            Route::get('create', 'ProjectBudgetController@create')->name('project-budget.create');
            Route::post('store', 'ProjectBudgetController@store')->name('project-budget.store');
            Route::get('{draftProposalBudget}/edit', 'ProjectBudgetController@edit')->name('project-budget.edit');
            Route::put('{draftProposalBudget}/update', 'ProjectBudgetController@update')->name('project-budget.update');
        });
        // training under a project
        Route::prefix('{project}')->group(function () {
            Route::prefix('training')->group(function () {
                Route::get('/', 'ProjectTrainingController@index')->name('project-training.index');
                Route::get('create', 'ProjectTrainingController@create')->name('project-training.create');
                Route::post('store', 'ProjectTrainingController@store')->name('project-training.store');
                Route::get('{training}', 'ProjectTrainingController@show')->name('project-training.show');
                // training members
                Route::prefix('{training}/members')->group(function () {
                    Route::get('/', 'ProjectTrainingMemberController@index')->name('projectTraining-members.index');
                    Route::post('store', 'ProjectTrainingMemberController@store')->name('projectTraining-members.store');
                });
            });
        });

        Route::prefix('{project}')->group(function () {
            // project organisations
            Route::prefix('organizations')->group(function () {
                Route::get('create', 'OrganizationController@create')->name('pms-organizations.create');
                Route::get('{organization}', 'OrganizationController@show')->name('pms-organizations.show');
                // organisation members
                Route::prefix('{organization}/members')->group(function () {
                    Route::get('create', 'OrganizationMemberController@create')->name('pms-organization-members.create');
                    Route::get('{member}', 'OrganizationMemberController@show')->name('organization-members.show');
                    Route::get('{member}/edit', 'OrganizationMemberController@edit')->name('pms-organization-members.edit');
                    // member attribute
                    Route::prefix('{member}')->group(function () {
                        Route::get('attributes/{attribute}', 'MemberAttributeController@show')->name('member-attributes.show');
                        Route::get('attributes/{attribute}/values/create', 'MemberAttributeValueController@create')->name('member-attribute-values.create');
                        Route::post('attributes/{attribute}/values', 'MemberAttributeValueController@store')->name('member-attribute-values.store');
                    });
                });
            });
            // research tasks
            Route::prefix('tasks')->group(function () {
                Route::get('create', 'TaskController@create')->name('pms-tasks.create');
                Route::post('/', 'TaskController@store')->name('pms-tasks.store');
                Route::get('{task}', 'TaskController@show')->name('pms-tasks.show');
                Route::get('{task}/edit', 'TaskController@edit')->name('pms-tasks.edit');
                Route::put('{task}', 'TaskController@update')->name('pms-tasks.update');
                Route::delete('{task}', 'TaskController@destroy')->name('pms-tasks.destroy');
                // Task time
                Route::put('{task}/time', 'TaskTimeController@update')->name('pms-tasks.time');
            });
            // research monthly updates
            Route::prefix('monthly-updates')->group(function () {
                Route::get('create', 'ProjectMonthlyUpdateController@create')->name('pms-monthly-updates.create');
                Route::post('/', 'ProjectMonthlyUpdateController@store')->name('pms-monthly-updates.store');
                Route::get('{monthlyUpdate}', 'ProjectMonthlyUpdateController@show')->name('pms-monthly-updates.show');
                Route::get('{monthlyUpdate}/edit', 'ProjectMonthlyUpdateController@edit')->name('pms-monthly-updates.edit');
                Route::put('{monthlyUpdate}', 'ProjectMonthlyUpdateController@update')->name('pms-monthly-updates.update');
            });
            // attribute & plannings
            Route::prefix('attributes')->group(function () {
                Route::get('create', 'AttributeController@create')->name('attributes.create');
                Route::post('/', 'AttributeController@store')->name('attributes.store');
                Route::get('{attribute}/plannings', 'AttributePlanningController@index')->name('attribute-plannings.index');
                Route::get('{attribute}', 'AttributeController@show')->name('attributes.show');
                // graph
                Route::get('{attribute}/graphs', 'AttributeController@graphValues');
            });
            Route::get('attributes-plannings/create', 'AttributePlanningController@create')->name('attribute-plannings.create');
            Route::post('attributes-plannings', 'AttributePlanningController@store')->name('attribute-plannings.store');
        });
    });
    // Organization
    Route::prefix('organizations/{organization}')->group(function () {
        // organization members
        Route::prefix('members')->group(function () {
            $OrganizationMemberController = '\Modules\PMS\Http\Controllers\OrganizationMemberController';
//            Route::get('create', $OrganizationMemberController . '@create')->name('pms-organization-members.create');
            Route::post('/', $OrganizationMemberController . '@store')->name('pms-organization-members.store');
            Route::put('{member}', $OrganizationMemberController . '@update')->name('pms-organization-members.update');
        });
        // organization attribute
        Route::prefix('attributes')->group(function () {
            $AttributeController = '\App\Http\Controllers\AttributeController';
            Route::get('create', $AttributeController . '@create')->name('pms-attributes.create');
            Route::get('{attribute}/edit', $AttributeController . '@edit')->name('pms-attributes.edit');
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
        Route::get('{projectRequest}/edit', 'ProjectRequestController@edit')->name('project-request.edit');
        Route::put('{projectRequest}', 'ProjectRequestController@update')->name('project-request.update');
        Route::get('attachment-download/{projectRequest}', 'ProjectRequestController@requestAttachmentDownload')->name('project-request.attachment-download');
        Route::get('file-download/{projectRequestAttachment}', 'ProjectRequestController@fileDownload')->name('project-request.file-download');
    });

    Route::prefix('project-requests-details')->group(function () {
        Route::get('/', 'ProjectRequestDetailsController@index')->name('project-request-details.index');
        Route::get('create/{projectProposal}', 'ProjectRequestDetailsController@create')->name('project-request-details.create');
        Route::post('/', 'ProjectRequestDetailsController@store')->name('project-request-details.store');
        Route::get('{projectRequestDetail}/show', 'ProjectRequestDetailsController@show')->name('project-request-details.show');
        Route::get('{projectRequestDetail}/edit', 'ProjectRequestDetailsController@edit')->name('project-request-details.edit');
        Route::put('{projectRequestDetail}', 'ProjectRequestDetailsController@update')->name('project-request-details.update');
        Route::get('attachment-download/{projectRequestDetail}', 'ProjectRequestDetailsController@attachmentDownload')->name('project-request-details.attachment-download');
        Route::get('file-download/{attachmentId}', 'ProjectRequestDetailsController@fileDownload')->name('project-request-details.file-download');
    });

    Route::prefix('project-proposal-submission')->group(function () {
        Route::get('/', 'ProjectProposalController@index')->name('project-proposal-submission.index');
        Route::get('{projectRequest}/create', 'ProjectProposalController@create')->name('project-proposal-submission.create');
        Route::post('/', 'ProjectProposalController@store')->name('project-proposal-submission.store');
        Route::get('attachment-download/{projectProposal}', 'ProjectProposalController@proposalAttachmentDownload')->name('project-proposal.attachment-download');
        Route::get('file-download/{projectProposalFile}', 'ProjectProposalController@fileDownload')->name('project-proposal-submission.file-download');
    });

    Route::prefix('project-details-proposal-submission')->group(function () {
        Route::get('/', 'ProjectDetailsProposalController@index')->name('project-details-proposal-submission.index');
        Route::get('{projectRequest}/create', 'ProjectDetailsProposalController@create')->name('project-details-proposal-submission.create');
        Route::post('/', 'ProjectDetailsProposalController@store')->name('project-details-proposal-submission.store');
        Route::get('attachment-download/{projectProposal}', 'ProjectProposalController@proposalAttachmentDownload')->name('project-details-proposal.attachment-download');
        Route::get('file-download/{projectProposalFile}', 'ProjectProposalController@fileDownload')->name('project-details-proposal-submission.file-download');
    });

    Route::prefix('project-proposal-submitted')->group(function () {
        Route::get('/', 'ReceivedProjectProposalController@index')->name('project-proposal-submitted.index');
        Route::get('/{id?}', 'ReceivedProjectProposalController@show')->name('project-proposal-submitted.view');
        //Routes for workflow
        Route::get('/review/{proposalId}/{wfMasterId}/{wfConvId}/{featureId}/{ruleDetailsId}/{viewOnly?}', 'PMSController@review')->name('project-proposal-submitted-review');
        Route::post('/review/{proposalId}', 'PMSController@reviewUpdate')->name('project-proposal-submitted-review-update');
        Route::post('/review-bulk/', 'PMSController@reviewBulk')->name('project-proposal-submitted.review-bulk');
        Route::get('/resubmit/{proposalId}/{featureId}', 'PMSController@resubmit')->name('project-proposal-submitted-resubmit');
        Route::post('/resubmit/{proposalId}', 'PMSController@storeResubmit')->name('project-proposal-submitted-save-resubmit');
        Route::get('/close/{wfMasterId}', 'PMSController@close')->name('project-proposal-submitted-close');
        Route::get('/approve/{proposalId}', 'PMSController@approve')->name('project-proposal-submitted-approve');
        Route::post('/approve/{proposalId}', 'PMSController@storeApprove')->name('project-proposal-submitted-store-approve');
        Route::post('/share', 'PMSController@share')->name('project-proposal.share');
        Route::get('sending-project-for-review/{projectProposalSubmissionId?}/{workflowMasterId?}/{shareConversationId?}', 'PMSController@shareReview')->name('sending-project-for-review');
        Route::post('posting-review/{shareConversationId?}', 'PMSController@shareFeedback')->name('project-proposal-submission.feedback');
        Route::post('reviewer-add-attachment', 'PMSController@addAttachment')->name('project.proposal.reviewer.add.attachment');
    });

    Route::prefix('project-details-proposal-submitted')->group(function () {
        Route::get('/', 'ReceivedProjectProposalController@index')->name('project-details-proposal-submitted.index');
        Route::get('/{id?}', 'ReceivedProjectProposalController@show')->name('project-details-proposal-submitted.view');
        //Routes for project detail proposal workflow
        Route::get('/review/{proposalId}/{wfMasterId}/{wfConvId}/{featureId}/{ruleDetailsId}/{viewOnly?}', 'ProjectDetailsProposalController@review')->name('project-details-proposal-submitted-review');
        Route::post('/review/{proposalId}', 'ProjectDetailsProposalController@reviewUpdate')->name('project-details-proposal-submitted-review-update');
        Route::post('/review-bulk/', 'PMSController@reviewBulk')->name('project-proposal-submitted.review-bulk');
        Route::get('/resubmit/{proposalId}/{featureId}', 'PMSController@resubmit')->name('project-proposal-submitted-resubmit');
        Route::post('/resubmit/{proposalId}', 'PMSController@storeResubmit')->name('project-proposal-submitted-save-resubmit');
        Route::get('/close/{wfMasterId}', 'PMSController@close')->name('project-proposal-submitted-close');
        Route::get('/approve/{proposalId}', 'PMSController@approve')->name('project-proposal-submitted-approve');
        Route::post('/approve/{proposalId}', 'PMSController@storeApprove')->name('project-proposal-submitted-store-approve');
        Route::post('/share', 'PMSController@share')->name('project-proposal.share');
        Route::get('sending-project-for-review/{projectProposalSubmissionId?}/{workflowMasterId?}/{shareConversationId?}', 'ProjectDetailsProposalController@shareReview')->name('sending-project-detail-for-review');
        Route::post('posting-review/{shareConversationId?}', 'ProjectDetailsProposalController@shareFeedback')->name('project-detail-proposal-submission.feedback');
        Route::post('reviewer-add-attachment', 'ProjectDetailsProposalController@addAttachment')->name('project.proposal.detail.reviewer.add.attachment');
    });
});
