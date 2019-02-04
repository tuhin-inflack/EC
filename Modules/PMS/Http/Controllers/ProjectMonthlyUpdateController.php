<?php

namespace Modules\PMS\Http\Controllers;

use App\Services\MonthlyUpdateService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Entities\ProjectProposal;
use Modules\PMS\Services\ProjectProposalService;
use Modules\PMS\Http\Requests\MontlhyUpdateRequest;
use Illuminate\Support\Facades\Session;

class ProjectMonthlyUpdateController extends Controller
{
    private $projectResearchUpdateService;
    private $projectProposalService;

    public function __construct(MonthlyUpdateService $projectResearchUpdateService, ProjectProposalService $projectProposalService)
    {
        $this->projectResearchUpdateService = $projectResearchUpdateService;
        $this->projectProposalService = $projectProposalService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($projectId, $monthYear = "")
    {
        $project = $this->projectProposalService->findOne($projectId);
        if($monthYear == "") $monthlyUpdate = ""; else $monthlyUpdate = $this->projectResearchUpdateService->getMonthlyUpdate($projectId, 'project', $monthYear);

        return view('pms::monthly-update.index', compact('project', 'monthlyUpdate', 'monthYear'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($projectId)
    {
        $item = $this->projectProposalService->findOne($projectId);
        $action = route('project-proposal-submitted.store-monthly-update', $projectId);
        return view('pms::monthly-update.create', compact( 'item', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store($projectId, MontlhyUpdateRequest $request)
    {
        $request->merge(['update_for_id'=> $projectId, 'type' => 'project', 'tasks' => implode(", ", $request->input('tasks'))]);
        $saveData = $this->projectResearchUpdateService->save($request->all());
        $savedTaskId = $saveData->getAttribute('id');
        if($savedTaskId && $request->hasFile('attachments'))
        {
            $files = $request->file('attachments');
            $saveAttachments = $this->projectResearchUpdateService->saveAttachments($savedTaskId, $files);
        }
        $msg = ($savedTaskId)? __('labels.save_success') : __('labels.save_fail');
        Session::flash('message', $msg);

        return back();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('pms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($monthlyUpdateId)
    {
        $monthlyUpdate = $this->projectResearchUpdateService->findOne($monthlyUpdateId);
        $item = $monthlyUpdate->project;
        $action = route('project-proposal-submitted.update-monthly-update', $monthlyUpdateId);

        return view('pms::monthly-update.edit', compact('monthlyUpdate', 'action', 'item'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update($monthlyUpdateId,MontlhyUpdateRequest $request)
    {
        $updateData = array(
            'achievements' => $request->input('achievements'),
            'plannings' => $request->input('plannings'),
            'tasks' => implode(',',$request->input('tasks')),
        );

        $monthlyUpdate = $this->projectResearchUpdateService->findOrFail($monthlyUpdateId);
        $update = $this->projectResearchUpdateService->update($monthlyUpdate, $updateData);

        // Adjusting attachments
        $deletedAttachmentIds = $request->input('deleted_attachments', array());
        if(count($deletedAttachmentIds)) $deleteAttachments = $this->projectResearchUpdateService->deleteAttachments($deletedAttachmentIds);

        if($request->hasFile('attachments'))
        {
            $files = $request->file('attachments');
            $saveAttachments = $this->projectResearchUpdateService->saveAttachments($monthlyUpdateId, $files);
        }
        Session::flash('message', __('labels.update_success'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
