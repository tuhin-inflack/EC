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
use function foo\func;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\HRM\Entities\Employee;
use Modules\HRM\Repositories\EmployeeRepository;
use Modules\HRM\Services\DesignationService;
use Modules\HRM\Services\EmployeeServices;
use PhpParser\Node\Scalar\String_;

class UserService
{
    use CrudTrait;

    private $userRepository;
    /**
     * @var EmployeeServices
     */
    private $employeeServices;
    private $designationService;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository, DesignationService $designationService)
    {
        $this->userRepository = $userRepository;
        $this->designationService = $designationService;
        $this->setActionRepository($this->userRepository);

    }

    public function getLoggedInUser()
    {
        return Auth::user();
    }

    public function getLoggedInUserRole()
    {
        return Auth::user()->roles;
    }

    public function store(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        DB::transaction(function () use ($data) {
            $user = $this->save($data);
            if (isset($data['roles'])) {
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
            if (isset($data['roles'])) {
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

    public function getDepartmentName($username)
    {
        $employee = Employee::where('employee_id', $username)->first();
        $departmentName = isset($employee->employeeDepartment) ? $employee->employeeDepartment->name : null;
        return $departmentName;
    }

    public function getDesignation($username)
    {
        $employee = Employee::where('employee_id', $username)->first();
        $designation = isset($employee->designation) ? $employee->designation->name : null;
        return $designation;
    }

    public function getDesignationId($username)
    {
        $employee = Employee::where('employee_id', $username)->first();
        $designationId = isset($employee->designation_code) ? $employee->designation_code : null;
        return $designationId;
    }

    public function getAdminExceptLoggedInUserRole()
    {
        $loggedInUserRoleId = $this->getLoggedInUser()->roles[0]->id;
        return $this->userRepository->getUsersExceptLoginInUser($loggedInUserRoleId, 'Admin');
    }

    /**
     * @param String $roleName
     * @return boolean|int
     */
    public function doseLoggedInUserHasRole($roleName)
    {
        $roles = $this->getLoggedInUserRole();
        $roles = array_column($roles->toArray(), 'name');
        return in_array($roleName, $roles);
    }

    public function isDirectorGeneral()
    {
        return (bool)$this->doseLoggedInUserHasRole("ROLE_DIRECTOR_GENERAL");
    }

    public function isDirectorAdmin()
    {
        return (bool)$this->doseLoggedInUserHasRole("ROLE_DIRECTOR_ADMIN");
    }

    public function isDirectorTraining()
    {
        return (bool)$this->doseLoggedInUserHasRole("ROLE_DIRECTOR_TRAINING");
    }

    public function getUserForNotificationSend($TypesOfUsers)
    {
        dd($TypesOfUsers);
        $users = [];
        $designations = $this->designationService->getDesignationByShortCode($TypesOfUsers);
        foreach ($designations as $designation) {
            $users = array_merge($users, $designation->user->toArray());
        }
        return $users;
    }

    public function getUserByEmployeeIds(array $employeeIds)
    {


        $users = $this->userRepository->findIn('reference_table_id', $employeeIds);
        return $users;
    }

}
