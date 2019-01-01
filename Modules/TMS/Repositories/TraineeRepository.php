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

}
