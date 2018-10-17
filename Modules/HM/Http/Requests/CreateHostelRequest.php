<?php

namespace Modules\HM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHostelRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shortcode' => 'required|unique:hostels|max:20',
            'name' => 'required',
            'level' => 'required|numeric',
            'total_room' => 'required|numeric|min:1',
            'total_seat' => 'required|numeric|min:1',
            'room_types.*.name' => 'required|max:100',
            'room_types.*.capacity' => 'required|numeric|min:1',
            'room_types.*.rate' => 'required|numeric|min:1',
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
