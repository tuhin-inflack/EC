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
use Modules\HRM\Services\EmployeeServices;

class UserService
{
    use CrudTrait;

    private $userRepository;
    /**
     * @var EmployeeServices
     */
    private $employeeServices;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
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
        $data['password'] = Hash::make($data['password']);
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

    public function getAdminExceptLoggedInUserRole()
    {
        $logginUserRoleId = $this->getLoggedInUser()->roles[0]->id;
        return $this->userRepository->getAdminsExceptLoginInUser($logginUserRoleId);
    }

}
