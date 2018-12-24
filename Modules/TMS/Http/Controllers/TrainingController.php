<?php

namespace Modules\TMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $trainings[] = (object) array(
            'id' => 1,
            'title' => 'Test Training',
            'participant' => 10,
            'start_date' => '2018-10-10',
            'end_date' => '2018-12-10',
            'comment' => "Test comment",
            'status' => 1
        );
        return view('tms::training.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function generateTrainingId()
    {
        $prefix = "BARD-TRN-";
        $id = date('Y-m-s').rand(9999,100000);
        $trainingId = $prefix.$id;
        return $trainingId;
    }

    public function create()
    {
        $trainingId = $this->generateTrainingId();
        return view('tms::training.create', compact('trainingId'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('tms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('tms::edit');
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
