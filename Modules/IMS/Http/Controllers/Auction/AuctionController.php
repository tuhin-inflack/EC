<?php

namespace Modules\IMS\Http\Controllers\Auction;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\IMS\Services\AuctionService;
use Illuminate\Support\Facades\Session;
use Modules\IMS\Entities\Auction;
class AuctionController extends Controller
{

    private $_auctionService;
    
    
    public function __construct(AuctionService $auctionService)
    {
        $this->_auctionService=$auctionService;
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $auctions = $this->_auctionService->findAll();
        return view('ims::auction.index', compact('auctions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('ims::auction.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // return $request;
        if ($this->_auctionService->auctionStore($request->all())) {
            Session::flash('success', trans('labels.save_success'));
        } else {
            Session::flash('error', trans('labels.save_fail'));
        }
        return redirect()->route('auction.index');

        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $auction=$this->_auctionService->findOne($id);
        $auctionDetails=$auction->details()->get();
        return view('ims::auction.show',compact('auction','auctionDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $auction=$this->_auctionService->findOne($id);
        $auctionDetails=$auction->details()->get();
        return view('ims::auction.edit',compact('auction','auctionDetails'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request,Auction $auction)
    {
        // return $request;
        if ($this->_auctionService->auctionUpdate($auction,$request->all())) {
            Session::flash('success', trans('labels.save_success'));
        } else {
            Session::flash('error', trans('labels.save_fail'));
        }
        return redirect()->route('auction.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
