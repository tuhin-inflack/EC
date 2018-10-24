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


    /**
     * @param null $selected
     * @return Contracts\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|Collection|Model[]
     */
    public function findSelected($selected = null)
    {
        return $this->model->select($selected)->get();
    }

    /**
     * @param null $selected
     * @return Contracts\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|Collection|Model[]
     */
    public function updateLedger($id, array $data)
    {
        return $this->update($this->model->find($id), $data);
    }


    /**
     * @param null $selected
     * @return Contracts\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|Collection|Model[]
     */
    public function deleteLedger($id)
    {
        return $this->delete($this->model->find($id));
    }

}