<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use Modules\Accounts\Http\Requests\CreateAccountLedgerPostRequest;
use Modules\Accounts\Http\Requests\UpdateAccountLedgerPostRequest;
use Modules\Accounts\Services\AccountHeadServices;
use Modules\Accounts\Services\AccountLedgerServices;
=======
use Modules\Accounts\Http\Requests\CreateAccountLedgerPostRequest;
use Modules\Accounts\Http\Requests\UpdateAccountLedgerPostRequest;
use Modules\Accounts\Services\AccountHeadService;
use Modules\Accounts\Services\AccountLedgerService;
>>>>>>> 1637a374d4cd8b7cc7f8f82d272599c10a60054e

class AccountLedgerController extends Controller
{

<<<<<<< HEAD
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
=======
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
>>>>>>> 1637a374d4cd8b7cc7f8f82d272599c10a60054e
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
<<<<<<< HEAD
        $accountLedgers = $this->accountLedgerServices->getAll();
=======
        $accountLedgers = $this->accountLedgerService->getAll();
>>>>>>> 1637a374d4cd8b7cc7f8f82d272599c10a60054e

        return view('accounts::account-ledger.index', compact('accountLedgers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
<<<<<<< HEAD
        $accountsHeads = $this->accountHeadServices->getHeads();
=======
        $accountsHeads = $this->accountHeadService->getHeads();
>>>>>>> 1637a374d4cd8b7cc7f8f82d272599c10a60054e

        return view('accounts::account-ledger.create', compact('accountsHeads'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateAccountLedgerPostRequest $request)
    {
<<<<<<< HEAD
        $this->accountLedgerServices->store($request->all());
        Session::flash('message', 'Account Ledger stored successfully!');

        return redirect()->route('account-ledger.index');
=======
        $this->accountLedgerService->store($request->all());

        return redirect()->route('account-ledger.index')->with('success', 'Account Ledger stored successfully!');
>>>>>>> 1637a374d4cd8b7cc7f8f82d272599c10a60054e
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
<<<<<<< HEAD
        $ledger = $this->accountLedgerServices->getLedger($id);
        $accountsHeads = $this->accountHeadServices->getHeads();
=======
        $ledger = $this->accountLedgerService->getLedger($id);
        $accountsHeads = $this->accountHeadService->getHeads();
>>>>>>> 1637a374d4cd8b7cc7f8f82d272599c10a60054e

        return view('accounts::account-ledger.edit', compact('ledger', 'accountsHeads'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateAccountLedgerPostRequest $request, $id)
    {
<<<<<<< HEAD
        $this->accountLedgerServices->update($id, $request->all());
        Session::flash('message', 'Account Ledger updated successfully!');

        return redirect()->route('account-ledger.index');
=======
        $this->accountLedgerService->update($id, $request->all());

        return redirect()->route('account-ledger.index')->with('success', 'Account Ledger updated successfully!');
>>>>>>> 1637a374d4cd8b7cc7f8f82d272599c10a60054e
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        $this->accountLedgerServices->delete($id);
        Session::flash('message', 'Account Ledger deleted successfully!');

        return redirect()->route('account-ledger.index');
=======
        $this->accountLedgerService->delete($id);

        return redirect()->route('account-ledger.index')->with('warning', 'Account Ledger deleted successfully!');
>>>>>>> 1637a374d4cd8b7cc7f8f82d272599c10a60054e
    }
}
