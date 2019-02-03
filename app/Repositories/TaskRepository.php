<?php
/**
 * Created by PhpStorm.
 * User: siam
 * Date: 2/2/19
 * Time: 9:34 PM
 */

namespace App\Repositories;


use Modules\PMS\Entities\Task;

class TaskRepository extends AbstractBaseRepository
{
    protected $modelName = Task::class;
}