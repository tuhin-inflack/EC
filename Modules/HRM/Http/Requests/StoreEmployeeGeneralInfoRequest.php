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
            'tel_office' => 'numeric|digits_between:9,11|nullable',
            'tel_home' => 'numeric|digits_between:11,13|nullable',
            'mobile_one' => 'numeric|digits_between:11,13|nullable',
            'mobile_two' => 'numeric|digits_between:11,13|nullable',
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
//			tel_office
			'tel_office.numeric' => 'Please enter a valid telephone number',
			'tel_office.digits_between' => 'Use minimum 9 digit and maximum 11 digit',
//			tel_home
			'tel_home.numeric' => 'Please enter a valid telephone number',
			'tel_home.digits_between' => 'Use minimum 9 digit and maximum 11 digit',

//			mobile_one
			'mobile_one.numeric' => 'Please enter a valid mobile number',
			'mobile_one.digits_between' => 'Use minimum 11 digit and maximum 13 digit',

//			mobile_two
			'mobile_two.numeric'        => 'Please enter a valid mobile number',
			'mobile_two.digits_between' => 'Use minimum 11 digit and maximum 13 digit',
		];
	}
}
