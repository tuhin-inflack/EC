<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounts\Services\AccountService;
use Modules\Accounts\Services\EconomyCodeService;

class AccountsController extends Controller
{

    private $accountService;
    private $economyCodeService;

    public function __construct(AccountService $accountService, EconomyCodeService $economyCodeService)
    {
        $this->accountService = $accountService;
        $this->economyCodeService = $economyCodeService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('accounts::index');
    }

    public function show(){
        return $this->economyCodeService->getEconomyCodesForDropdown(function ($eCode){
            return $eCode->bangla_name . ' (' . $eCode->code . ')';
        });
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
