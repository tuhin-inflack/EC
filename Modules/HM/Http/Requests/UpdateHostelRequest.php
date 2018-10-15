<?php

namespace Modules\HM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHostelRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shortcode' => 'required|max:20|unique:hostels,shortcode,' . $this->hostel->id,
            'name' => 'required',
            'total_room' => 'required|numeric|min:1',
            'total_seat' => 'required|numeric|min:1'
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
