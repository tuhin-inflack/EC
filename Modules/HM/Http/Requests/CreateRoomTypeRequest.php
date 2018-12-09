<?php

namespace Modules\HM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomTypeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:room_types',
            'capacity' => 'required|numeric|min:1|max:10',
            'general_rate' => 'required|numeric'
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
