<?php

namespace Modules\RMS\Http\Controllers;

use App\Services\TaskService;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\Task;
use Modules\PMS\Entities\TaskAttachments;
use Modules\PMS\Http\Requests\TaskRequest;
use Modules\PMS\Services\ProjectResearchTaskService;
use Modules\RMS\Entities\Research;
use Modules\RMS\Services\ResearchProposalSubmissionService;

class TaskController extends Controller
{
    /**
     * @var TaskService
     */
    private $taskService;


    /**
     * TaskController constructor.
     * @param TaskService $taskService
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function create(Research $research)
    {
        $action = route('rms-tasks.store', $research->id);

        return view('rms::task.create', compact('research', 'action'));
    }

    public function store(TaskRequest $request, Research $research)
    {
        if ($this->taskService->store($research, $request->all())) {
            Session::flash('success', trans('labels.save_success'));
        } else {
            Session::flash('error', trans('labels.save_fail'));
        }

        return redirect()->route('research.show', $research->id);
    }

    public function show(Research $research, Task $task)
    {
        return view('rms::task.show', compact('task', 'research'));
    }

    public function edit(Research $research, Task $task)
    {
        $action = route('rms-tasks.update', [$research->id, $task->id]);

        return view('rms::task.edit', compact('research', 'task', 'action'));
    }

    public function update(TaskRequest $request, Research $research, Task $task)
    {
        if ($this->taskService->updateTask($research, $task, $request->all())) {
            Session::flash('success', trans('labels.update_success'));
        } else {
            Session::flash('error', trans('labels.update_fail'));
        }

        return redirect()->route('research.show', $research->id);
    }

    public function destroy(Research $research, Task $task)
    {
        if ($this->taskService->deleteTask($task)) {
            Session::flash('success', trans('labels.delete_success'));
        } else {
            Session::flash('error', trans('labels.delete_fail'));
        }

        return redirect()->route('research.show', $research->id);
    }
}
