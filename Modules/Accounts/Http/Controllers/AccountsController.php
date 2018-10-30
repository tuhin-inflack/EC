<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounts\Services\AccountService;

class AccountsController extends Controller
{

    private $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
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
     * Display the Multi Tier Chart of Account.
     * @return Response
     */
    public function chartOfAccount()
    {
        $chart_of_account = $this->accountService->getAllAccountList();

        return view('accounts::account.chart_of_account', compact('chart_of_account'));
    }
}
