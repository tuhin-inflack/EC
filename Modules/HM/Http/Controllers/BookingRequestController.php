<?php

namespace Modules\HM\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class BookingRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $bookings = [
            (object)[
                'id' => 1,
                'booked_by' => 'Hasib Noor',
                'booked_for' => Carbon::today()
                        ->format('d-m-Y') . ' to ' .
                    Carbon::today()
                        ->addDays(7)
                        ->format('d-m-Y'),
                'booking_type' => 'Official',
                'organization' => 'Inflack Limited',
                'contact' => '0171XXXXXXX',
                'number_of_guest' => 12,
                'reference' => 'Razzak Ahmed'
            ],
            (object)[
                'id' => 2,
                'booked_by' => 'Yea Hasib',
                'booked_for' => Carbon::today()
                        ->addDays(7)
                        ->format('d-m-Y') . ' to ' .
                    Carbon::today()
                        ->addDays(10)
                        ->format('d-m-Y'),
                'booking_type' => 'Single',
                'organization' => 'Brainstation-23',
                'contact' => '0171XXXXXXX',
                'number_of_guest' => 1,
                'reference' => 'Razzak Ahmed'
            ],
        ];

        return view('hm::booking-request.index', compact('bookings'));
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
        return view('hm::booking-request.show');
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
