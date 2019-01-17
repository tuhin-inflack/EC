<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Services\ProjectResearchTaskService;
use Modules\PMS\Entities\Task;

class TaskController extends Controller
{
    private $projectResearchTaskService;

    public function __construct(ProjectResearchTaskService $projectResearchTaskService)
    {
        $this->projectResearchTaskService = $projectResearchTaskService;
    }

    public function index($projectId)
    {
        $tasks = $this->projectResearchTaskService->getTasks($projectId);
        $project = $this->projectResearchTaskService->findOrFail($projectId)->project;

        return view('pms::task.index', compact('tasks', 'project'));
    }

    public function toggleStartEndTask($taskId)
    {
        $task = $this->projectResearchTaskService->findOrFail($taskId);
        $dateNow = date('y-m-d H:i:s');
        $updateData = (empty($task->start_time)) ? array('start_time' => $dateNow) : array('end_time' => $dateNow);
        $update = $this->projectResearchTaskService->update($task, $updateData);
        $msg = ($update)? __('labels.update_success') : __('labels.update_fail');
        Session::flash('message', $msg);

        return redirect(route('task.index', $task->task_for_id));
    }

    public function create($projectId)
    {
        $project = $this->projectResearchTaskService->findOrFail($projectId)->project;
        $taskNames = Task::where('id', '!=', 0)->get();

        return view('pms::task.create', compact('project', 'taskNames'));
    }

    public function store(Request $request)
    {
    }

    public function show()
    {
        return view('pms::show');
    }

    public function edit()
    {
        return view('pms::edit');
    }

    public function update(Request $request)
    {
    }

    public function destroy()
    {
    }
}
