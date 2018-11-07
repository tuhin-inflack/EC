<?php

namespace Modules\HRM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreEmployeeGeneralInfoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
//dd($request->all());
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'department_id' => 'required',
            'designation_code' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'email' => 'required|email|unique:employees',
            'tel_office' => 'numeric|max:11|nullable',
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
			'email.email' => 'Please enter a valid email address',
			'tel_office.numeric' => 'Please enter a valid telephone number',
			'tel_office.max' => 'Use maximum 11 digit',
		];
	}
}
