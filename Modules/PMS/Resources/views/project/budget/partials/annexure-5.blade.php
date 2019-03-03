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
                                    <th>@lang('draft-proposal-budget.economy_sub_code')</th>
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
                                @php
                                    $grandTotalWeight = $totalGovSource = $totalOwnFinancingSource = $totalOtherSource = 0;
                                @endphp
                                <tr>
                                    <th colspan="4">(ক) @lang('draft-proposal-budget.revenue') : </th>
                                    @for($l = 1; $l <= 7; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($project->budgets as $budget)
                                    @if($budget->section_type === 'revenue')
                                        @php
                                            $grandTotalWeight += $weight = $budget->total_expense / $data->grandTotalExpense;
                                            $totalGovSource += $budget->gov_source;
                                            $totalOwnFinancingSource += $budget->own_financing;
                                            $totalOtherSource += $budget->other_source;
                                        @endphp
                                        <tr>
                                            <td>{{ $budget->economyCode->economyHead->code }}</td>
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
                                    <th colspan="3">@lang('draft-proposal-budget.economy_code') @lang('labels.wise') @lang('labels.sub_total') : </th>
                                    @for($l = 1; $l <= 7; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($data->economyHeadWiseRevenueData as $economyHeadCode => $revenueHead)
                                    <tr>
                                        <td colspan="3">{{ $economyHeadCode }}</td>
                                        <td></td>
                                        <td>{{ $revenueHead->unitRate }}</td>
                                        <td>{{ $revenueHead->quantity }}</td>
                                        <td>{{ $revenueHead->govSource }}</td>
                                        <td>{{ $revenueHead->ownFinancingSource }}</td>
                                        <td>{{ $revenueHead->otherSource }}</td>
                                        <td>{{ $revenueHead->totalExpense }}</td>
                                        <td>{{ number_format( (float) $revenueHead->totalExpense / $data->grandTotalExpense, 3, '.', '') }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="3">@lang('labels.sub_total') (@lang('draft-proposal-budget.capital')) : </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $data->revenueExpense }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th colspan="4">(খ) @lang('draft-proposal-budget.capital') : </th>
                                    @for($l = 1; $l <= 7; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($project->budgets as $budget)
                                    @if($budget->section_type === 'capital')
                                        @php
                                            $grandTotalWeight += $weight = $budget->total_expense / $data->grandTotalExpense;
                                            $totalGovSource += $budget->gov_source;
                                            $totalOwnFinancingSource += $budget->own_financing;
                                            $totalOtherSource += $budget->other_source;
                                        @endphp
                                        <tr>
                                            <td>{{ $budget->economyCode->code }}</td>
                                            <td>{{ $budget->economyCode->economyHead->code }}</td>
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
                                    <th colspan="3">@lang('draft-proposal-budget.economy_code') @lang('labels.wise') @lang('labels.sub_total') : </th>
                                    @for($l = 1; $l <= 7; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($data->economyHeadWiseCapitalData as $economyHeadCode => $revenueHead)
                                    <tr>
                                        <td colspan="3">{{ $economyHeadCode }}</td>
                                        <td></td>
                                        <td>{{ $revenueHead->unitRate }}</td>
                                        <td>{{ $revenueHead->quantity }}</td>
                                        <td>{{ $revenueHead->govSource }}</td>
                                        <td>{{ $revenueHead->ownFinancingSource }}</td>
                                        <td>{{ $revenueHead->otherSource }}</td>
                                        <td>{{ $revenueHead->totalExpense }}</td>
                                        <td>{{ number_format( (float) $revenueHead->totalExpense / $data->grandTotalExpense, 3, '.', '') }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="3">@lang('labels.sub_total') (@lang('draft-proposal-budget.capital')) : </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $data->capitalExpense }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th colspan="4">(গ) @lang('draft-proposal-budget.physical_contingency') : </th>
                                    @for($l = 1; $l <= 7; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($project->budgets as $budget)
                                    @if($budget->section_type === 'physical_contingency')
                                        @php
                                            $grandTotalWeight += $weight = $data->physicalContingencyExpense / $data->grandTotalExpense;
                                            $totalGovSource += $budget->gov_source;
                                            $totalOwnFinancingSource += $budget->own_financing;
                                            $totalOtherSource += $budget->other_source;
                                        @endphp
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $budget->gov_source }}</td>
                                            <td>{{ $budget->own_financing_source }}</td>
                                            <td>{{ $budget->other_source }}</td>
                                            <td>{{ $data->physicalContingencyExpense }}</td>
                                            <td>{{ number_format( (float) $weight, 3, '.', '') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <th colspan="4">(ঘ) @lang('draft-proposal-budget.price_contingency') : </th>
                                    @for($l = 1; $l <= 7; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($project->budgets as $budget)
                                    @if($budget->section_type === 'price_contingency')
                                        @php
                                            $grandTotalWeight += $weight = $data->priceContingencyExpense / $data->grandTotalExpense;
                                            $totalGovSource += $budget->gov_source;
                                            $totalOwnFinancingSource += $budget->own_financing;
                                            $totalOtherSource += $budget->other_source;
                                        @endphp
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $budget->gov_source }}</td>
                                            <td>{{ $budget->own_financing_source }}</td>
                                            <td>{{ $budget->other_source }}</td>
                                            <td>{{ $data->priceContingencyExpense }}</td>
                                            <td>{{ number_format( (float) $weight, 3, '.', '') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <th colspan="3">@lang('labels.grand_total') (ক+খ+গ+ঘ) : </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $totalGovSource }}</td>
                                    <td>{{ $totalOwnFinancingSource }}</td>
                                    <td>{{ $totalOtherSource }}</td>
                                    <td>{{ $data->grandTotalExpense }}</td>
                                    <td>{{ $grandTotalWeight }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>