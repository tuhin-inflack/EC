<?php

namespace App\Http\Responses;

use Illuminate\Http\Response;

class DataResponse extends Response {
	private $data;
	private $employeeId;

	/**
	 * DataResponse constructor.
	 *
	 * @param $data
	 */
	public function __construct( $data, $id = "", $content = '', $status = 200, $headers = [] ) {
		$this->data = $data;
		$this->employeeId = $id;
		parent::__construct( $content, $status, $headers );
	}

	/**
	 * @return string
	 */
	public function getEmployeeId() {
		return $this->employeeId;
	}

	/**
	 * @param string $id
	 */
	public function setEmployeeId( $id ) {
		$this->employeeId = $id;
	}

	/**
	 * @return mixed
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * @param mixed $data
	 */
	public function setData( $data ) {
		$this->data = $data;
	}


}