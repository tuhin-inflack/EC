<?php

namespace Modules\PMS\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Http\Requests\CreateProjectRequest;
use Modules\PMS\Services\ProjectService;

class ProjectController extends Controller
{

    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var ProjectService
     */
    private $projectService;

    public function __construct(UserService $userService, ProjectService $projectService)
    {
        $this->userService = $userService;
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('pms::project.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $auth_user_id = Auth::user()->id;
        $departmentName = $this->userService->getDepartmentName($username);
        $designation = $this->userService->getDesignation($username);
        return view('pms::project.create', compact('auth_user_id', 'name', 'designation', 'departmentName'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $this->projectService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('project.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('pms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('pms::edit');
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
