<?php

namespace Modules\RMS\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\RMS\Http\Requests\CreateResearchRequest;
use Modules\RMS\Services\ResearchService;

/**
 * @property  userService
 * @property  researchService
 */
class ResearchController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;
    private $researchService;

    public function __construct(UserService $userService, ResearchService $researchService)
    {

        $this->userService = $userService;
        $this->researchService = $researchService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $researches = $this->researchService->getAll();
        return view('rms::research.index', compact('researches'));
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
        return view('rms::research.create', compact('auth_user_id', 'name', 'designation', 'departmentName'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateResearchRequest $request)
    {
        $this->researchService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research.index');
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
