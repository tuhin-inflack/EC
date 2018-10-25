<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class AccountsController extends Controller
{
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
        return view('accounts::account.chart_of_account')->with('message', 'New Group Added');
    }
}
