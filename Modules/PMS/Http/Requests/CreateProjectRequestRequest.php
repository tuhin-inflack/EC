<?php

namespace Modules\PMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequestRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'send_to' => 'required|email',
            'end_date' => 'required',
            'message' => 'required|max:20',
            'attachment' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
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
