<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/22/2018
 * Time: 2:58 PM
 */

namespace Modules\HRM\Services;

use App\Http\Responses\DataResponse;
use App\Services\UserService;
use App\Traits\CrudTrait;
use Closure;
use Modules\HRM\Repositories\EmployeeRepository;

class EmployeeServices
{
    use CrudTrait;
    private $employeeRepository;
    private $userService;


    public function __construct(EmployeeRepository $employeeRepository, UserService $userService)
    {
        $this->employeeRepository = $employeeRepository;
        $this->userService = $userService;
        $this->setActionRepository($this->employeeRepository);
    }

    public function storeGeneralInfo($data = [])
    {
        if (isset($data['photo'])) {
            $file = $data['photo'];
            $photoName = time() . "-" . $file->getClientOriginalName();
            $file->storeAs('public/uploads', $photoName);
            $data['photo'] = $photoName;
        }

        $generalInfo = $this->employeeRepository->save($data);
        $this->userService->store([
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'username' => $data['employee_id'],
            'email' => $data['email'],
            'mobile' => $data['mobile_one'],
            'reference_table_id' => $generalInfo->id,
            'user_type' => config('user.types.EMPLOYEE'),
            'password' => config('user.defaultPassword')
        ]);

        return new DataResponse($generalInfo, $generalInfo['id'], 'General information added successfully');
    }

    public function updateGeneralInfo($data, $id)
    {
        $generalInfo = $this->findOrFail($id);
        $status = $generalInfo->update($data);
        if ($status) {
            return new DataResponse($generalInfo, $generalInfo['id'], 'General information updated successfully');
        } else {
            return new DataResponse($generalInfo, $generalInfo['id'], 'Something going wrong !', 500);
        }
    }

    public function getEmployeeList()
    {
        return $this->employeeRepository->findAll();
    }

    public function getEmployeeTitles()
    {
        return $this->employeeRepository->getEmployeeTitleNames();
    }

    public function getEmployeeSalaryScale()
    {
        return $this->employeeRepository->getSalaryScale();
    }

    /**
     * <h3>Employee Dropdown</h3>
     * <p>Custom Implementation of concatenation</p>
     *
     * @param Closure $implementedValue Anonymous Implementation of Value
     * @param Closure $implementedKey Anonymous Implementation Key index
     * @return array
     */
    public function getEmployeesForDropdown(Closure $implementedValue = null, Closure $implementedKey = null)
    {
        $employees = $this->employeeRepository->findAll();

        $employeeOptions = [];

        foreach ($employees as $employee) {
            $employeeId = $implementedKey ? $implementedKey($employee) : $employee->id;

            $implementedValue = $implementedValue ? : function($employee) {
                return $employee->employee_id . ' - ' . $employee->first_name . ' ' . $employee->last_name . ' - ' . $employee->mobile_one;
            };

            $employeeOptions[$employeeId] = $implementedValue($employee);
        }

        return $employeeOptions;
    }

    public function getDivisionalDirectorByDepartmentId($departmentId)
    {
        $divisionalDirector = $this->employeeRepository->findBy(['department_id' => $departmentId, 'is_divisional_director' => true])->first();
        return $divisionalDirector;
    }
}
