<?php

namespace Modules\RMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\RMS\Services\ResearchRequestService;

/**
 * @property  researchRequestService
 */
class InvitedResearchProposalController extends Controller
{
    private $researchRequestService;

    public function __construct(ResearchRequestService $researchRequestService)
    {
        $this->researchRequestService = $researchRequestService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $research_requests = $this->researchRequestService->getAll();
        return view('rms::proposal.invited.index', compact('research_requests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('rms::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('rms::proposal.invited.show');
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
