<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\TMS\Services\TrainingsService;

class PublicTrainingRegistrationController extends Controller
{
    /**
     * @var TrainingsService
     */
    private $trainingService;

    public function __construct(TrainingsService $trainingService)
    {
        /** @var TrainingsService $trainingService */
        $this->trainingService = $trainingService;
    }

    public function index()
    {
        $orderBy =  array('column'=>'id', 'direction'=> 'desc');
        $trainings = $this->trainingService->findAll(null,null, $orderBy);
        return view('tms::public.training-registration.index', compact('trainings'));
    }

    public function create()
    {
        return view('tms::public.training-registration.create');
    }
}
