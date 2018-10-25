<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 10/24/18
 * Time: 7:31 PM
 */

namespace Modules\Accounts\Services;


use Modules\Accounts\Repositories\AccountHeadRepository;
use Modules\Accounts\Repositories\AccountLedgerRepository;

class AccountService
{
    protected $accountHeadRepository;
    protected $accountLedgerRepository;

    /**
     * AccountHeadServices constructor.
     */
    public function __construct(AccountHeadRepository $accountHeadRepository, AccountLedgerRepository $accountLedgerRepository)
    {
        $this->accountHeadRepository = $accountHeadRepository;
        $this->accountLedgerRepository = $accountLedgerRepository;
    }

}