<?php

namespace Modules\PMS\Http\Requests;

use App\Entities\Attribute;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreAttributeValueRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'attribute_id' => 'required|exists:attributes,id',
            'date' => 'required|date',
            'transaction_type' => 'required|in:withdraw,deposit',
            'achieved_value' => [
                'required',
                'numeric',
                'min:0',
                function ($input, $value, $fail) use ($request) {
                    $attribute = Attribute::find($request->get('attribute_id'));

                    if ($this->isNotShareAttribute($attribute)) {
                        $attribute->values->sum('achieved_value') >= $value ?: $fail(trans('labels.achieved value cannot be greater than current balance'));
                    }
                }
            ]
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

    /**
     * @param Attribute $attribute
     * @param Request $request
     * @return bool
     */
    function isNotShareAndWithdrawTransaction(Attribute $attribute, Request $request): bool
    {
        return $attribute->name != 'Share' && $request->get('transaction_type') == 'withdraw';
    }
}
