<div class="col-md-12">
    <section id="number-tabs">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('draft-proposal-budget.annexure-5')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>@lang('draft-proposal-budget.economy_code')</th>
                                    <th>@lang('draft-proposal-budget.economy_code') @lang('labels.details')</th>
                                    <th>@lang('labels.unit')</th>
                                    <th>@lang('labels.unit_rate')</th>
                                    <th>@lang('labels.quantity')</th>
                                    <th>@lang('draft-proposal-budget.gov') (@lang('draft-proposal-budget.foreign_currency'))</th>
                                    <th>@lang('draft-proposal-budget.own_financing') (@lang('draft-proposal-budget.foreign_currency'))</th>
                                    <th>@lang('draft-proposal-budget.other')</th>
                                    <th>@lang('labels.total')</th>
                                    <th>@lang('draft-proposal-budget.total_estimated_expenditure_percentage')</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th colspan="3">(ক) @lang('draft-proposal-budget.revenue') : </th>
                                    @for($l = 1; $l <= 7; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($project->budgets as $budget)
                                    @if($budget->section_type === 'revenue')
                                        @php $weight = $budget->total_expense / $data->grandTotalExpense; @endphp
                                        <tr>
                                            <td>{{ $budget->economyCode->code }}</td>
                                            <td>{{ $budget->economyCode->bangla_name }}</td>
                                            <td>{{ $budget->unit }}</td>
                                            <td>{{ $budget->unit_rate }}</td>
                                            <td>{{ $budget->quantity }}</td>
                                            <td>{{ $budget->gov_source }}</td>
                                            <td>{{ $budget->own_financing_source }}</td>
                                            <td>{{ $budget->other_source }}</td>
                                            <td>{{ $budget->total_expense }}</td>
                                            <td>{{ number_format( (float) $weight, 3, '.', '') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <th colspan="3">(খ) @lang('draft-proposal-budget.capital') : </th>
                                    @for($l = 1; $l <= 7; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($project->budgets as $budget)
                                    @if($budget->section_type === 'capital')
                                        @php $weight = $budget->total_expense / $data->grandTotalExpense; @endphp
                                        <tr>
                                            <td>{{ $budget->economyCode->code }}</td>
                                            <td>{{ $budget->economyCode->bangla_name }}</td>
                                            <td>{{ $budget->unit }}</td>
                                            <td>{{ $budget->unit_rate }}</td>
                                            <td>{{ $budget->quantity }}</td>
                                            <td>{{ $budget->gov_source }}</td>
                                            <td>{{ $budget->own_financing_source }}</td>
                                            <td>{{ $budget->other_source }}</td>
                                            <td>{{ $budget->total_expense }}</td>
                                            <td>{{ number_format( (float) $weight, 3, '.', '') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <th colspan="3">(গ) @lang('draft-proposal-budget.physical_contingency') : </th>
                                    @for($l = 1; $l <= 7; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($project->budgets as $budget)
                                    @if($budget->section_type === 'physical_contingency')
                                        @php $weight = $data->physicalContingencyExpense / $data->grandTotalExpense; @endphp
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $budget->gov_source }}</td>
                                            <td>{{ $budget->own_financing_source }}</td>
                                            <td>{{ $budget->other_source }}</td>
                                            <td>{{ $budget->total_expense }}</td>
                                            <td>{{ number_format( (float) $weight, 3, '.', '') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <th colspan="3">(ঘ) @lang('draft-proposal-budget.price_contingency') : </th>
                                    @for($l = 1; $l <= 7; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($project->budgets as $budget)
                                    @if($budget->section_type === 'price_contingency')
                                        @php $weight = $data->priceContingencyExpense / $data->grandTotalExpense; @endphp
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $budget->gov_source }}</td>
                                            <td>{{ $budget->own_financing_source }}</td>
                                            <td>{{ $budget->other_source }}</td>
                                            <td>{{ $budget->total_expense }}</td>
                                            <td>{{ number_format( (float) $weight, 3, '.', '') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>