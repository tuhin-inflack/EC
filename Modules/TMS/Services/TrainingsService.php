<?php
/**
 * Created by PhpStorm.
 * User: bs110
 * Date: 12/24/18
 * Time: 7:24 PM
 */

namespace Modules\TMS\Services;

use App\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\TMS\Entities\Training;
use Modules\TMS\Repositories\TrainingRepository;

class TrainingsService
{
    use CrudTrait;

    private $trainingsRepository;

    public function __construct(TrainingRepository $trainingsRepository)
    {
        $this->trainingsRepository = $trainingsRepository;

        $this->setActionRepository($trainingsRepository);
    }

    public function generateTrainingId()
    {
        $prefix = "BARD-TRN-";
        $id = date('Y-m-s').rand(9999,100000);
        $trainingId = $prefix.$id;
        return $trainingId;
    }
}
