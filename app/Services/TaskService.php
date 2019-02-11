<?php
/**
 * Created by PhpStorm.
 * User: siam
 * Date: 2/2/19
 * Time: 9:35 PM
 */

namespace App\Services;


use App\Entities\Task;
use App\Entities\TaskAttachment;
use App\Repositories\TaskRepository;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\RMS\Entities\Research;

class TaskService
{

    use CrudTrait;
    use FileTrait;
    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * TaskService constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->setActionRepository($taskRepository);
    }

    public function store($taskable, array $data)
    {
        return DB::transaction(function () use ($taskable, $data) {
            $task = $taskable->tasks()->create($data);

            $this->syncTaskAttachments($taskable, $task, $data);

            return $task;
        });
    }

    public function updateTask($taskable, Task $task, array $data)
    {
        return DB::transaction(function () use ($data, $taskable, $task) {
            $this->syncTaskAttachments($taskable, $task, $data);
            return $task->update($data);
        });
    }

    public function deleteTask(Task $task)
    {
        return DB::transaction(function () use ($task) {
            $task->attachments()->delete();

            return $task->delete();
        });
    }

    public function calculateTaskTime(Task $task)
    {
        if ($task->actual_start_time) {
            $task->actual_end_time = Carbon::now();
        } else {
            $task->actual_start_time = Carbon::now();
        }

        return $task->save();
    }

    public function getTasksGanttChartData($tasks)
    {
        $chartData = [];
        foreach ($tasks as $task) {
            array_push($chartData, array(
                "pID" => $task->id,
                "pName" => $task->name,
                "pStart" => $task->actual_start_time,
                "pEnd" => $task->actual_end_time,
                "pPlanStart" => $task->expected_start_time,
                "pPlanEnd" => $task->expected_end_time,
                "pClass" => "gtaskblue",
                "pNotes" => "SDisas ascas cacasc",
            ));
        }
        return $chartData;
    }

    private function syncTaskAttachments($taskable, $task, $data)
    {
        if (array_key_exists('deleted_attachments', $data)) {
            TaskAttachment::destroy($data['deleted_attachments']);
        }

        if (array_key_exists('attachments', $data)) {
            foreach ($data['attachments'] as $file) {
                $filePath = $this->upload($file, 'research/' . $taskable->title . '/tasks/' . $task->name);
                $task->attachments()->create([
                    'path' => $filePath,
                    'name' => $file->getClientOriginalName(),
                    'ext' => $file->getClientOriginalExtension(),
                ]);
            }
        }
    }

    public function findIn($key, array $values, $relation = null, array $orderBy = null)
    {
        return $this->taskRepository->findIn($key, $values, $relation, $orderBy);
    }
}