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

        $dummy_string = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt est ac dolor condimentum vitae laoreet ante accumsan. Nullam tincidunt tincidunt ante tempus commodo. Duis rutrum, magna non lacinia tincidunt, risus lacus tempus ipsum, sit amet euismod justo metus ut metus. Donec feugiat urna non leo laoreet in tincidunt lectus gravida. Sed semper ante sed dui consectetur eget commodo eros imperdiet. Mauris magna diam, scelerisque at ornare vel, dignissim ac sem. Fusce id congue lacus. Duis sit amet tellus erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus mattis facilisis pretium. In in nibh eu urna ornare semper. Sed imperdiet felis vitae nibh sagittis eu pulvinar metus facilisis. Sed dolor orci, aliquet sagittis auctor id, faucibus at justo.

Vestibulum vestibulum velit nec magna lobortis elementum. Ut egestas ultrices tincidunt. Sed vestibulum mi vitae dui interdum eget rhoncus neque faucibus. Ut nec leo tellus. Nunc in metus sit amet purus bibendum dignissim pulvinar quis erat. Quisque vel ultricies nisi. Vestibulum eu ante risus. In ultrices dignissim massa, vel luctus dui consequat quis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dui nulla, venenatis at porttitor nec, sagittis et urna. Nulla facilisi. Integer bibendum porta urna porta suscipit. In condimentum quam quis justo accumsan molestie. Fusce accumsan vulputate mattis. Sed pharetra volutpat erat at convallis. Etiam tempus, est ac tincidunt scelerisque, mi elit pretium nulla, sit amet viverra nisl enim id lorem. Suspendisse ut enim ullamcorper tellus eleifend sagittis. Aenean mollis turpis eu nisl viverra laoreet. Mauris ante purus, tempor ut viverra eu, vestibulum eget tellus. Morbi vitae dolor tellus. Mauris sodales rutrum nunc, a imperdiet augue egestas vel. Nulla facilisi. Nulla venenatis tristique nisi ut blandit. Phasellus suscipit arcu adipiscing velit posuere nec lacinia urna mattis.

Nulla ullamcorper magna sit amet leo porta blandit. Aliquam sed nulla ac arcu vehicula feugiat. Fusce eget accumsan dui. Vestibulum vel leo tellus. Sed dignissim justo in nunc interdum tempor vehicula neque egestas. Fusce lacinia turpis sit amet leo consequat laoreet. Cras nec erat ac purus volutpat consequat. Vestibulum iaculis tincidunt purus eget blandit. Cras consectetur tellus libero. Vestibulum eros orci, volutpat vitae lobortis sit amet, porta quis felis. In a lacus ac neque luctus mollis. Nulla elementum nunc ac ante porttitor id venenatis augue venenatis. In aliquam magna non dolor convallis consequat.";

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
