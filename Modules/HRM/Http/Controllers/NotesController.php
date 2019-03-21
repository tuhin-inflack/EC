<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $dummy_string = "Oat cake ice cream candy chocolate cake chocolate cake cotton
                                    candy dragée apple pie. Brownie carrot cake candy canes bonbon
                                    fruitcake topping halvah. Cake sweet roll cake cheesecake cookie
                                    chocolate cake liquorice. Apple pie sugar plum powder donut
                                    soufflé.";
        return view('hrm::notes.index', compact('dummy_string'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('hrm::notes.create');
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

        $dummy_string = "Oat cake ice cream candy chocolate cake chocolate cake cotton
                                    candy dragée apple pie. Brownie carrot cake candy canes bonbon
                                    fruitcake topping halvah. Cake sweet roll cake cheesecake cookie
                                    chocolate cake liquorice. Apple pie sugar plum powder donut
                                    soufflé.";

        return view('hrm::notes.detail', compact('dummy_string'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('hrm::notes.edit');
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
       return "workded";
    }
}
