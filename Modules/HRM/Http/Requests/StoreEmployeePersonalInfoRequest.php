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
	public function rules(Request $request) {
//		dd($request->all());
		return [
			'father_name'       => 'required',
			'mother_name'        => 'required',
			'date_of_birth'    => 'required',
			'job_joining_date' => 'required',
			'marital_status'           => 'required',
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

	public function messages() {
		return [
			'first_name.required'       => 'Enter first name',
			'last_name.required'        => 'Enter last name',
			'department_id.required'    => 'Please Select department',
			'designation_code.required' => 'Please Select designation',
			'gender.required'           => 'Please Select gender',
			'status.required'           => 'Please Select status',
			'email.required'            => 'Please enter email',
			'email.unique'              => 'Please enter unique email address',
		];
	}
}
