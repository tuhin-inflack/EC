<?php

namespace Modules\RMS\Http\Controllers;

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
    use FileTrait;

    private $projectResearchTaskService, $researchProposalSubmissionService;

    public function __construct(
        ProjectResearchTaskService $projectResearchTaskService,
        ResearchProposalSubmissionService $researchProposalSubmissionService
    )
    {
        $this->projectResearchTaskService = $projectResearchTaskService;
        $this->researchProposalSubmissionService = $researchProposalSubmissionService;
    }

    public function index($researchId)
    {
        $tasks = $this->projectResearchTaskService->getProjectTasks($researchId);
        $research = $this->researchProposalSubmissionService->findOrFail($researchId);

        return view('rms::task.index', compact('tasks', 'research'));
    }

    public function create(Research $research)
    {
        $action = route('rms-tasks.store', $research->id);
        $tasks = Task::all();

        return view('rms::task.create', compact('research', 'tasks', 'action'));
    }

    public function store(TaskRequest $request, Research $research)
    {
        $task = DB::transaction(function () use ($request, $research) {
            $task = $research->tasks()->create($request->all());

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $filePath = $this->upload($file, 'research/' . $research->title . '/tasks/' . $task->name);
                    $task->attachments()->create([
                        'path' => $filePath,
                        'name' => $file->getClientOriginalName(),
                        'ext' => $file->getClientOriginalExtension(),
                    ]);
                }
            }

            return $task;
        });

        if ($task) {
            Session::flash('success', trans('labels.save_success'));
        } else {
            Session::flash('error', trans('labels.save_fail'));
        }

        $redirectUrl = $request->input('redirect');
        return redirect($redirectUrl);
    }

    public function show(Research $research, Task $task)
    {
        return view('rms::task.show', compact('task', 'research'));
    }

    public function edit(Research $research, Task $task)
    {
        $tasks = Task::all();
        $action = route('rms-tasks.update', [$research->id, $task->id]);

        return view('rms::task.edit', compact('research', 'tasks', 'task', 'action'));
    }

    public function update(Request $request, Research $research, Task $task)
    {
        $task = DB::transaction(function () use ($request, $research, $task) {
            if ($request->has('deleted_attachments')) {
                TaskAttachments::destroy($request->input('deleted_attachments'));
            }

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $filePath = $this->upload($file, 'research/' . $research->title . '/tasks/' . $task->name);
                    $task->attachments()->create([
                        'path' => $filePath,
                        'name' => $file->getClientOriginalName(),
                        'ext' => $file->getClientOriginalExtension(),
                    ]);
                }
            }

            return $task->update($request->all());
        });

        if ($task) {
            Session::flash('success', trans('labels.update_success'));
        } else {
            Session::flash('error', trans('labels.update_fail'));
        }

        $redirectUrl = $request->input('redirect');
        return redirect($redirectUrl);
    }

    public function destroy(Research $research, Task $task)
    {
        $response = DB::transaction(function () use ($task) {
            $task->attachments()->delete();

            return $task->delete();
        });

        if ($response) {
            Session::flash('success', trans('labels.delete_success'));
        } else {
            Session::flash('error', trans('labels.delete_fail'));
        }

        return back();
    }
}
