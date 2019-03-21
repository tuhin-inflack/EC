<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class EmployeePunishmentController extends Controller
{
    public function index()
    {
        return view('hrm::punishment.index');
    }

    public function create()
    {
        return view('hrm::punishment.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('hrm::show');
    }

    public function edit($id)
    {
        return view('hrm::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
