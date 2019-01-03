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

    public function import(Request $request, $trainingId)
    {
        $training = $this->trainingService->findOrFail($trainingId);

        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $traineeList = array(); $traineeListErr = array();
        if($request->hasFile(['import_file']) && in_array($_FILES['import_file']['type'], $file_mimes)) {
            $traineeList = $this->traineeService->importCSV($request);
            // Ignoring the first row as title
            unset($traineeList[0]);
            $traineeListErr = $this->traineeService->traineeListValidator($traineeList);
        }

        return view('tms::trainee.import', compact('training','trainingId', 'traineeList', 'traineeListErr'));
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

    public function storeImported(Request $request, $training_id)
    {
        $trainee_mobiles = $request->input('mobile');

        $countRow = 0;
        foreach ($trainee_mobiles as $key=>$trainee_mobile)
        {
            $data = array(
                'training_id'=> $training_id,
                'trainee_first_name'=> $request->input('trainee_first_name')[$key],
                'trainee_last_name'=>$request->input('trainee_last_name')[$key],
                'trainee_gender'=>$request->input('trainee_gender')[$key],
                'mobile'=>$request->input('mobile')[$key],
                'status'=>1
                );
            $storeData = $this->traineeService->save($data);
            if($storeData) $countRow++;
        }

        $msg = $countRow.__('labels.save_success');
        Session::flash('message', $msg);

        return back();
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
        $msg = __('labels.update_success');
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
        if($response) $msg = __('labels.delete_success'); else $msg = __('labels.delete_fail');
        Session::flash('message', $msg);

        return back();
    }
}
