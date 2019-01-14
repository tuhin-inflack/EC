<?php

namespace Modules\RMS\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\RMS\Entities\ResearchRequest;

class ProposalSubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('rms::proposal.submission.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ResearchRequest $researchRequest)
    {
        return view('rms::proposal.submission.create', compact('researchRequest'));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function submittedList()
    {
        return view('rms::proposal.submitted.index');
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
    public function show($id)
    {
//        $filePath = 'storage/app/public/uploads/pdf-sample.pdf';
        $filePath = 'files/pdf-sample.pdf';

        return view('rms::proposal.submission.show', compact('filePath'));
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
}
