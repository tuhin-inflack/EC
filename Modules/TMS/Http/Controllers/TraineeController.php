<?php

namespace Modules\TMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\TMS\Services\TraineeService;
use Modules\TMS\Services\TrainingsService;
use Modules\TMS\Policies\TraineePolicy;
use Modules\TMS\Entities\Trainee;
use Modules\TMS\Http\Requests\TraineeRequest;
use Illuminate\Support\Facades\Session;

class TraineeController extends Controller
{
    private $traineeService, $trainingService;

    public function __construct(TraineeService $traineeService, TrainingsService $trainingService)
    {
        $this->traineeService = $traineeService;
        $this->trainingService = $trainingService;
    }

    public function index($trainingId = null)
    {
        $this->authorize('view', Trainee::class);
        $trainees = $trainingId ? $trainees = $this->traineeService->fetchTraineesWithID($trainingId) : null;

        $trainings = $this->trainingService->findAll();
        $selectedTrainingId = $trainingId;

        return view('tms::trainee.index', compact('trainees', 'trainings', 'selectedTrainingId'));
    }

    public function create($trainingId)
    {
        $this->authorize('create', Trainee::class);
        $training = $this->trainingService->findOrFail($trainingId);
        $traineeCount = $this->traineeService->assignedTraineeNo($trainingId);

        return view('tms::trainee.create', compact('training', 'traineeCount'));
    }

    public function import(Request $request, $trainingId)
    {
        $this->authorize('create', Trainee::class);
        $training = $this->trainingService->findOrFail($trainingId);
        $traineeCount = $this->traineeService->assignedTraineeNo($trainingId);

        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $traineeList = array(); $traineeListErr = array();
        if($request->hasFile(['import_file']) && in_array($_FILES['import_file']['type'], $file_mimes)) {
            $traineeList = $this->traineeService->importCSV($request);
            // Ignoring the first row as title
            unset($traineeList[0]);
            $traineeListErr = $this->traineeService->traineeListValidator($traineeList);
        }

        return view('tms::trainee.import', compact('training','trainingId', 'traineeList', 'traineeListErr', 'traineeCount'));
    }

    public function store(TraineeRequest $request)
    {
        $this->authorize('create', Trainee::class);
        $storeData = $this->traineeService->save($request->all());
        if($storeData) $msg = __('labels.save_success'); else $msg = __('labels.save_fail');
        Session::flash('message', $msg);

        return redirect()->route('trainee.add', ['training_id' => $request['training_id']]);
    }

    public function storeImported(Request $request, $training_id)
    {
        $this->authorize('create', Trainee::class);
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

        $msg = $countRow." ".__('labels.save_success');
        Session::flash('message', $msg);

        return back();
    }

    public function show($trainingId)
    {
        $this->authorize('view', Trainee::class);
        $trainees = $this->traineeService->fetchTraineesWithID($trainingId);
        $training = $this->trainingService->findOrFail($trainingId);

        return view('tms::trainee.show', compact('trainees', 'training'));
    }

    public function edit($traineeId)
    {
        $this->authorize('update', Trainee::class);
        //$trainee = $this->traineeService->fetchTraineesWithID($traineeId);
        $trainee = $this->traineeService->findOne($traineeId);
        //dd($trainee->training->training_id);

        return view('tms::trainee.edit', compact('trainee', 'traineeId'));
    }

    public function update(TraineeRequest $request, $traineeId)
    {
        $this->authorize('update', Trainee::class);
        $updateData = array(
            'trainee_first_name' => $request['trainee_first_name'],
            'trainee_last_name' => $request['trainee_last_name'],
            'trainee_gender' => $request['trainee_gender'],
            'mobile' => $request['mobile']
        );

        $trainee = $this->traineeService->findOrFail($traineeId);
        $update = $this->traineeService->update($trainee, $updateData);
        $msg = __('labels.update_success');
        Session::flash('message', $msg);

        return back();
    }

    public function destroy($id)
    {
        $this->authorize('delete', Trainee::class);
        $response = $this->traineeService->delete($id);
        if($response) $msg = __('labels.delete_success'); else $msg = __('labels.delete_fail');
        Session::flash('message', $msg);

        return back();
    }
}
