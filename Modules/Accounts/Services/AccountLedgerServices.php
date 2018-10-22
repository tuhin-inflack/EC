<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 10/21/18
 * Time: 3:17 PM
 */

namespace Modules\Accounts\Services;


use Modules\Accounts\Repositories\AccountLedgerRepository;

class AccountLedgerServices
{

    protected $accountLedgerRepository;

    /**
     * AccountHeadServices constructor.
     */
    public function __construct(AccountLedgerRepository $accountLedgerRepository)
    {
        $this->accountLedgerRepository = $accountLedgerRepository;
    }

    public function getAll()
    {
        return $this->accountLedgerRepository->findAll(10);
    }

}