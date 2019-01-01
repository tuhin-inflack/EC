<?php

namespace Modules\TMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'training_id' => 'required|string|min:2|max:100|unique:trainings',
            'training_title' => 'required|string|min:3|max:100',
            'start_date' => 'string|date|required',
            'end_date' => 'string|date|required',
            'no_of_trainee' => 'required|number',
            'training_len' => 'required|number|gt:0'

        ];
    }
}
