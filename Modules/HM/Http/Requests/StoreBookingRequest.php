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
            'name' => 'required|max:50',
            'contact' => 'required|size:11',
            'address' => 'required|max:300',
            'email' => 'email',
            'nid' => 'nullable|size:10',
            'organization' => 'required|max:50',
            'designation' => 'required|max:50',
            'organization_type' => 'in:government,private,foreign,others',
            'photo' => 'mimes:jpeg,bmp,png|max:3072|required',
            'nid_doc' => 'nullable|mimes:jpeg,bmp,png|max:3072',
            'passport_doc' => 'nullable|mimes:jpeg,bmp,png|max:3072',
            'guests' => 'required',
            'guests.*.name' => 'required|max:50',
            'guests.*.age' => 'numeric|required',
            'guests.*.gender' => 'in:male,female|required',
            'guests.*.relation' => 'required|max:50',
            'guests.*.nid_doc' => 'nullable|mimes:jpeg,bmp,png|max:3072',
            'guests.*.nid_no' => 'nullable|size:10',
            'guests.*.address' => 'required|max:300',
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
