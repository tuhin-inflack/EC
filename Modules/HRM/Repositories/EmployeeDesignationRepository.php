<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/30/2018
 * Time: 12:44 PM
 */

namespace Modules\HRM\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\HRM\Entities\EmployeeDesignation;

class EmployeeDesignationRepository  extends AbstractBaseRepository{
	protected $modelName = EmployeeDesignation::class;
}