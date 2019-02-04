<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 2/4/19
 * Time: 3:35 PM
 */

namespace Modules\PMS\Repositories;

use App\Repositories\AbstractBaseRepository;
use Modules\PMS\Entities\ProjectBudget;

class ProjectBudgetRepository extends AbstractBaseRepository
{
    protected $modelName = ProjectBudget::class;
}