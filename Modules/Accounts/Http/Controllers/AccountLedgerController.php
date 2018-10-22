<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Accounts\Http\Requests\CreateAccountLedgerPostRequest;
use Modules\Accounts\Services\AccountHeadServices;
use Modules\Accounts\Services\AccountLedgerServices;

class AccountLedgerController extends Controller
{

    private $accountHeadServices;
    private $accountLedgerServices;

    /**
     * AccountLedgerController constructor.
     * @param AccountLedgerServices $accountLedgerServices
     */
    public function __construct(AccountHeadServices $accountHeadServices, AccountLedgerServices $accountLedgerServices)
    {
        $this->accountHeadServices = $accountHeadServices;
        $this->accountLedgerServices = $accountLedgerServices;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $accountLedgers = $this->accountLedgerServices->getAll();

        return view('accounts::account-ledger.index', compact('accountLedgers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $accountsHeads = $this->accountHeadServices->getHeads();

        return view('accounts::account-ledger.create', compact('accountsHeads'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateAccountLedgerPostRequest $request)
    {
        $this->accountLedgerServices->store($request->all());
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
