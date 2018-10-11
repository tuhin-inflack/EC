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
use Illuminate\Http\Response;

class RoleService
{
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
    }

    public function getRolesWithPermission()
    {
        return $this->roleRepository->findAll(null, 'permissions', ['column'=>'id', 'direction' => 'desc']);
    }

    public function store(array $data)
    {
        $role = $this->roleRepository->save($data);
        $role->permissions()->attach($data['permissions']);
        return new Response("Role has been created successfully");
    }

}
