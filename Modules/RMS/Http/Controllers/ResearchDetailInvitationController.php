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
     * Display a listing of the resource.
     * @return Response
     */

    public function __construct(EmployeeServices $employeeServices)
    {
        $this->employeeServices = $employeeServices;
    }

    public function index()
    {
        return view('rms::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $employees = $this->employeeServices->getEmployeesForDropdown(function ($employee) {

            return $employee->first_name . ' ' . $employee->last_name . ' - ' . $employee->designation->name . ' - ' . $employee->employeeDepartment->name;
        });
        return view('rms::research-proposal-details.invitations.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('rms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('rms::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
