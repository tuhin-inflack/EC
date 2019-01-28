<?php

namespace Modules\RMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProposalSubmissionRequest extends FormRequest
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
            'attachments.*' => 'required|mimes:doc,pdf,docx,csv,xlsx,xls|max:3072'
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
