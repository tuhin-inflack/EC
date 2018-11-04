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
use Modules\Accounts\Constants\AccountConstant;
use Modules\Accounts\Entities\AccountHead;

class AccountHeadRepository extends AbstractBaseRepository
{
    protected $modelName = AccountHead::class;

    /**
     * @param null $selected
     */
    public function getHeadsForOptions()
    {
        return $this->model->select('id', DB::raw('CONCAT(code, " - ", name) as name_code'))->get()->toArray();
    }

    public function getMainParentHeads()
    {
        return $this->findBy(['parent_id' => AccountConstant::PARENT]);
    }

    public function getChildHead($head)
    {
        return $this->findBy(['parent_id' => $head]);
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function updateHead($id, array $data)
    {
        return $this->update($this->model->find($id), $data);
    }


    /**
     * @param int $id
     */
    public function deleteHead($id)
    {
        return $this->delete($this->model->find($id));
    }
}