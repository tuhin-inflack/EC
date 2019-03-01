<div class="col-md-12">
    <section id="number-tabs">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('draft-proposal-budget.annexure-4')</h4>
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
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th rowspan="3" width="15%">@lang('draft-proposal-budget.economy_code')</th>
                                    <th rowspan="3" width="10%">@lang('draft-proposal-budget.economy_code') @lang('labels.details')</th>
                                    <th colspan="5">@lang('draft-proposal-budget.total_financial_and_implementation_plans')</th>
                                    @for($l = 1; $l <= 5; $l++)
                                        <th colspan="3">@lang('draft-proposal-budget.finance_year') -- {{$l}}</th>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2">@lang('labels.unit')</th>
                                    <th rowspan="2">@lang('labels.unit_rate')</th>
                                    <th rowspan="2">@lang('labels.quantity')</th>
                                    <th rowspan="2">@lang('labels.total') @lang('labels.expense')</th>
                                    <th rowspan="2">@lang('labels.weight')</th>
                                    @for($l = 1; $l <= 5; $l++)
                                        <th rowspan="2" width="10%">@lang('draft-proposal-budget.monetary_amount') (@lang('draft-proposal-budget.lac_bdt'))</th>
                                        <th colspan="2">@lang('labels.actual')</th>
                                    @endfor
                                </tr>
                                <tr>
                                    @for($l = 1; $l <= 5; $l++)
                                        <th>@lang('draft-proposal-budget.body_percentage')</th>
                                        <th>@lang('draft-proposal-budget.project_percentage')</th>
                                    @endfor
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $grandTotalWeight = 0;
                                @endphp
                                <tr>
                                    <th colspan="7">(ক) @lang('draft-proposal-budget.revenue') : </th>
                                    @for($l = 1; $l <= 15; $l++)
                                        <td></td>
                                    @endfor
                                </tr>

                                @foreach($project->budgets as $budget)
                                    @if($budget->section_type === 'revenue')
                                        @php $grandTotalWeight += $weight = $budget->total_expense / $data->grandTotalExpense; @endphp
                                        <tr>
                                            <td><a href="{{ route('project-budget.edit', [$project->id, $budget->id]) }}"><i class="la la-edit"></i></a>{{ $budget->economyCode->code }}</td>
                                            <td>{{ $budget->economyCode->bangla_name }}</td>
                                            <td>{{ $budget->unit }}</td>
                                            <td>{{ $budget->unit_rate }}</td>
                                            <td>{{ $budget->quantity }}</td>
                                            <td>{{ $budget->total_expense }}</td>
                                            <td>{{ number_format( (float) $weight, 3, '.', '') }}</td>
                                            @foreach($budget->budgetFiscalValue as $budgetFiscalValue)
                                                <td>{{ $budgetFiscalValue->monetary_amount }}</td>
                                                <td>{{ number_format( (float) ($budgetFiscalValue->monetary_amount * 100000 )  / $budget->total_expense, 4, '.', '') }}</td>
                                                <td>{{ number_format( ( ($budgetFiscalValue->monetary_amount * 100000 ) / $budget->total_expense ) * $weight, 4, '.', '')}}</td>
                                            @endforeach
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <th colspan="2">@lang('labels.sub_total') (@lang('draft-proposal-budget.revenue')) : </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $data->revenueExpense }}</td>
                                    @for($l = 1; $l <= 16; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="2">(খ) @lang('draft-proposal-budget.capital') : </th>
                                    @for($l = 1; $l <= 20; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($project->budgets as $budget)
                                    @if($budget->section_type === 'capital')
                                        @php $grandTotalWeight += $weight = $budget->total_expense / $data->grandTotalExpense; @endphp
                                        <tr>
                                            <td><a href="{{ route('project-budget.edit', [$project->id, $budget->id]) }}"><i class="la la-edit"></i></a>{{ $budget->economyCode->code }}</td>
                                            <td>{{ $budget->economyCode->bangla_name }}</td>
                                            <td>{{ $budget->unit }}</td>
                                            <td>{{ $budget->unit_rate }}</td>
                                            <td>{{ $budget->quantity }}</td>
                                            <td>{{ $budget->total_expense }}</td>
                                            <td>{{ number_format( (float) $weight, 3, '.', '') }}</td>
                                            @foreach($budget->budgetFiscalValue as $budgetFiscalValue)
                                                <td>{{ $budgetFiscalValue->monetary_amount }}</td>
                                                <td>{{ number_format( (float) ($budgetFiscalValue->monetary_amount * 100000 ) / $budget->total_expense, 4, '.', '') }}</td>
                                                <td>{{ number_format( ( ($budgetFiscalValue->monetary_amount * 100000 ) / $budget->total_expense ) * $weight, 4, '.', '')}}</td>
                                            @endforeach
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <th colspan="2">@lang('labels.sub_total') (@lang('draft-proposal-budget.capital')) : </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $data->capitalExpense }}</td>
                                    @for($l = 1; $l <= 16; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="2">(গ) @lang('draft-proposal-budget.physical_contingency') : </th>
                                    @for($l = 1; $l <= 20; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($project->budgets as $budget)
                                    @if($budget->section_type === 'physical_contingency')
                                        @php $grandTotalWeight += $weight = $data->physicalContingencyExpense / $data->grandTotalExpense; @endphp
                                        <tr>
                                            <td><a href="{{ route('project-budget.edit', [$project->id, $budget->id]) }}"><i class="la la-edit"></i></a></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $data->physicalContingencyExpense }}</td>
                                            <td>{{ number_format( (float) $weight, 3, '.', '') }}</td>
                                            @foreach($budget->budgetFiscalValue as $budgetFiscalValue)
                                                <td>{{ $budgetFiscalValue->monetary_amount }}</td>
                                                <td>{{ number_format( (float) ($budgetFiscalValue->monetary_amount * 100000 ) / $data->physicalContingencyExpense, 3, '.', '') }}</td>
                                                <td>{{ number_format( ( ($budgetFiscalValue->monetary_amount * 100000 ) / $data->physicalContingencyExpense ) * $weight, 3, '.', '')}}</td>
                                            @endforeach
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <th colspan="2">(ঘ) @lang('draft-proposal-budget.price_contingency') : </th>
                                    @for($l = 1; $l <= 20; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                @foreach($project->budgets as $budget)
                                    @if($budget->section_type === 'price_contingency')
                                        @php $grandTotalWeight += $weight = $data->priceContingencyExpense / $data->grandTotalExpense; @endphp
                                        <tr>
                                            <td><a href="{{ route('project-budget.edit', [$project->id, $budget->id]) }}"><i class="la la-edit"></i></a></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $data->priceContingencyExpense }}</td>
                                            <td>{{ number_format( (float) $weight, 3, '.', '') }}</td>
                                            @foreach($budget->budgetFiscalValue as $budgetFiscalValue)
                                                <td>{{ $budgetFiscalValue->monetary_amount }}</td>
                                                <td>{{ number_format( (float) ($budgetFiscalValue->monetary_amount * 100000 ) / $data->physicalContingencyExpense, 3, '.', '') }}</td>
                                                <td>{{ number_format( ( ($budgetFiscalValue->monetary_amount * 100000 ) / $data->physicalContingencyExpense ) * $weight, 3, '.', '')}}</td>
                                            @endforeach
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <th colspan="2">@lang('labels.grand_total') (ক+খ+গ+ঘ) : </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $data->grandTotalExpense }}</td>
                                    <td>{{ $grandTotalWeight }}</td>
                                    @for($l = 1; $l <= 15; $l++)
                                        <td></td>
                                    @endfor
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