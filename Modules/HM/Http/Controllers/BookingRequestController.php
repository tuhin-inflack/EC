<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HM\Services\BookingRequestService;

class BookingRequestController extends Controller
{
    private $bookingRequestService;

    /**
     * BookingRequestController constructor.
     * @param BookingRequestService
     */
    public function __construct(BookingRequestService $bookingRequestService)
    {
        $this->bookingRequestService = $bookingRequestService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $bookings = $this->bookingRequestService->getAll();

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
    public function show($id)
    {
        $booking = $this->bookingRequestService->getBookingRequest($id);

        return view('hm::booking-request.show', compact('booking'));
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
