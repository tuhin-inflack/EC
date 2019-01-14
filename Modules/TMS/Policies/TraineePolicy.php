<?php

namespace Modules\TMS\Policies;

use App\Entities\User;
use App\Entities\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class TraineePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user)
    {
        return $user->hasPermission('view','Training');
        //return false;
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\Entities\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create', 'Training');
        //return true;
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\Entities\User  $user
     * @param  \App\Entities\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->hasPermission('update', 'Training');
        //return true;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\Entities\User  $user
     * @param  \App\Entities\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $user->hasPermission('delete', 'Training');
        //return true;
    }

    /**
     * Determine whether the user can restore the role.
     *
     * @param  \App\Entities\User  $user
     * @param  \App\Entities\Role  $role
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the role.
     *
     * @param  \App\Entities\User  $user
     * @param  \App\Entities\Role  $role
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        return true;
    }

    public function before(User $user)
    {
        return $user->hasRole(['ROLE_DIRECTOR_ADMIN']);
    }
}
