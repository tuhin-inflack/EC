<?php
/**
 * Created by PhpStorm.
 * User: Tanvir
 * Date: 10/10/18
 * Time: 12:12 PM
 */

namespace Modules\Accounts\Services;


use Modules\Accounts\Repositories\EmployeeServices;

class AccountHeadServices
{
    protected $accountHeadRepository;

    /**
     * AccountHeadServices constructor.
     */
    public function __construct(EmployeeServices $accountHeadRepository)
    {
       $this->accountHeadRepository  = $accountHeadRepository;
    }

    public function getAll()
    {
        return $this->accountHeadRepository->findAll(10);
    }

    public function getHeads()
    {
        $heads = $this->accountHeadRepository->getHeadsForOptions();

        return array_column($heads, 'name_code', 'id');
    }

    public function getHead($id)
    {
        return $this->accountHeadRepository->findOrFail($id);
    }

    public function store(array $data)
    {
        return $this->accountHeadRepository->save($data);
    }

    public function update($id, array $data)
    {
        return $this->accountHeadRepository->updateModel($id, $data);
    }

    public function delete($id)
    {
        return $this->accountHeadRepository->deleteModel($id);
    }

}