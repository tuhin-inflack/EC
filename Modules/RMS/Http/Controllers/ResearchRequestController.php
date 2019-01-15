<?php

namespace Modules\RMS\Http\Controllers;

use Chumper\Zipper\Facades\Zipper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\RMS\Entities\ResearchRequest;
use Modules\RMS\Http\Requests\CreateResearchRequestRequest;
use Modules\RMS\Services\ResearchRequestService;

class ResearchRequestController extends Controller
{
    private $researchRequestService;


    public function __construct(ResearchRequestService $researchRequestService)
    {
        $this->researchRequestService = $researchRequestService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $research_requests = $this->researchRequestService->getAll();
        return view('rms::researh-request.index', compact('research_requests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('rms::researh-request.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateResearchRequestRequest $request)
    {
        $this->researchRequestService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research-request.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('rms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('rms::edit');
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

    public function requestAttachmentDownload(ResearchRequest $researchRequest)
    {
        $basePath = 'app/research-requests/';
        $filePaths = $researchRequest->researchRequestAttachments
            ->map(function ($attachment) use ($basePath) {
                return storage_path($basePath . $attachment->attachments);
            })->toArray();

        $fileName = time() . '.zip';

        Zipper::make(storage_path($basePath . $fileName))->add($filePaths)->close();

        return response()->download(storage_path($basePath . $fileName));
    }

}
