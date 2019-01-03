<?php

namespace Modules\HM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckinPaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'checkin_id' => 'required|exists:room_bookings,id',
            'amount' => 'required|numeric|max:99999999',
            'type' => 'required|in:cash,card,check',
            'check_number' => 'nullable|size:11',
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
