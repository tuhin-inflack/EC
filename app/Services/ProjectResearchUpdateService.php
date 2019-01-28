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

    private $projectResearchRepository;

    public function __construct(ProjectResearchUpdateRepository $projectResearchRepository)
    {
        $this->projectResearchRepository = $projectResearchRepository;
    }

    public function getMonthlyUpdate($updateForId, $type, $monthYear)
    {
        $monthYearAr = explode("-", $monthYear);
        $month = $monthYearAr[0]; $year = $monthYearAr[1];

        return $this->projectResearchRepository->getMonthlyUpdate($updateForId, $type, $month, $year);
    }
}
