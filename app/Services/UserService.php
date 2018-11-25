<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 11/22/18
 * Time: 1:05 PM
 */

namespace App\Services;


use App\Repositories\UserRepository;
use App\Traits\CrudTrait;

class UserService
{
    use CrudTrait;

    private $userRepository;

    /**
     * UserService constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->setActionRepository($this->userRepository);
    }

    public function getLoggedInUser() {
        return Auth::user();
    }


}
