<?php

namespace Modules\HM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreHostelBudgetSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
	public function rules( Request $request ) {
		return [
			'name' => 'required|unique:hostel_budget_sections,name,' . $request->id,

		];
	}

	public function messages() {
		return [
			'name.required' => "Enter section name",
			'name.unique' => 'You already added this name. enter new name'
		];
	}
}
