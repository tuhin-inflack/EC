<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 10/10/18
 * Time: 12:10 PM
 */

namespace Modules\Accounts\Repositories;

use App\Repositories\AbstractBaseRepository;
use Illuminate\Support\Facades\DB;
use Modules\Accounts\Entities\AccountHead;

class AccountHeadRepository extends AbstractBaseRepository
{
    protected $modelName = AccountHead::class;


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
    public function getHeadsForOptions()
    {
        return $this->model->select('id', DB::raw('CONCAT(code, " - ", name) as name_code'))->get()->toArray();
    }

    /**
     * @param null $selected
     * @return Contracts\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|Collection|Model[]
     */
    public function updateModel($id, array $data)
    {
        return $this->update($this->model->find($id), $data);
    }


    /**
     * @param null $selected
     * @return Contracts\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|Collection|Model[]
     */
    public function deleteModel($id)
    {
        return $this->delete($this->model->find($id));
    }
}