<?php

namespace Modules\RMS\Http\Controllers;

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

    public function index($researchId)
    {
        $tasks = $this->projectResearchTaskService->getProjectTasks($researchId);
        $research = $this->projectProposalService->findOrFail($researchId);

        return view('rms::task.index', compact('tasks', 'research'));
    }

    public function toggleStartEndTask($taskId)
    {
        $update = $this->projectResearchTaskService->toggleStarEndTask($taskId);
        $msg = ($update)? __('labels.update_success') : __('labels.update_fail');
        Session::flash('message', $msg);

        return redirect(route('research-proposal-submission.show', $update[1]));
    }

    public function create($researchId)
    {
        $item = $this->projectProposalService->findOne($researchId);
        $taskNames = Task::where('id', '!=', 0)->get();
        $action = route('research.task.store', $item->id);

        return view('rms::task.create', compact('item', 'taskNames', 'action'));
    }

    public function store($researchId, TaskRequest $request)
    {
        $data = $request->all();
        if(!is_numeric($request->input('task_id'))) $data['task_id'] = $this->projectResearchTaskService->saveTaskName($request->input('task_id'));
        $data['type'] = 'research';
        $data['task_for_id'] = $researchId;
        $saveData = $this->projectResearchTaskService->save($data);
        $savedTaskId = $saveData->getAttribute('id');
        if($savedTaskId && $request->hasFile('attachments'))
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
        $task = $this->projectResearchTaskService->findOne($taskId);

        return view('rms::task.show', compact('task'));
    }

    public function edit($taskId)
    {
        $task = $this->projectResearchTaskService->findOne($taskId);
        $taskNames = Task::where('id', '!=', 0)->get();
        $action = route('research.task.update', $taskId);

        return view('rms::task.edit', compact('task', 'taskNames', 'action'));
    }

    public function update(TaskRequest $request, $taskId)
    {
        $data = array(
            "task_id" => (!is_numeric($request->input('task_id'))) ? $this->projectResearchTaskService->saveTaskName($request->input('task_id')): $request->input('task_id'),
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
