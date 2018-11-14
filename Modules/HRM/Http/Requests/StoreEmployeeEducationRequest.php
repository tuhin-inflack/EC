<?php

namespace Modules\HRM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreEmployeeEducationRequest extends FormRequest {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	protected $errorBag = "educationError";

	public function rules( Request $request ) {
//		$this->redirect          = '/hrm/employee/create?employee=' . $request->employee_id . '#education';
//		$rules['institute_name'] = [];
//		foreach ( $this->request->get( 'education' ) as $key => $val ) {
//			$rules['institute_name'][][ 'education[' . $key . '][institute_name]' ] = 'required';
//		}
//
//		dd($rules);
//		return $rules;
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
