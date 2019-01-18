<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Http\Requests\TaskRequest;
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

        return redirect(route('project-proposal-submitted.view', $task->task_for_id));
    }

    public function create($projectId)
    {
        $project = $this->projectResearchTaskService->findOrFail($projectId)->project;
        $taskNames = Task::where('id', '!=', 0)->get();

        return view('pms::task.create', compact('project', 'taskNames'));
    }

    public function store($projectId, TaskRequest $request)
    {
        $data = $request->all();
        $data['type'] = 'project';
        $data['task_for_id'] = $projectId;
        $saveData = $this->projectResearchTaskService->save($data);
        $savedTaskId = $saveData->getAttribute('id');
        if($savedTaskId)
        {
            $files = $request->file('attachments');
            $saveAttachments = $this->projectResearchTaskService->saveAttachments($savedTaskId, $files);
        }

        $msg = ($saveData->getAttribute('id'))? __('labels.save_success') : __('labels.save_fail');
        Session::flash('message', $msg);

        return back();
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

    public function destroy($taskId)
    {
        $del = $this->projectResearchTaskService->delete($taskId);
        $msg = ($del)? __('labels.delete_success') : __('labels.delete_fail');
        Session::flash('message', $msg);

        return back();
    }
}
