<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 10/21/18
 * Time: 4:19 PM
 */

namespace Modules\Accounts\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\Accounts\Entities\AccountLedger;

class AccountLedgerRepository extends AbstractBaseRepository
{
    protected $modelName = AccountLedger::class;

}