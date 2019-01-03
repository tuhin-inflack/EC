<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Http\Requests\StoreCheckinPaymentRequest;
use Modules\HM\Services\CheckinPaymentService;

class CheckinPaymentController extends Controller
{
    /**
     * @var CheckinPaymentService
     */
    private $checkinPaymentService;

    /**
     * CheckinPaymentController constructor.
     * @param CheckinPaymentService $checkinPaymentService
     */
    public function __construct(CheckinPaymentService $checkinPaymentService)
    {
        $this->checkinPaymentService = $checkinPaymentService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(RoomBooking $roomBooking)
    {
        if ($roomBooking->type != 'checkin')
        {
            abort(404);
        }

        return view('hm::check-in.payment.index')->with(['checkin' => $roomBooking]);
    }

    /**
     * Show the form for creating a new resource.
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function create(RoomBooking $roomBooking)
    {
        return view('hm::check-in.payment.create')->with(['checkin' => $roomBooking]);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreCheckinPaymentRequest $request
     * @return Response
     */
    public function store(StoreCheckinPaymentRequest $request)
    {
        $checkinPayment = $this->checkinPaymentService->save(array_merge($request->all(), ['shortcode' => time()]));
        Session::flash('success', 'Successfully made payments');

        return redirect()->route('check-in-payments.index', $checkinPayment->checkin_id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('hm::show');
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
