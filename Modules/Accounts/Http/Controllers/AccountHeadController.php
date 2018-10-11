<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
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
        return view('accounts::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $chart_of_accounts = $this->accountHeadServices->getAll();
        return view('accounts::account-head.create')->with('coa', $chart_of_accounts);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $request;
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
