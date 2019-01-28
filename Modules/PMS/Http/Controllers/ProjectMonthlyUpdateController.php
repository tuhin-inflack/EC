<?php

namespace Modules\PMS\Http\Controllers;

use App\Services\ProjectResearchUpdateService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Entities\ProjectProposal;
use Modules\PMS\Services\ProjectProposalService;
use Modules\PMS\Http\Requests\MontlhyUpdateRequest;

class ProjectMonthlyUpdateController extends Controller
{
    private $projectResearchUpdateService;
    private $projectProposalService;

    public function __construct(ProjectResearchUpdateService $projectResearchUpdateService, ProjectProposalService $projectProposalService)
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
        $request->merge(['update_for_id'=> $projectId, 'type' => 'project']);

        $saveData = $this->projectResearchUpdateService->save($request->all());
        dd($saveData);
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
    public function edit()
    {
        return view('pms::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
