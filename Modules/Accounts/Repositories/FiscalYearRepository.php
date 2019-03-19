<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 10/10/18
 * Time: 12:10 PM
 */

namespace Modules\Accounts\Repositories;

use App\Repositories\AbstractBaseRepository;
use Modules\Accounts\Entities\FiscalYear;

class FiscalYearRepository extends AbstractBaseRepository
{
    protected $modelName = FiscalYear::class;

}