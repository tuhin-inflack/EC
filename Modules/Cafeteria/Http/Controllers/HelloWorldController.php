<?php

namespace Modules\Cafeteria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Cafeteria\Services\HelloWorldServices;

class HelloWorldController extends Controller {
	protected $testProperty;

	public function __construct( HelloWorldServices $myObject ) {
		$this->testProperty = $myObject;
	}

	public function index() {
		dd($this->testProperty->getHelloWorld() );
	}

}