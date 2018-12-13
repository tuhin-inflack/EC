<?php

namespace Modules\HM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_date' => 'date_format:"j F, Y"|after_or_equal:today|required',
            'end_date' => 'date_format:"j F, Y"|after:start_date|required',
            'booking_type' => 'in:general,training|required',
            'roomInfos' => 'required',
            'roomInfos.*.room_type_id' => 'exists:room_types,id|required',
            'roomInfos.*.quantity' => 'numeric|required',
            'roomInfos.*.rate' => 'regex:/^.+_.+$/i|required',
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'email' => 'email',
            'nid' => 'nullable',
            'organization' => 'required',
            'designation' => 'required',
            'organization_type' => 'in:government,private,foreign,others',
            'photo' => 'mimes:jpeg,bmp,png|required',
            'nid_doc' => 'mimes:jpeg,bmp,png|nullable',
            'passport_doc' => 'mimes:jpeg,bmp,png|nullable',
            'guests' => 'required',
            'guests.*.name' => 'required',
            'guests.*.age' => 'numeric|required',
            'guests.*.gender' => 'in:male,female|required',
            'guests.*.relation' => 'required',
            'guests.*.nid_doc' => 'mimes:jpeg,bmp,png|nullable',
            'guests.*.nid_no' => 'mimes:jpeg,bmp,png|nullable',
            'guests.*.address' => 'required',
            'referee_dept' => 'nullable',
            'referee_name' => 'nullable',
            'referee_contact' => 'nullable',
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
