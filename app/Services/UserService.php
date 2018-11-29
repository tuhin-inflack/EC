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
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
            if(isset($data['roles'])) {
                $user->roles()->attach($data['roles']);
            }
        });

        return new Response("User has been created successfully");
    }

    public function updateUser($id, array $data)
    {
        $user = $this->findOrFail($id);
        DB::transaction(function () use ($user, $data) {
            $this->update($user, $data);
            if(isset($data['roles'])) {
                $user->roles()->sync($data['roles']);
            }
        });
        return new Response("User has been updated successfully");
    }

    public function destroy($id)
    {
        $user = $this->findOrFail($id);
        DB::transaction(function () use ($user) {
            $user->roles()->detach();
            $user->delete();
        });

        return new Response("User has been deleted successfully");
    }


}
