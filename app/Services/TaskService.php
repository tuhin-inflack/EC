<?php
/**
 * Created by PhpStorm.
 * User: siam
 * Date: 2/2/19
 * Time: 9:35 PM
 */

namespace App\Services;


use App\Constants\AbstractTask;
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
        return DB::transaction(
            function () use ($taskable, $data) {
            if ($taskable instanceof Research) {
                $data['taskable_id'] = $taskable->id;
                $data['taskable_type'] = AbstractTask::ResearchType;
            } else {
                $data['taskable_id'] = $taskable->id;
                $data['taskable_type'] = AbstractTask::ProjectType;
            }

            $task = $this->save($data);

            $this->storeTaskAttachments($taskable, $task, $data);

            return $task;
        });
    }

    public function updateTask($taskable, Task $task, array $data)
    {
        return DB::transaction(function () use ($data, $taskable, $task) {
            $this->storeTaskAttachments($taskable, $task, $data);
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

    private function storeTaskAttachments($taskable, $task, $data)
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
}