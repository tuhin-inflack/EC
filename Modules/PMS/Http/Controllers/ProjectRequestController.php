<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\ProjectRequest;
use Modules\PMS\Http\Requests\CreateProjectRequestRequest;
use Modules\PMS\Http\Requests\UpdateProjectRequestRequest;
use Modules\PMS\Services\ProjectRequestService;
use Illuminate\Support\Facades\Storage;

class ProjectRequestController extends Controller
{
    private $projectRequestService;

    /**
     * ProjectRequestController constructor.
     * @param ProjectRequestService $hostelService
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
        $projectRequests = $this->projectRequestService->getAll();

        return view('pms::project_requests.index', compact('projectRequests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('pms::project_requests.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateProjectRequestRequest $request)
    {
        $filename = $request->file('attachment');
        $path = Storage::disk('internal')->put('PMS', $filename);

        $data = array_merge($request->all(), ['attachment' => $path]);


        $this->projectRequestService->store($data);
        Session::flash('message', 'Project request stored successfully');
        return redirect()->route('project_request.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(ProjectRequest $projectRequest)
    {
        return view('pms::project_requests.show',compact('projectRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(ProjectRequest $projectRequest)
    {

        return view('pms::project_requests.edit',compact('projectRequest'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateProjectRequestRequest $request, ProjectRequest $projectRequest)
    {
        $filename = $request->file('attachment');
        $path = Storage::disk('internal')->put('PMS', $filename);

        $data = array_merge($request->all(), ['attachment' => $path]);
        $this->projectRequestService->update($projectRequest, $data);
        Session::flash('message', 'Project Request updated successfully');

        return redirect()->route('project_request.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(ProjectRequest $projectRequest)
    {
        $this->projectRequestService->delete($projectRequest);
        Session::flash('message', 'Proposal deleted successfully');

        return redirect()->route('project_request.index');
    }

    public function approve(ProjectRequest $projectRequest)
    {
        $id = $this->projectRequestService->requestApprove($projectRequest);
        return redirect()->route('project_request.index');
    }

    public function reject(ProjectRequest $projectRequest)
    {
        $id = $this->projectRequestService->requestReject($projectRequest);
        return redirect()->route('project_request.index');
    }
}
