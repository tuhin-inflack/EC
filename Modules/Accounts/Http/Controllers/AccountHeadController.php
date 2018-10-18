<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Accounts\Http\Requests\CreateAccountHeadPostRequest;
use Modules\Accounts\Services\AccountHeadServices;

class AccountHeadController extends Controller
{
    private $accountHeadServices;

    /**
     * AccountHeadController constructor.
     * @param AccountHeadServices $accountHeadServices
     */
    public function __construct(AccountHeadServices $accountHeadServices)
    {
        $this->accountHeadServices = $accountHeadServices;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $accountHeads = $this->accountHeadServices->getAll();

        return view('accounts::account-head.index', compact('accountHeads'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $chartOfAccounts = $this->accountHeadServices->getHeads();

        return view('accounts::account-head.create', compact('chartOfAccounts'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateAccountHeadPostRequest $request)
    {
        $this->accountHeadServices->store($request->all());
        Session::flash('message', 'Account Head stored successfully!');

        return redirect()->route('account-head.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('accounts::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('accounts::edit');
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
