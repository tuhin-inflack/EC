<?php

namespace Modules\RMS\Http\Controllers;

use App\Services\TaskService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\Task;
use Modules\RMS\Entities\Research;

class TaskTimeController extends Controller
{
    /**
     * @var TaskService
     */
    private $taskService;

    /**
     * TaskTimeController constructor.
     * @param TaskService $taskService
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function update(Request $request, Research $research, Task $task)
    {
        if ($this->taskService->calculateTaskTime($task)) {
            Session::flash('success', trans('labels.update_success'));
        } else {
            Session::flash('error', trans('labels.update_fail'));
        }

        return redirect()->route('research.show', $research->id);
    }
}
