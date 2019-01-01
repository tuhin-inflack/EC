<?php
/**
 * Created by PhpStorm.
 * User: bs110
 * Date: 12/24/18
 * Time: 7:00 PM
 */

namespace Modules\TMS\Repositories;

use App\Repositories\AbstractBaseRepository;
use Modules\TMS\Entities\Trainee;


class TraineeRepository extends AbstractBaseRepository
{
    protected $modelName = Trainee::class;


    public function fetchTrainees($training_id)
    {
        $trainees = Trainee::select('trainees.*', 'trainings.training_id as trainingId', 'trainings.training_title')->leftjoin('trainings', 'trainees.training_id', '=', 'trainings.id')->where('trainees.training_id', $training_id)->get();

        return $trainees;
    }

    public function fetchSingleTrainee($traineeId)
    {
        $trainees = Trainee::select('trainees.*', 'trainings.training_id as trainingId', 'trainings.training_title')->leftjoin('trainings', 'trainees.training_id', '=', 'trainings.id')->where('trainees.id', $traineeId)->first();

        return $trainees;
    }

}
