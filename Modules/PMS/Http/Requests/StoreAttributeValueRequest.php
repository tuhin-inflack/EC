<?php

namespace Modules\PMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttributeValueRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'attribute_id' => 'required|exists:attributes,id',
            'date' => 'required|date',
            'transaction_type' => 'required|in:withdraw,deposit',
            'achieved_value' => 'required|numeric|min:0'
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
