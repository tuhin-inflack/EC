<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 11/4/2018
 * Time: 7:51 PM
 */

namespace Modules\HRM\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\HRM\Entities\EmployeeTraining;

class EmployeeTrainingRepository extends AbstractBaseRepository {
	protected $modelName = EmployeeTraining::class;
}