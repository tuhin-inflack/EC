<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Services\BookingRequestService;

class BookingRequestStatusController extends Controller
{
    /**
     * @var BookingRequestService
     */
    private $bookingRequestService;

    /**
     * BookingRequestStatusController constructor.
     * @param BookingRequestService $bookingRequestService
     */
    public function __construct(BookingRequestService $bookingRequestService)
    {
        $this->bookingRequestService = $bookingRequestService;
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, RoomBooking $roomBooking)
    {
        $this->bookingRequestService->update($roomBooking, $request->all());
        return redirect()->back();
    }
}
