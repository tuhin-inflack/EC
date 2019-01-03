<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HM\Services\HostelService;

class HMController extends Controller
{
    private $hostelService;

    /**
     * HostelController constructor.
     * @param HostelService $hostelService
     */
    public function __construct(HostelService $hostelService)
    {
        $this->hostelService = $hostelService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $hostels = $this->hostelService->getHostelAndRoomDetails();
        return view('hm::index', compact('hostels'));
    }

    public function show()
    {
        return $this->hostelService->getHostelAndRoomDetails();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function roomsChart()
    {
        return view('hm::dashboard.chart');
    }

}
