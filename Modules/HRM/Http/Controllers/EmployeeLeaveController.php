<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class EmployeeLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $leaves = [
           0 => ['type' => 'casual' , 'from' => '2018-12-14', 'to' => '2018-12-16', 'duration' => 3, 'created_at' => '2018-12-10', 'status' => 'pending' ],
           1=> ['type' => 'sick' , 'from' => '2019-02-04', 'to' => '2019-02-05', 'duration' => 2, 'created_at' => '2019-02-08', 'status' => 'approved' ],
           2=> ['type' => 'earn' , 'from' => '2019-03-22', 'to' => '2019-03-26', 'duration' => 5, 'created_at' => '2019-03-10', 'status' => 'pending' ],
        ];
        return view('hrm::leave.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('hrm::leave.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        Session::flash('message', 'Demo! Data Not saved');
        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('hrm::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('hrm::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
