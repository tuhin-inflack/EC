<?php

namespace Modules\TMS\Http\Controllers;

use Illuminate\Http\Request;
use Modules\TMS\Http\Requests\TrainingRequest;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\TMS\Services\TrainingsService;
use Modules\TMS\Entities\Trainings;
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
        $orderBy =  array('column'=>'id', 'direction'=> 'desc');
        $trainings = $this->trainingService->findAll(null,null, $orderBy);

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

        if($response == true) $msg = __('labels.save_success'); else $msg = __('labels.save_fail');;
        Session::flash('message',$msg);

        return redirect('tms/training/');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($training_id)
    {
        $training = $this->trainingService->findOrFail($training_id);

        return view('tms::training.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($training_id)
    {
        $training = $this->trainingService->findOrFail($training_id);

        return view('tms::training.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(TrainingRequest $request, $training_id)
    {
        //$update = $this->trainingService->updateUser($training , $request->all());
        $update = $this->trainingService->updateTraining($training_id, $request->all());

        Session::flash('message', __('labels.update_success'));

        return redirect('/tms/training');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $response = $this->trainingService->delete($id);

        if($response) $msg = __('labels.delete_success'); else $msg = __('labels.delete_fail');

        Session::flash('message', $msg);

        return redirect('/tms/training');
    }
}
