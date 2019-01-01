<?php

namespace Modules\TMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\TMS\Services\TraineeService;
use Modules\TMS\Services\TrainingsService;
use Modules\TMS\Http\Requests\TraineeRequest;
use Illuminate\Support\Facades\Session;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    private $traineeService;

    private $trainingService;

    public function __construct(TraineeService $traineeService, TrainingsService $trainingService)
    {
        $this->traineeService = $traineeService;
        $this->trainingService = $trainingService;
    }


    public function index(Request $request)
    {

        $training_id = $request['training_id'];
        $trainees = (object) array();
        if(isset($training_id))
        {
            $trainees = $this->traineeService->fetchTraineesWithID($training_id);
        }

        $trainings = $this->trainingService->findAll();

        return view('tms::trainee.index', compact('trainees', 'trainings'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($trainingId)
    {
        $training = $this->trainingService->findOrFail($trainingId);

        return view('tms::trainee.create', compact('training'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(TraineeRequest $request)
    {
        $storeData = $this->traineeService->save($request->all());
        if($storeData) $msg = "Trainee added successful"; else $msg = "Error while storing trainee data!";
        Session::flash('message', $msg);

        return redirect('/tms/trainee/add/to/'.$request['training_id']);
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
    public function edit($traineeId)
    {
        $trainee = $this->traineeService->fetchSingle($traineeId);

        return view('tms::trainee.edit', compact('trainee', 'traineeId'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(TraineeRequest $request, $traineeId)
    {
        $updateData = array(
            'trainee_first_name' => $request['trainee_first_name'],
            'trainee_last_name' => $request['trainee_last_name'],
            'trainee_gender' => $request['trainee_gender'],
            'trainee_mobile' => $request['mobile']
        );
        $update = $this->traineeService->updateTrainee($traineeId, $updateData);
        $msg = "Trainee Updated Successfully";
        Session::flash('message', $msg);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $response = $this->traineeService->delete($id);
        if($response) $msg = "Trainee deleted successfully"; else $msg = "Error! Trainee not deleted";
        Session::flash('message', $msg);

        return back();
    }
}
