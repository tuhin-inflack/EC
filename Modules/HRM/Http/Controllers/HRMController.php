<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HRM\Services\EmployeeServices;

class HRMController extends Controller
{
    private $employeeService;
    public function __construct(EmployeeServices $employeeServices)
    {
        $this->employeeService = $employeeServices;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        return view('hrm::index');

    }

    public function show()
    {
        // Test
        return $this->employeeService->getEmployeeListForBardReference();
    }
}
