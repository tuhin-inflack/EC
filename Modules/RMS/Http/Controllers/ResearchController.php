<?php

namespace Modules\RMS\Http\Controllers;

use App\Services\TaskService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\RMS\Entities\Research;
use Modules\RMS\Http\Requests\CreateResearchRequest;
use Modules\RMS\Services\ResearchService;

/**
 * @property  userService
 * @property  researchService
 */
class ResearchController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;
    private $researchService;
    /**
     * @var TaskService
     */
    private $taskService;

    /**
     * ResearchController constructor.
     * @param UserService $userService
     * @param ResearchService $researchService
     * @param TaskService $taskService
     */
    public function __construct(UserService $userService, ResearchService $researchService, TaskService $taskService)
    {

        $this->userService = $userService;
        $this->researchService = $researchService;
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $researches = $this->researchService->getAll();
        return view('rms::research.index', compact('researches'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $auth_user_id = Auth::user()->id;
        $departmentName = $this->userService->getDepartmentName($username);
        $designation = $this->userService->getDesignation($username);
        return view('rms::research.create', compact('auth_user_id', 'name', 'designation', 'departmentName'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateResearchRequest $request)
    {
        $this->researchService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research.index');
    }

    /**
     * Show the specified resource.
     * @param Research $research
     * @return Response
     */
    public function show(Research $research)
    {

        $ganttChart = $this->taskService->getTasksGanttChartData($research->tasks);

        return view('rms::research.show', compact('research', 'ganttChart'));
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

    public function createPublication($researchId)
    {
        $research = $this->researchService->findOne($researchId);

        return view('rms::research.create-publication', compact('research'));
    }

    public function storePublication(Request $request, $researchId)
    {
        // TODO: Writing code for store information
        dd($request->all());


    }
}
