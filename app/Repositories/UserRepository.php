<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 10/8/18
 * Time: 6:08 PM
 */

namespace App\Repositories;


use Illuminate\Support\Facades\Auth;
use App\Entities\User;

class UserRepository extends AbstractBaseRepository
{
    /**
     * Model name
     *
     * @var string
     */
    protected $modelName = User::class;

    public function getUsersExceptLoginInUser($roleId, $userType = null)
    {
        $userType = $userType ? : "Admim";
        return $this->model->where('user_type', $userType)->whereHas('roles', function($query) use ($roleId){
            $query->where('roles.id', '!=', $roleId);
        })->pluck('name', 'id');
    }
}
