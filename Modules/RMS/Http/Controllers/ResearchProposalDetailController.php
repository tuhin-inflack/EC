<?php

namespace Modules\RMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\RMS\Services\ResearchDetailSubmissionService;
use mysql_xdevapi\CrudOperationBindable;

class ResearchProposalDetailController extends Controller
{

    /**
     * @var ResearchDetailSubmissionService
     */
    protected $researchDetailSubmissionService;

    /**
     * ResearchProposalDetailController constructor.
     * @param ResearchDetailSubmissionService $researchDetailSubmissionService
     */

    public function __construct(ResearchDetailSubmissionService $researchDetailSubmissionService)
    {
        $this->researchDetailSubmissionService = $researchDetailSubmissionService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $researchDetails = $this->researchDetailSubmissionService->findAll();
        return view('rms::research-details.index', compact('researchDetails'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($researchDetailInvitationId)
    {

        return view('rms::research-details.create', compact('researchDetailInvitationId'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->researchDetailSubmissionService->storeResearchDetails($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research.list');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('rms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('rms::edit');
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
