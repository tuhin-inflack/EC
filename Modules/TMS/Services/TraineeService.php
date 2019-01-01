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
use Modules\TMS\Entities\Trainee;
use Modules\TMS\Repositories\TraineeRepository;

class TraineeService
{
    use CrudTrait;

    private $traineeRepository;

    public function __construct(TraineeRepository $traineeRepository)
    {
        $this->traineeRepository = $traineeRepository;

        $this->setActionRepository($traineeRepository);
    }

    public function updateTrainee($id, array $data)
    {
        $trainee = $this->findOrFail($id);

        DB::transaction(function () use ($trainee, $data) {
            return $this->update($trainee, $data);
        });
    }

    public function fetchTraineesWithID($trainingId)
    {
        $trainees = $this->traineeRepository->fetchTrainees($trainingId);

        return $trainees;
    }

    public function fetchSingle($traineeId)
    {
        $trainee = $this->traineeRepository->fetchSingleTrainee($traineeId);

        return $trainee;
    }

}
