<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 10/10/18
 * Time: 12:01 PM
 */

namespace App\Services;


use App\Repositories\PermissionRepository;

class PermissionService
{
    private $permissionRepository;

    /**
     * PermissionService constructor.
     * @param $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getPermissions()
    {
        $permissions = $this->permissionRepository->getPermissions();
        return $permissions;
    }
}
