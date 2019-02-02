<?php

namespace Modules\RMS\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\Task;
use Modules\RMS\Entities\Research;

class TaskTimeController extends Controller
{
    public function update(Request $request, Research $research, Task $task)
    {
        if ($task->actual_start_time) {
            $task->actual_end_time = Carbon::now();
        } else {
            $task->actual_start_time = Carbon::now();
        }

        if ($task->save()) {
            Session::flash('success', trans('labels.update_success'));
        } else {
            Session::flash('error', trans('labels.update_fail'));
        }

        return back();
    }
}
