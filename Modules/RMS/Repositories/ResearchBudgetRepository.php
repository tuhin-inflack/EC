<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 2/4/19
 * Time: 3:35 PM
 */

namespace Modules\RMS\Repositories;

use App\Repositories\AbstractBaseRepository;
use Modules\RMS\Entities\ResearchBudget;

class ResearchBudgetRepository extends AbstractBaseRepository
{
    protected $modelName = ResearchBudget::class;
}