<?php

namespace Modules\TMS\Http\Controllers;

use Illuminate\Http\Request;
use Modules\TMS\Http\Requests\TrainingRequest;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\TMS\Services\TrainingsService;
use Illuminate\Support\Facades\Session;

class TrainingController extends Controller
{
    private $trainingService;

    /**
     * TrainingController constructor.
     * @param $trainingService
     */
    public function __construct(TrainingsService $trainingService)
    {
        $this->trainingService = $trainingService;
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $trainings = $this->trainingService->findAll();

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
    public function store(TrainingRequest $request)
    {
        $response = $this->trainingService->save($request->all());

        $trainings = $this->trainingService->findAll();

        if($response == true) $msg = "Training saved Successfully!"; else $msg = "Data not saved";
        Session::flash('message',$msg);

        return redirect('tms/training/');
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
