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
}
