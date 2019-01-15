<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AttributeController extends Controller
{
    public function create()
    {
        return view('pms::attribute.create');
    }
}
