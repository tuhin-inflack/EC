<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\TMS\Entities\Training;
use Modules\TMS\Http\Requests\StoreRegisteredTraineeRequest;
use Modules\TMS\Services\RegisteredTraineeService;
use Modules\TMS\Services\TraineeDiseaseService;
use Modules\TMS\Services\TrainingsService;

class PublicTrainingRegistrationController extends Controller
{
    /**
     * @var TrainingsService
     */
    private $trainingService;
    /**
     * @var RegisteredTraineeService
     */
    private $registeredTraineeService;
    /**
     * @var TraineeDiseaseService
     */
    private $traineeDiseaseService;

    public function __construct(TrainingsService $trainingService, RegisteredTraineeService $registeredTraineeService, TraineeDiseaseService $traineeDiseaseService)
    {
        /** @var TrainingsService $trainingService */
        $this->trainingService = $trainingService;
        /** @var RegisteredTraineeService $registeredTraineeService */
        $this->registeredTraineeService = $registeredTraineeService;
        $this->traineeDiseaseService = $traineeDiseaseService;
    }

    public function index()
    {
        $orderBy =  array('column'=>'id', 'direction'=> 'desc');
        $trainings = $this->trainingService->findAll(null,null, $orderBy);
        return view('tms::public.training-registration.index', compact('trainings'));
    }

    public function create(Training $training)
    {
        $orderBy =  array('column'=>'id', 'direction'=> 'asc');
        $diseases = $this->traineeDiseaseService->findAll(null, null, $orderBy);
        return view('tms::public.training-registration.create', compact('training', 'diseases'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['expertise_sports'] = implode(',', $data['expertise_sports']);
        $data['hobby'] = implode(',', $data['hobby']);
        $this->registeredTraineeService->store($data);
        Session::flash('success', trans('labels.save_success'));
        return redirect()->back();
    }
}
