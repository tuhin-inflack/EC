<?php
/**
 * Created by PhpStorm.
 * User: Tanvir
 * Date: 10/10/18
 * Time: 12:12 PM
 */

namespace Modules\Accounts\Services;


use Modules\Accounts\Repositories\AccountHeadRepository;

class AccountHeadServices
{
    protected $accountHeadRepository;

    /**
     * AccountHeadServices constructor.
     */
    public function __construct(AccountHeadRepository $accountHeadRepository)
    {
       $this->accountHeadRepository  = $accountHeadRepository;
    }

    public function getAll()
    {
        return $this->accountHeadRepository->findAll();
//        return $this->accountHeadRepository->findAll();
    }

    public function store(array $data)
    {
        return $this->accountHeadRepository->save($data);
    }

    public function update(array $data)
    {

        return $this->accountHeadRepository->update($data);
    }

}