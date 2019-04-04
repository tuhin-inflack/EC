<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Entities\ProjectRequestDetail;
use Modules\PMS\Services\ProjectRequestDetailService;

class ProjectRequestDetailsController extends Controller
{
    private $projectDetailsRequestService;
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function __construct(ProjectRequestDetailService $projectDetailsRequestService)
    {
        $this->projectDetailsRequestService = $projectDetailsRequestService;
    }

    public function index()
    {
        $requests = $this->projectDetailsRequestService->getAll();
        return view('pms::project-request.details.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('pms::project-request.details.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(ProjectRequestDetail $projectRequest)
    {
        return view('pms::project-request.details.show', compact('projectRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('pms::project-request.details.edit');
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
