<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Services\CheckinService;

class CheckoutController extends Controller
{
    /**
     * @var CheckinService
     */
    private $checkinService;

    /**
     * CheckoutController constructor.
     * @param CheckinService $checkinService
     */
    public function __construct(CheckinService $checkinService)
    {
        $this->checkinService = $checkinService;
    }

    /**
     * @param Request $request
     * @param RoomBooking $roomBooking
     * @return mixed
     */
    public function update(Request $request, RoomBooking $roomBooking)
    {
        if ($roomBooking->type != 'checkin')
        {
            abort(404);
        }

        return $this->checkinService->checkout($roomBooking);
    }
}
