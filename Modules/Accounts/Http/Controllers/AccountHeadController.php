<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Accounts\Http\Requests\CreateAccountHeadPostRequest;
use Modules\Accounts\Http\Requests\UpdateAccountHeadPostRequest;
use Modules\Accounts\Services\AccountHeadService;

class AccountHeadController extends Controller
{
    private $accountHeadService;

    /**
     * AccountHeadController constructor.
     * @param AccountHeadService $accountHeadServices
     */
    public function __construct(AccountHeadService $accountHeadService)
    {
        $this->accountHeadService = $accountHeadService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $accountHeads = $this->accountHeadService->getAll();

        return view('accounts::account-head.index', compact('accountHeads'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $accountsHeads = $this->accountHeadService->getHeads();

        return view('accounts::account-head.create', compact('accountsHeads'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateAccountHeadPostRequest $request)
    {
        $this->accountHeadService->store($request->all());

        return redirect()->route('account-head.index')->with('success', 'Account Head stored successfully!');
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
        $head = $this->accountHeadService->getHead($id);
        $accountsHeads = $this->accountHeadService->getHeads();

        return view('accounts::account-head.edit', compact('head', 'accountsHeads'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateAccountHeadPostRequest $request, $id)
    {
        $this->accountHeadService->update($id, $request->all());

        return redirect()->route('account-head.index')->with('success', 'Account Head updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->accountHeadService->delete($id);

        return redirect()->route('account-head.index')->with('warning', 'Account Head deleted successfully!');
    }
}
