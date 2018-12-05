<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 12/3/18
 * Time: 1:32 PM
 */

namespace Modules\HM\Services;

use Carbon\Carbon;

class BookingRequestService
{

    private $bookingRequests;

    public function __construct()
    {
        $this->bookingRequests = [
            1 => (object)[
                'request_id' => 'BR52451',
                'requested_on' => Carbon::create('2018', '11', '12')
                    ->format('d-m-Y'),
                'booked_by' => 'Hasib Noor',
                'designation' => 'CEO',
                'booked_for' => Carbon::today()
                        ->format('d-m-Y') . ' to ' .
                    Carbon::today()
                        ->addDays(7)
                        ->format('d-m-Y'),
                'check_in' => Carbon::today()
                    ->format('d-m-Y'),
                'check_out' => Carbon::today()
                    ->addDays(7)
                    ->format('d-m-Y'),
                'booking_type' => 'Official',
                'organization' => 'Inflack Limited',
                'organization_type' => 'Private',
                'contact' => '01718874510',
                'email' => 'noor@inflack.com',
                'address' => 'Bashandhora, Dhaka',
                'number_of_guest' => 12,
                'number_of_rooms' => 5,
                'room_details' => 'AC',
                'reference' => 'Razzak Ahmed',
                'reference_department' => 'Project Management',
                'reference_designation' => 'Consultant',
                'reference_phone' => '01718874510',
            ],
            2 => (object)[
                'request_id' => 'BR52998',
                'requested_on' => Carbon::create('2018', '11', '20')->format('d-m-Y'),
                'booked_by' => 'Yea Hasib',
                'designation' => 'Project Manager',
                'booked_for' => Carbon::today()
                        ->addDays(7)
                        ->format('d-m-Y') . ' to ' .
                    Carbon::today()
                        ->addDays(10)
                        ->format('d-m-Y'),
                'check_in' => Carbon::today()
                    ->addDays(7)
                    ->format('d-m-Y'),
                'check_out' => Carbon::today()
                    ->addDays(10)
                    ->format('d-m-Y'),
                'booking_type' => 'Single',
                'organization' => 'Brainstation-23',
                'organization_type' => 'Private',
                'contact' => '0171XXXXXXX',
                'email' => 'hasib@bs-23.com',
                'address' => 'Mohakhali, Dhaka',
                'number_of_guest' => 1,
                'number_of_rooms' => 1,
                'room_details' => 'AC',
                'reference' => 'Razzak Ahmed',
                'reference_department' => 'Project Management',
                'reference_designation' => 'Consultant',
                'reference_phone' => '01718874510',
            ],
        ];
    }

    public function getAll()
    {
        return $this->bookingRequests;
    }

    public function getBookingRequest($id)
    {
        return $this->bookingRequests[$id];
    }

}