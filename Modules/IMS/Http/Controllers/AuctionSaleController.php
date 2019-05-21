<?php

namespace Modules\IMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AuctionSaleController extends Controller
{
    public function create()
    {
        return view('ims::auction.sale.create');
    }
}
