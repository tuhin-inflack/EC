<?php

namespace Modules\HRM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeGeneralInfoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'department_id' => 'required',
            'designation_code' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'email' => 'required|email|unique:employees',
        ];
    }


    public function authorize()
    {
        return true;
    }
	public function messages()
	{
		return [
			'first_name.required' => 'Enter first name',
			'last_name.required' => 'Enter last name',
			'department_id.required' => 'Please Select department',
			'designation_code.required' => 'Please Select designation',
			'gender.required' => 'Please Select gender',
			'status.required' => 'Please Select status',
			'email.required' => 'Please enter email',
			'email.unique' => 'Please enter unique email address',
		];
	}
}
