<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Http\Requests\CreateProjectProposalRequest;
use Modules\PMS\Services\ProjectDetailProposalService;

class ProjectDetailsProposalController extends Controller
{
    private $projectDetailsProposalService;

    public function __construct(ProjectDetailProposalService $projectDetailProposalService)
    {
        $this->projectDetailsProposalService = $projectDetailProposalService;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index()
    {
        $proposals = $this->projectDetailsProposalService->getAll();

        return view('pms::proposal-submission.details.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($projectRequestId)
    {
        return view('pms::proposal-submission.details.create', compact('projectRequestId'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateProjectProposalRequest $request)
    {
        $this->projectDetailsProposalService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('pms');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('pms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('pms::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
