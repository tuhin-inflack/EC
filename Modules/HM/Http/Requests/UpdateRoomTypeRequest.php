<?php

namespace Modules\HM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed roomType
 */
class UpdateRoomTypeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:room_types,name,' . $this->roomType->id,
            'capacity' => 'required|numeric|min:1'
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
