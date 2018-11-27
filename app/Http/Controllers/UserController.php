<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 11/22/18
 * Time: 1:09 PM
 */

namespace App\Http\Controllers;


use App\Http\Requests\StoreUserRequest;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $userService;
    private $roleService;

    /**
     * UserController constructor.
     * @param $userService
     * @param $roleService
     */
    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->findAll();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleService->findAll();
        return view('user.create', compact('roles'));
    }

    /**
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreUserRequest $request)
    {
        $response = $this->userService->save($request->all());
        Session::flash('message', $response->getContent());
        return redirect('/user');

    }


}
