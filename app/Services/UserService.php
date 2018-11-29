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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

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

    public function store(array $data)
    {
        DB::transaction(function () use ($data){
            $user = $this->save($data);
            $user->roles()->attach($data['roles']);
        });

        return new Response("User has been created successfully");
    }


}
