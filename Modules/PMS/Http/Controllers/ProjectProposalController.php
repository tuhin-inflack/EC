<?php

namespace Modules\PMS\Http\Controllers;

use Chumper\Zipper\Facades\Zipper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Entities\ProjectProposal;
use Modules\PMS\Http\Requests\CreateProjectProposalRequest;
use Modules\PMS\Services\ProjectProposalService;

/**
 * @property  ProjectProposalService
 */
class ProjectProposalController extends Controller
{
    private $proposalSubmissionService;

    /**
     * ProjectProposalController constructor.
     * @param ProjectProposalService $projectProposalService
     */
    public function __construct(ProjectProposalService $projectProposalService)
    {
        $this->projectProposalService = $projectProposalService;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $proposals = $this->projectProposalService->getAll();
        return view('pms::proposal-submission.index',compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('pms::proposal-submission.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  CreateProjectProposalRequest $request
     * @return Response
     */
    public function store(CreateProjectProposalRequest $request)
    {
        $data = $request->all();
        $response = $this->projectProposalService->store($data);
        return redirect()->route('project-proposal-submission.index')->with('message', $response->getContent());
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

    public function proposalAttachmentDownload(ProjectProposal $projectProposal)
    {
        $basePath = 'app/public/uploads/';
        $filePaths = $projectProposal->projectProposalFiles
            ->map(function ($attachment) use ($basePath) {
                return storage_path($basePath . $attachment->attachments);
            })->toArray();

        $fileName = time() . '.zip';

        Zipper::make(storage_path($basePath . $fileName))->add($filePaths)->close();

        return response()->download(storage_path($basePath . $fileName));
    }
}
