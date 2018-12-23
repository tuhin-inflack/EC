<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('hm::check-in.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('hm::check-in.create');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function approvedRequests()
    {
        return view('hm::check-in.approved_booking_requests');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('hm::check-in.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('hm::check-in.edit');
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
