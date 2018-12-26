<?php
/**
 * Created by PhpStorm.
 * User: bs110
 * Date: 12/24/18
 * Time: 7:00 PM
 */

namespace Modules\TMS\Repositories;

use App\Repositories\AbstractBaseRepository;
use Modules\TMS\Entities\Trainings;

class TrainingsRepository extends AbstractBaseRepository
{
    protected $modelName = Trainings::class;

    public function getTrainingById($training_id)
    {
        $training = Trainings::where('training_id',$training_id)->first();

    }
}
