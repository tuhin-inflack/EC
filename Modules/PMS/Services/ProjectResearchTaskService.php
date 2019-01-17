<?php
namespace Modules\PMS\Services;

use App\Traits\CrudTrait;
use Illuminate\Http\Response;

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
}
