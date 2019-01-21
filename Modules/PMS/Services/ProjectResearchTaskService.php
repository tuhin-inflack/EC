<?php
namespace Modules\PMS\Services;

use App\Traits\CrudTrait;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Storage;
use Modules\PMS\Repositories\ProjectResearchTaskRepository;

class ProjectResearchTaskService
{
    use CrudTrait;

    private $projectResearchTaskRepository;

    public function __construct(ProjectResearchTaskRepository $projectResearchTaskRepository)
    {
        $this->projectResearchTaskRepository = $projectResearchTaskRepository;
        $this->setActionRepository($projectResearchTaskRepository);
    }

    public function getTasks($projectId)
    {
        return $this->projectResearchTaskRepository->getTasks($projectId);
    }

    public function saveAttachments($taskId, $files)
    {
        $cnt = 0;
        foreach ($files as $file)
        {
            $fileName = uniqid();
            $fileExt = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filePath = $fileName.".".$fileExt;
            $storeFile = $file->storeAs('attachments',$filePath);

            $attachmentData = array(
                'project_research_task_id' => $taskId,
                'file_name' => $fileName,
                'file_ext' => $fileExt,
                'file_path' => $filePath
            );
            $saveAttachment = $this->projectResearchTaskRepository->saveAttachments($taskId,$attachmentData);
            if($saveAttachment) $cnt++;
        }
        return $cnt;
    }

    public function deleteAttachments($attachments)
    {
        foreach ($attachments as $attachment)
        {
            $del = $this->projectResearchTaskRepository->deleteAttachment($attachment);
        }
    }

    public function saveTaskName($taskName)
    {
        $data = array(
            'name' => $taskName,
            'created_at' => date('Y-m-d H:i:s')
        );

        return $this->projectResearchTaskRepository->saveTaskName($data);
    }

    public function toggleStarEndTask($taskId)
    {
        $task = $this->findOrFail($taskId);
        $dateNow = date('y-m-d H:i:s');
        $updateData = (empty($task->start_time)) ? array('start_time' => $dateNow) : array('end_time' => $dateNow);

        return array($this->update($task, $updateData), $task->task_for_id );
    }
}
