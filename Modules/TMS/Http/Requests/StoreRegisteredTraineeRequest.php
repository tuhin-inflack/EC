<?php

namespace Modules\TMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisteredTraineeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bangla_name'   => 'required|max:50',
            'english_name'  => 'required|max:50',
            'gender'        => 'required',
            'dob'           => 'required',
            'email'         => 'required|email',
            'mobile'        => 'numeric|digits_between:11,13|required',
            'phone'         => 'numeric|digits_between:6,11|nullable',
            'fax'           => 'numeric|digits_between:6,11|nullable',
            'photo'         => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
