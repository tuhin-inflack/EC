<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Compound;

class CVEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $cvs = [
            ['applicant_name' => 'Test User 1', 'applied_for' => 'Software Engineer', 'apply_date' => '2019-03-12','year_of_experience' => 3, 'cv_url' => ''],
            ['applicant_name' => 'Test User 2', 'applied_for' => 'Jr. Software Engineer', 'apply_date' => '2019-03-10','year_of_experience' => 4, 'cv_url' => ''],
            ['applicant_name' => 'Test User 3', 'applied_for' => 'Software Engineer', 'apply_date' => '2019-03-14','year_of_experience' => 5, 'cv_url' => ''],
        ];
        return view('hrm::cv-evaluation.index', compact('cvs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('hrm::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $cvs = [
            ['applicant_name' => 'Test User 1', 'applied_for' => 'Software Engineer', 'apply_date' => '2019-03-12','year_of_experience' => 3, 'cv_url' => ''],
            ['applicant_name' => 'Test User 2', 'applied_for' => 'Jr. Software Engineer', 'apply_date' => '2019-03-10','year_of_experience' => 4, 'cv_url' => ''],
            ['applicant_name' => 'Test User 3', 'applied_for' => 'Software Engineer', 'apply_date' => '2019-03-14','year_of_experience' => 5, 'cv_url' => ''],
        ];
        $cv = $cvs[$id];

        return view('hrm::cv-evaluation.show', compact('cv'));
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
        Session::flash('message', 'Demo! Nothing Changed');

        return redirect(route('cv.list'));
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
