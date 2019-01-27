<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/22/19
 * Time: 12:53 PM
 */

namespace App\Repositories\workflow;


use App\Entities\workflow\WorkflowDetail;
use App\Repositories\AbstractBaseRepository;

class WorkflowDetailRepository extends AbstractBaseRepository
{
    protected $modelName = WorkflowDetail::class;
}
