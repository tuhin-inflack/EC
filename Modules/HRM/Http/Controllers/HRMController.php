<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class HRMController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        return view('hrm::index');

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('hrm::show');
    }
}
