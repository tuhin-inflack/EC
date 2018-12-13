<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Services\ProjectRequestService;

class RequestedProjectProposalController extends Controller
{
    private $projectRequestService;

    /**
     * ProjectRequestController constructor.
     * @param ProjectRequestService $projectRequestService
     */
    public function __construct(ProjectRequestService $projectRequestService)
    {
        $this->projectRequestService = $projectRequestService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $requests = $this->projectRequestService->getAll();
        return view('pms::requested-project.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('pms::create');
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
