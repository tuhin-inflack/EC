<?php

namespace Modules\HRM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreEmployeePersonalInfoRequest extends FormRequest {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	protected $errorBag = 'personalinfo';

	public function rules( Request $request ) {
//		dd( $request->all() );

		return [
			'father_name' => 'required',
			'mother_name' => 'required',
			'job_joining_date' => 'required',
			'date_of_birth' => 'required',
			'marital_status' => 'required',
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}


}
