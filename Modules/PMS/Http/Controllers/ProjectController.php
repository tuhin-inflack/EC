<?php

namespace Modules\PMS\Http\Controllers;

use App\Entities\Attribute;
use App\Entities\Organization\Organization;
use App\Services\AttributeService;
use App\Services\DivisionService;
use App\Services\TaskService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\Project;
use Modules\PMS\Http\Requests\CreateProjectRequest;
use Modules\PMS\Repositories\ProjectDetailProposalRepository;
use Modules\PMS\Services\ProjectDetailProposalService;
use Modules\PMS\Services\ProjectService;

class ProjectController extends Controller
{

    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var ProjectService
     */
    private $projectService;
    /**
     * @var TaskService
     */
    private $taskService;
    /**
     * @var DivisionService
     */
    private $divisionService;
    /**
     * @var AttributeService
     */
    private $attributeService;

    /**
     * @var ProjectDetailProposalService
     */
    private $projectDetailProposalService;

    /**
     * ProjectController constructor.
     * @param UserService $userService
     * @param ProjectService $projectService
     * @param TaskService $taskService
     * @param DivisionService $divisionService
     */
    public function __construct(
        UserService $userService,
        ProjectService $projectService,
        TaskService $taskService,
        DivisionService $divisionService,
        AttributeService $attributeService,
        ProjectDetailProposalService $projectDetailProposalService
    )
    {
        $this->userService = $userService;
        $this->projectService = $projectService;
        $this->taskService = $taskService;
        $this->divisionService = $divisionService;
        $this->attributeService = $attributeService;
        $this->projectDetailProposalService = $projectDetailProposalService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $projects = $this->projectService->getProjectsForUser(Auth::user());

        return view('pms::project.index', compact('projects'));
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
        $proposals = $this->projectDetailProposalService->getRemainingApprovedDetailProposal();
        return view('pms::project.create', compact('auth_user_id', 'name', 'designation', 'departmentName', 'proposals'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $this->projectService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('project.index');
    }

    /**
     * Show the specified resource.
     * @param Project $project
     * @return Response
     */
    public function show(Project $project, Attribute $attribute)
    {
        $maleMembersCount = $this->projectService->getTotalMembersByGender($project, 'male');
        $femaleMembersCount = $this->projectService->getTotalMembersByGender($project, 'female');

        $ganttChart = $this->taskService->getTasksGanttChartData($project->tasks);
        $divisions = $this->divisionService->findAll();
        return view('pms::project.show', compact(
                'project',
                'ganttChart',
                'divisions',
                'attribute',
                'maleMembersCount',
                'femaleMembersCount'
            )
        );
    }
}
