<?php

namespace Modules\IMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInventoryRequestPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'from_location_id' => 'required',
            'to_location_id' => 'required',
            'request_type' => 'required|in:requisition,transfer,scrap,abandon',
            'receiver_id' => $this->request_type === "requisition" ? 'required' : '',
            'category' => $this->request_type  === "requisition" ? 'required_without_all:new-category,bought-category|array|min:1' : 'required|array|min:1',
            'new-category' => $this->request_type  === "requisition" ? 'required_without_all:category,bought-category|array|min:1' : '',
            'bought-category' => $this->request_type  === "requisition" ? 'required_without_all:category,new-category|array|min:1' : '',
        ];
    }

    public function messages()
    {
        return [
            'category.min:1' => trans('ims::inventory.category') . ' ' . trans('labels.add'),
            'category.required' => trans('ims::inventory.category') . ' ' . trans('labels.add'),
            'category.required_without_all' => trans('validation.required_without_all',
                [
                    'attribute' => trans('ims::inventory.category'),
                    'values' => trans('ims::inventory.bought-category') ."/".trans('ims::inventory.new-category')
                ]
            ),
            'new-category.min:1' => trans('ims::inventory.new-category') . ' ' . trans('labels.add'),
            'new-category.required_without_all' => trans('validation.required_without_all',
                [
                    'attribute' => trans('ims::inventory.new-category'),
                    'values' => trans('ims::inventory.category') ."/".trans('ims::inventory.bought-category')
                ]
            ),
            'bought-category.min:1' => trans('ims::inventory.bought-category') . ' ' . trans('labels.add'),
            'bought-category.required_without_all' => trans('validation.required_without_all',
                [
                    'attribute' => trans('ims::inventory.bought-category'),
                    'values' => trans('ims::inventory.category') ."/".trans('ims::inventory.new-category')
                ]
            ),
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
