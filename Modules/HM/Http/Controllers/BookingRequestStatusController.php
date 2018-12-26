<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Http\Requests\UpdateBookingRequestStatusRequest;
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
    public function update(UpdateBookingRequestStatusRequest $request, RoomBooking $roomBooking)
    {
        $this->bookingRequestService->update($roomBooking, $request->all());
        Session::flash('message', 'Successfully Update Booking Request');

        return redirect()->back();
    }
}
