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
            'shortcode' => 'nullable|size:11|unique:checkin_payments',
            'amount' => ['required','numeric','max:99999999','min:1',  function ($attribute, $value, $fail) {
                if ($value > ($this->roomBooking->roomInfos->sum(function ($roomInfo) { return $roomInfo->rate * $roomInfo->quantity; }) - $this->roomBooking->payments()->sum('amount'))) {
                    $fail($attribute.' cannot be greater than total.');
                }
            }],
            'type' => 'required|in:cash,card,check',
            'check_number' => 'nullable|min:11',
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
