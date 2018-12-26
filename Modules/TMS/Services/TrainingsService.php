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
use Modules\TMS\Entities\Trainings;
use Modules\TMS\Repositories\TrainingsRepository;

class TrainingsService
{
    use CrudTrait;

    private $trainingsRepository;

    public function __construct(TrainingsRepository $trainingsRepository)
    {
        $this->trainingsRepository = $trainingsRepository;

        $this->setActionRepository($trainingsRepository);
    }

}
