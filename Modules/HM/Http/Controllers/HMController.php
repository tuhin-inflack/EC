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
        return view('hm::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('hm::create');
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
    public function show()
    {
        $hostel = (object)[
            'shortcode' => 'BR52451',
            'name' => 'Hostal Name 1',
            'level' => '5',
            'total_room' => '25',
            'total_seat' => '30',
            'rooms' => [
                (object)[
                    'shortcode' => 'NNAM441',
                    'roomType' => (object)[
                        'name' => 'NNAM441'
                    ],
                    'level' => 2,
                    'inventories' => 2
                ],
                (object)[
                    'shortcode' => 'NNAM441',
                    'roomType' => (object)[
                        'name' => 'NNAM441'
                    ],
                    'level' => 2,
                    'inventories' => 2
                ]
            ],
            'roomTypes' => [
                (object)[
                    'name' => 'AC',
                    'capacity' => 2,
                    'rate' => 510,
                ],
                (object)[
                    'name' => 'AC',
                    'capacity' => 2,
                    'rate' => 510,
                ]
            ]
        ];
        return view('hm::hostel.show', compact('hostel'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('hm::edit');
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
