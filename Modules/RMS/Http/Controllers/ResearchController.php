<?php

namespace Modules\RMS\Http\Controllers;

use App\Constants\WorkflowStatus;
use App\Services\Remark\RemarkService;
use App\Services\TaskService;
use App\Services\UserService;
use App\Services\workflow\DashboardWorkflowService;
use App\Services\workflow\FeatureService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Modules\RMS\Entities\Research;
use Modules\RMS\Http\Requests\CreateResearchRequest;
use Modules\RMS\Services\ResearchService;
use Prophecy\Doubler\Generator\TypeHintReference;

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
    private $remarksService;
    private $dashboardWorkflowService;
    private $featureService;

    /**
     * ResearchController constructor.
     * @param UserService $userService
     * @param ResearchService $researchService
     * @param TaskService $taskService
     * @param RemarkService $remarkService
     * @param DashboardWorkflowService $dashboardWorkflowService ;
     * @param FeatureService $featureService ;
     */
    public function __construct(UserService $userService, ResearchService $researchService, TaskService $taskService,
                                RemarkService $remarkService, DashboardWorkflowService $dashboardWorkflowService, FeatureService $featureService)
    {

        $this->userService = $userService;
        $this->researchService = $researchService;
        $this->taskService = $taskService;
        $this->remarksService = $remarkService;
        $this->dashboardWorkflowService = $dashboardWorkflowService;
        $this->featureService = $featureService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $researches = $this->researchService->getResearchesForUser(Auth::user());
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
        $research = $this->researchService->store($request->all());

        foreach (Config::get('default-values.tasks') as $task){
            $this->taskService->store($research, $task);
        }

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

    public function review($researchId, $featureId, $workflowMasterId, $workflowConversationId)
    {
        $research = $this->researchService->findOne($researchId);
        $remarks = $this->remarksService->findBy(['feature_id' => $featureId, 'ref_table_id' => $researchId]);
        $feature = $this->featureService->findOne($featureId);
        return view('rms::research.review.show', compact('researchId', 'research', 'feature', 'featureId', 'workflowMasterId', 'workflowConversationId', 'remarks'));
    }

    public function reviewUpdate(Request $request)
    {
        $research = $this->researchService->findOrFail($request->input('item_id'));
        $this->researchService->update($research, ['status' => $request->input('status')]);

        $data = $request->except('_token');
        $this->dashboardWorkflowService->updateDashboardItem($data);
//        Send Notifications
//        $this->researchService->sendNotification($request);
        //Send user to research dashboard
        return redirect('/rms');
    }

    public function createPublication($researchId)
    {
        $research = $this->researchService->findOne($researchId);

        return view('rms::research.create-publication', compact('research'));
    }

    public function storePublication(Request $request, $researchId)
    {

        $save = $this->researchService->savePublication($request->all(), $researchId);
        Session::flash('success', trans('labels.save_success'));

        return redirect(route('research.show', $researchId));
    }

    public function reInitiate($researchId)
    {
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $auth_user_id = Auth::user()->id;
        $research = $this->researchService->findOne($researchId);
        $publication = $research->publication;

        return view('rms::research.re-initiate.re_initiate_research', compact('research', 'name', 'auth_user_id', 'publication'));
    }

    public function storeReInitiate(Request $request, $publicationId)
    {

//      publication update
        $this->researchService->updatePublicationForReInitialize($request->all(), $publicationId);

//      Reinitialize research
        $proposal = $this->researchService->findOne($request->research_id);
        $proposal->update(['status' => WorkflowStatus::REINITIATED]);

//      Reinitialize Workflow
        $response = $this->researchService->updateReInitiate($request->all(), $request->research_id);

        Session::flash('success', $response->getContent());
        return redirect()->route('rms.index');
    }

    public function closeWorkflowByReviewer($workflowMasterId, $researchId)
    {

        $proposal = $this->researchService->findOne($researchId);
        $proposal->update(['status' => WorkflowStatus::CLOSED]);
        $response = $this->researchService->closeWorkflow($workflowMasterId);


        Session::flash('success', $response->getContent());
        return redirect()->route('rms.index');
    }
}
