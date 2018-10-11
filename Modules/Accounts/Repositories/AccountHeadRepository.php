<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 10/10/18
 * Time: 12:10 PM
 */

namespace Modules\Accounts\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\Accounts\Entities\AccountHead;

class AccountHeadRepository extends AbstractBaseRepository
{
    protected $modelName = AccountHead::class;

    public function findAll(){
        return $this->model->all();
    }
}