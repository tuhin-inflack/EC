<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Constants\PMSConstants;
use Modules\PMS\Entities\ProjectRequest;
use Modules\PMS\Entities\ProjectRequestForward;
use Modules\PMS\Http\Requests\CreateProjectRequestRequest;
use Modules\PMS\Http\Requests\UpdateProjectRequestRequest;
use Modules\PMS\Http\Requests\ProjectRequestForwardRequest;
use Modules\PMS\Services\ProjectRequestService;
use Illuminate\Support\Facades\Storage;
use App\Entities\User;

class ProjectRequestController extends Controller
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
        return view('pms::project-request.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('pms::project-request.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  ProjectRequest $request
     * @return Response
     */
    public function store(CreateProjectRequestRequest $request)
    {
        $data = $request->all();
        $response = $this->projectRequestService->store($data);
        return redirect()->route('project-request.index')->with('message', $response->getContent());
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(ProjectRequest $projectRequest)
    {
        return view('pms::project-request.show',compact('projectRequest'));
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
     * @param  ProjectRequest $request
     * @return Response
     */
    public function update(UpdateProjectRequestRequest $request, ProjectRequest $projectRequest)
    {
        $filename = $request->file('attachment');
        $path = Storage::disk('internal')->put('PMS', $filename);

        $data = array_merge($request->all(), ['attachment' => $path]);
        $this->projectRequestService->update($projectRequest, $data);
        Session::flash('success', 'Project Request updated successfully');

        return redirect()->route('project_request.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(ProjectRequest $projectRequest)
    {
        $this->projectRequestService->delete($projectRequest);
        Session::flash('success', 'Proposal deleted successfully');

        return redirect()->route('project-request.index');
    }

    public function statusUpdate(ProjectRequest $projectRequest)
    {
        return $projectRequest;
        $this->projectRequestService->requestApprove($projectRequest);
        return redirect()->route('project_request.index');
    }

    public function reject(ProjectRequest $projectRequest)
    {
        $this->projectRequestService->requestReject($projectRequest);
        return redirect()->route('project_request.index');
    }

    public function forward(ProjectRequest $projectRequest)
    {
        $users = User::all();

        return view('pms::project_requests.forward',compact('projectRequest','users'));
    }

    public function forward_store(ProjectRequestForwardRequest $request)
    {

        $this->projectRequestService->storeForward($request);

        return redirect()->route('project_request.index')->with('success', 'Proposal forwarded successfully');
    }

    public function forwardList()
    {
        return $this->projectRequestService->getForwardList();
        /*return $lists[1]['project_request']['title'];*/

        return view('pms::project_requests.forward_list',compact('lists'));
    }
}
