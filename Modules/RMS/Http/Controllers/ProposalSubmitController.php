<?php

namespace Modules\RMS\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Modules\RMS\Entities\ResearchRequest;
use Modules\RMS\Http\Requests\CreateProposalSubmissionRequest;
use Modules\RMS\Services\ResearchProposalSubmissionService;

class ProposalSubmitController extends Controller
{
    private $userService;
    private $researchProposalSubmissionService;

    public function __construct(UserService $userService, ResearchProposalSubmissionService $researchProposalSubmissionService)
    {
        /** @var UserService $userService */
        $this->userService = $userService;
        /** @var ResearchProposalSubmissionService $researchProposalSubmissionService */
        $this->researchProposalSubmissionService = $researchProposalSubmissionService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $proposals = $this->researchProposalSubmissionService->getAll();
        return view('rms::proposal.submission.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ResearchRequest $researchRequest)
    {
        // departmentName, designation
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $auth_user_id = Auth::user()->id;
        $departmentName = $this->userService->getDepartmentName($username);
        $designation = $this->userService->getDesignation($username);
        return view('rms::proposal.submission.create', compact('researchRequest', 'departmentName', 'designation', 'name', 'auth_user_id'));
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateProposalSubmissionRequest $request)
    {
        /*if ($request->input('type') == 'draft') {
            return 'draft';
        } else {
            return 'save';
        }*/
        $this->researchProposalSubmissionService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research-proposal-submission.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {

//        $filePath = 'storage/app/public/uploads/pdf-sample.pdf';
        $filePath = 'files/pdf-sample.pdf';

        $research = $this->researchProposalSubmissionService->findOne($id);
        $organizations = $research->organizations;
        if(!is_null($research)) $tasks = $research->tasks; else $tasks = array();

        return view('rms::proposal.submission.show', compact('research','tasks','filePath', 'organizations'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('rms::edit');
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
