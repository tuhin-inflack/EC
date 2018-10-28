<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/28/2018
 * Time: 5:39 PM
 */

namespace Modules\HRM\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\HRM\Entities\EmployeeDepartment;

class EmployeeDepartmentRepository extends AbstractBaseRepository{
	protected $modelName = EmployeeDepartment::class;

}