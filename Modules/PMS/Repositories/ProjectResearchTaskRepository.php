<?php
/**
 * Created by PhpStorm.
 * User: tuhin
 * Date: 10/18/18
 * Time: 5:24 PM
 */

namespace Modules\PMS\Repositories;

use App\Repositories\AbstractBaseRepository;
use Modules\PMS\Entities\ProjectResearchTask;


class ProjectResearchTaskRepository extends AbstractBaseRepository
{
    protected $modelName = ProjectResearchTask::class;

    public function getTasks($projectId)
    {
        return $this->model->whereHas('project', function($query) use($projectId) {
            $query->where('id', $projectId);
        })->get();
    }

    public function saveAttachments($taskId, $data)
    {
        $task = $this->findOrFail($taskId);
        $save = $task->attachments()->create($data);

        return $save->getAttribute('id');
    }
}
