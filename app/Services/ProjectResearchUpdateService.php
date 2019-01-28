<?php
/**
 * Created by PhpStorm.
 * User: bs110
 * Date: 1/24/19
 * Time: 4:05 PM
 */

namespace App\Services;


use App\Repositories\ProjectResearchUpdateRepository;
use App\Traits\CrudTrait;

class ProjectResearchUpdateService
{
    use CrudTrait;

    private $projectResearchUpdateRepository;

    public function __construct(ProjectResearchUpdateRepository $projectResearchUpdateRepository)
    {
        $this->projectResearchUpdateRepository = $projectResearchUpdateRepository;
    }

    public function getMonthlyUpdate($updateForId, $type, $monthYear)
    {
        $monthYearAr = explode("-", $monthYear);
        $month = $monthYearAr[0]; $year = $monthYearAr[1];

        return $this->projectResearchRepository->getMonthlyUpdate($updateForId, $type, $month, $year);
    }

    public function saveAttachments($monthlyUpdateId, $files)
    {
        $cnt = 0;
        foreach ($files as $file)
        {
            $storeFile = $this->upload($file, config('filesystems.paths.monthly_update_attachments'));
            $fileExt = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fileName = trim(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));

            $attachmentData = array(
                'project_research_task_id' => $monthlyUpdateId,
                'file_name' => $fileName,
                'file_ext' => $fileExt,
                'file_path' => $storeFile
            );
            $saveAttachment = $this->projectResearchUpdateRepository->saveAttachments($monthlyUpdateId, $attachmentData);
            if($saveAttachment) $cnt++;
        }
        return $cnt;
    }
}
