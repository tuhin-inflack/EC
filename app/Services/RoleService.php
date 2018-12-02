<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 10/9/18
 * Time: 2:02 PM
 */

namespace App\Services;


use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\Traits\CrudTrait;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RoleService
{
    use CrudTrait;

    private $roleRepository;
    private $permissionRepository;

    /**
     * RoleManagementService constructor.
     * @param $roleRepository
     * @param $permissionRepository
     */
    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
        $this->setActionRepository($this->roleRepository);
    }

    public function getRolesWithPermission()
    {
        return $this->findAll(null, 'permissions', ['column'=>'id', 'direction' => 'desc']);
    }

    public function store(array $data)
    {
        DB::transaction(function () use ($data){
            $role = $this->save($data);
            $role->permissions()->attach($data['permissions']);
        });

        return new Response("Role has been created successfully");
    }

    public function updateRole($id, array $data)
    {
        $role = $this->findOrFail($id);
        DB::transaction(function () use ($role, $data) {
            $this->update($role, $data);
            $role->permissions()->sync($data['permissions']);
        });
        return new Response("Role has been updated successfully");
    }

    public function destroy($id)
    {
        $role = $this->findOrFail($id);
        DB::transaction(function () use ($role) {
            $role->permissions()->detach();
            $role->users()->detach();
            $role->delete();
        });

        return new Response("Role has been deleted successfully");
    }

    public function pluck()
    {
        return $this->roleRepository->pluck();
    }

}
