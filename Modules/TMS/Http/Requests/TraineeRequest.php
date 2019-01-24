<?php

namespace Modules\TMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TraineeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'training_id' => 'required',
            'trainee_first_name' => 'required|string|min:3|max:100',
            'trainee_last_name' => 'required|string|min:3|max:100',
            'trainee_gender' => 'string|required|max:6',
            'mobile' => 'string|required|max:15',
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
