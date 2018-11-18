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

		$this->redirect          = '/hrm/employee/create?employee=' . $request->education[0]['employee_id'] . '#education';

		return [
			'education.*.institute_name'       => 'required',
			'education.*.degree_name'       => 'required',
			'education.*.department'       => 'required',
			'education.*.passing_year'       => 'required',
			'education.*.duration'       => 'required',
			'education.*.result'       => 'required',
//			'email'            => 'required|unique:employees,email,' . $request->id,

		];

	}
	public function messages() {
		$messages = [
			'education.*.institute_name.required' => 'Please enter institute name',
			'education.*.degree_name.required' => 'Please enter degree name ',
			'education.*.department.required' => 'Please enter department name ',
			'education.*.passing_year.required' => 'Please enter passing year ',
			'education.*.duration.required' => 'Please enter duration ',
			'education.*.result.required' => 'Please enter result ',
		];

		return $messages;
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
