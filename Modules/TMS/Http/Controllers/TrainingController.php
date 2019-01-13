<?php

namespace Modules\TMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\TMS\Http\Requests\TrainingRequest;
use Illuminate\Http\Response;
use Modules\TMS\Policies\TrainingPolicy;
use Modules\TMS\Services\TrainingsService;
use Modules\TMS\Entities\Training;
use Illuminate\Support\Facades\Session;

class TrainingController extends Controller
{
    private $trainingService;

    public function __construct(TrainingsService $trainingService)
    {
        $this->trainingService = $trainingService;
        //$this->authorizeResource(Training::class);
    }

    public function index()
    {
        $this->authorize('view', Training::class);
        $orderBy =  array('column'=>'id', 'direction'=> 'desc');
        $trainings = $this->trainingService->findAll(null,null, $orderBy);

        return view('tms::training.index', compact('trainings'));
    }

    public function create()
    {
        $this->authorize('create', Training::class);
        $trainingId = $this->trainingService->generateTrainingId();
        return view('tms::training.create', compact('trainingId'));
    }

    public function store(TrainingRequest $request)
    {
        $this->authorize('create', Training::class);
        $response = $this->trainingService->save($request->all());

        if($response == true) $msg = __('labels.save_success'); else $msg = __('labels.save_fail');;
        Session::flash('message',$msg);

        return redirect('tms/training/');
    }

    public function show($trainingId)
    {
        $this->authorize('view', Training::class);
        $training = $this->trainingService->findOrFail($trainingId);

        return view('tms::training.show', compact('training'));
    }

    public function edit($trainingId)
    {
        $this->authorize('view', Training::class);
        $training = $this->trainingService->findOrFail($trainingId);

        return view('tms::training.edit', compact('training'));
    }

    public function update(TrainingRequest $request, $trainingId)
    {
        $this->authorize('update', Training::class);
        $training = $this->trainingService->findOrFail($trainingId);
        $update = $this->trainingService->update($training, $request->all());
        Session::flash('message', __('labels.update_success'));

        return redirect('/tms/training');
    }

    public function destroy($id)
    {
        $this->authorize('delete', Training::class);
        $response = $this->trainingService->delete($id);

        if($response) $msg = __('labels.delete_success'); else $msg = __('labels.delete_fail');

        Session::flash('message', $msg);

        return redirect('/tms/training');
    }
}
