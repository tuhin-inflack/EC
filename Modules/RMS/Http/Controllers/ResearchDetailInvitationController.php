<?php

namespace Modules\RMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HRM\Services\EmployeeServices;

class ResearchDetailInvitationController extends Controller
{

    private $employeeServices;

    /**
     * ResearchDetailInvitationController constructor.
     * @param EmployeeServices $employeeServices
     */
    public function __construct(EmployeeServices $employeeServices)
    {

        $this->employeeServices = $employeeServices;
    }

    public function index()
    {
        return view('rms::research-details.invitation.index');

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $employees = $this->employeeServices->getEmployeesForDropdown(function ($employee) {

            return $employee->first_name . ' ' . $employee->last_name . ' - ' . $employee->designation->name . ' - ' . $employee->employeeDepartment->name;
        });
        return view('rms::research-proposal-details.invitations.create', compact('employees'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('rms::show');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('rms::edit');
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
