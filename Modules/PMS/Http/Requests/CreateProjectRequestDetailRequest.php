<?php

namespace Modules\PMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequestDetailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'end_date' => 'date_format:"j F, Y"|required',
            'title' => 'required|max:100',
            'remarks' => 'nullable|max:5000',
            'attachments.*' => 'required|mimes:jpeg,png,jpg,gif,svg,doc,pdf,docx,csv,xlsx,xls|max:3072'
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
