<?php

namespace Modules\HRM\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class EmployeePunishmentController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('hrm::punishment.index');
    }

    public function create()
    {
        $user = $this->userService->getLoggedInUser();

        return view('hrm::punishment.create', compact('user'));
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
