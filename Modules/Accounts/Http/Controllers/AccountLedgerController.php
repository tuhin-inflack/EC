<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Accounts\Http\Requests\CreateAccountLedgerPostRequest;
use Modules\Accounts\Http\Requests\UpdateAccountLedgerPostRequest;
use Modules\Accounts\Services\AccountHeadService;
use Modules\Accounts\Services\AccountLedgerService;

class AccountLedgerController extends Controller
{

    private $accountHeadService;
    private $accountLedgerService;

    /**
     * AccountLedgerController constructor.
     * @param AccountHeadService $accountLedgerServices
     */
    public function __construct(AccountHeadService $accountHeadService, AccountLedgerService $accountLedgerService)
    {
        $this->accountHeadService = $accountHeadService;
        $this->accountLedgerService = $accountLedgerService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $accountLedgers = $this->accountLedgerService->getAll();

        return view('accounts::account-ledger.index', compact('accountLedgers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $accountsHeads = $this->accountHeadService->getHeads();

        return view('accounts::account-ledger.create', compact('accountsHeads'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateAccountLedgerPostRequest $request)
    {
        $this->accountLedgerService->store($request->all());

        return redirect()->route('account-ledger.index')->with('success', 'Account Ledger stored successfully!');
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
    public function edit($id)
    {
        $ledger = $this->accountLedgerService->getLedger($id);
        $accountsHeads = $this->accountHeadService->getHeads();

        return view('accounts::account-ledger.edit', compact('ledger', 'accountsHeads'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateAccountLedgerPostRequest $request, $id)
    {
        $this->accountLedgerService->update($id, $request->all());

        return redirect()->route('account-ledger.index')->with('success', 'Account Ledger updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $this->accountLedgerService->delete($id);

        return redirect()->route('account-ledger.index')->with('warning', 'Account Ledger deleted successfully!');
    }
}
