@extends('pms::layouts.master')
@section('title', trans('pms::project_budget.title'))

@section('content')
    <div class="container">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12">
                <div class="btn-group float-md-left" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group" role="group">
                        <a class="btn btn-outline-info round" href="{{  route('project.show', $project->id) }}">
                            <i class="ft-eye"></i> @lang('pms::project.title') @lang('labels.details')
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12"></div>
        </div>
        <br>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@lang('pms::project_budget.budgeting')</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>

                                    <div class="heading-elements">
                                        <a href="{{route('project-budget.create', $project->id)}}" class="btn btn-primary btn-sm">
                                            <i class="ft-plus white"></i> @lang('labels.create') @lang('pms::project_budget.budgeting')
                                        </a>
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

                                            <tr>
                                                <th colspan="7">(ক) @lang('draft-proposal-budget.revenue') : </th>
                                                @for($l = 1; $l <= 15; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>

                                            @foreach($project->budgets as $budget)
                                                @if($budget->section_type === 'revenue')
                                                    @php $weight = $budget->total_expense / $data->grandTotalExpense; @endphp
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
                                                        <td>{{ number_format( (float) $budgetFiscalValue->monetary_amount / $budget->total_expense, 3, '.', '') }}</td>
                                                        <td>{{ number_format( ($budgetFiscalValue->monetary_amount / $budget->total_expense ) * $weight, 3, '.', '')}}</td>
                                                    @endforeach
                                                </tr>
                                                @endif
                                            @endforeach
                                            {{--<tr>--}}
                                                {{--<th colspan="2">@lang('labels.sub_total') (@lang('pms::project_budget.revenue'))</th>--}}
                                                {{--@for($l = 1; $l <= 8; $l++)--}}
                                                    {{--<td></td>--}}
                                                {{--@endfor--}}
                                            {{--</tr>--}}
                                            <tr>
                                                <th colspan="7">(খ) @lang('draft-proposal-budget.capital') : </th>
                                                @for($l = 1; $l <= 15; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            @foreach($project->budgets as $budget)
                                                @if($budget->section_type === 'capital')
                                                    @php $weight = $budget->total_expense / $data->grandTotalExpense; @endphp
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
                                                            <td>{{ number_format( (float) $budgetFiscalValue->monetary_amount / $budget->total_expense, 3, '.', '') }}</td>
                                                            <td>{{ number_format( ($budgetFiscalValue->monetary_amount / $budget->total_expense ) * $weight, 3, '.', '')}}</td>
                                                        @endforeach
                                                    </tr>
                                                @endif
                                            @endforeach
                                            {{--<tr>--}}
                                                {{--<th colspan="2">@lang('labels.sub_total') (@lang('pms::project_budget.capital'))</th>--}}
                                                {{--@for($l = 1; $l <= 8; $l++)--}}
                                                    {{--<td></td>--}}
                                                {{--@endfor--}}
                                            {{--</tr>--}}
                                            <tr>
                                                <th colspan="2">(গ) @lang('draft-proposal-budget.physical_contingency'): </th>
                                                @for($l = 1; $l <= 20; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            @foreach($project->budgets as $budget)
                                                @if($budget->section_type === 'physical_contingency')
                                                    <tr>
                                                        <td><a href="{{ route('project-budget.edit', [$project->id, $budget->id]) }}"><i class="la la-edit"></i></a></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $data->physicalContingencyExpense }}</td>
                                                        <td>{{ number_format( (float) $data->physicalContingencyExpense / $data->grandTotalExpense, 3, '.', '') }}</td>
                                                        @foreach($budget->budgetFiscalValue as $budgetFiscalValue)
                                                            <td>{{ $budgetFiscalValue->monetary_amount }}</td>
                                                            <td>{{ $budgetFiscalValue->body_percentage }}</td>
                                                            <td>{{ $budgetFiscalValue->project_percentage }}</td>
                                                        @endforeach
                                                    </tr>
                                                @endif
                                            @endforeach
                                            <tr>
                                                <th colspan="2">(ঘ) @lang('draft-proposal-budget.price_contingency'): </th>
                                                @for($l = 1; $l <= 20; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            @foreach($project->budgets as $budget)
                                                @if($budget->section_type === 'price_contingency')
                                                    <tr>
                                                        <td><a href="{{ route('project-budget.edit', [$project->id, $budget->id]) }}"><i class="la la-edit"></i></a></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $data->priceContingencyExpense }}</td>
                                                        <td>{{ number_format( (float) $data->priceContingencyExpense / $data->grandTotalExpense, 3, '.', '') }}</td>
                                                        @foreach($budget->budgetFiscalValue as $budgetFiscalValue)
                                                            <td>{{ $budgetFiscalValue->monetary_amount }}</td>
                                                            <td>{{ $budgetFiscalValue->body_percentage }}</td>
                                                            <td>{{ $budgetFiscalValue->project_percentage }}</td>
                                                        @endforeach
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
        </div>
    </div>
@endsection

@push('page-js')
@endpush

@push('page-css')
    <style type="text/css">

        .table thead {
            text-align: center;
        }
        .table thead th{
            vertical-align: inherit;
        }
        .table th, .table td {
            padding: 0.15rem 0.15rem;
        }

        input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        select {
            text-transform: none;
            width: 140px;
        }

        select.form-control:not([size]):not([multiple]), input.form-control {
            height: 28px;
        }

        .form-control {
            padding: .1rem 0.25rem;
        }
    </style>
@endpush