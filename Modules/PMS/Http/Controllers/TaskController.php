<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Http\Requests\TaskRequest;
use Modules\PMS\Services\ProjectProposalService;
use Modules\PMS\Services\ProjectResearchTaskService;
use Modules\PMS\Entities\Task;

class TaskController extends Controller
{
    private $projectResearchTaskService, $projectProposalService;

    public function __construct(ProjectResearchTaskService $projectResearchTaskService, ProjectProposalService $projectProposalService)
    {
        $this->projectResearchTaskService = $projectResearchTaskService;
        $this->projectProposalService = $projectProposalService;
    }

    public function index($projectId)
    {
        $tasks = $this->projectResearchTaskService->getTasks($projectId);
        $project = $this->projectProposalService->findOrFail($projectId);

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
        $project = $this->projectProposalService->findOrFail($projectId);
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

    public function show($taskId)
    {
        $task = $this->projectResearchTaskService->findOrFail($taskId);

        return view('pms::task.show', compact('task'));
    }

    public function edit($taskId)
    {
        $task = $this->projectResearchTaskService->findOrFail($taskId);
        $taskNames = Task::where('id', '!=', 0)->get();

        return view('pms::task.edit', compact('task', 'taskNames'));
    }

    public function update(TaskRequest $request, $taskId)
    {
        $data = array(
            "description" => $request->input('description'),
            "expected_start_time" => $request->input('expected_start_time'),
            "expected_end_time" => $request->input('expected_end_time')
        );

        $task = $this->projectResearchTaskService->findOrFail($taskId);
        $update = $this->projectResearchTaskService->update($task, $data);

        // Adjusting attachments
        $deletedAttachmentIds = $request->input('deleted_attachments', array());
        if(count($deletedAttachmentIds)) $deleteAttachments = $this->projectResearchTaskService->deleteAttachments($deletedAttachmentIds);

        if($request->hasFile('attachments'))
        {
            $files = $request->file('attachments');
            $saveAttachments = $this->projectResearchTaskService->saveAttachments($taskId, $files);
        }
        Session::flash('message', __('labels.update_success'));

        return back();
    }

    public function destroy($taskId)
    {
        $del = $this->projectResearchTaskService->delete($taskId);
        $msg = ($del)? __('labels.delete_success') : __('labels.delete_fail');
        Session::flash('message', $msg);

        return back();
    }
}
