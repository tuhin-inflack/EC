@extends('pms::layouts.master')
@section('title', trans('pms::project_budget.title'))

@section('content')
    <div class="container">
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
                                            <i class="ft-plus white"></i> {{trans('pms::project_proposal.new_project_create')}}
                                        </a>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                            <tr>
                                                <th rowspan="3" width="15%">@lang('pms::project_budget.economy_code')</th>
                                                <th rowspan="3" width="10%">@lang('pms::project_budget.economy_code') @lang('labels.details')</th>
                                                <th colspan="5">@lang('pms::project_budget.total_financial_and_implementation_plans')</th>
                                                <th colspan="3">@lang('pms::project_budget.finance_year') -- 1</th>
                                            </tr>
                                            <tr>
                                                <th rowspan="2">@lang('labels.unit')</th>
                                                <th rowspan="2">@lang('labels.unit_rate')</th>
                                                <th rowspan="2">@lang('labels.quantity')</th>
                                                <th rowspan="2">@lang('labels.total') @lang('pms::project_budget.expense')</th>
                                                <th rowspan="2">@lang('labels.weight')</th>
                                                <th rowspan="2" width="10%">@lang('pms::project_budget.monetary_amount') (@lang('pms::project_budget.lac_bdt'))</th>
                                                <th colspan="2">@lang('labels.actual')</th>
                                            </tr>
                                            <tr>
                                                <th>@lang('pms::project_budget.body_percentage')</th>
                                                <th>@lang('pms::project_budget.project_percentage')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                @for($l = 1; $l <= 10; $l++)
                                                    <td>{{$l}}</td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <th colspan="7">(ক) @lang('pms::project_budget.revenue') : </th>
                                                @for($l = 1; $l <= 3; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                @for($l = 1; $l <= 10; $l++)
                                                    <td>{{$l}}</td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <th colspan="2">@lang('labels.sub_total') (@lang('pms::project_budget.revenue'))</th>
                                                @for($l = 1; $l <= 8; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <th colspan="7">(খ) @lang('pms::project_budget.capital') : </th>
                                                @for($l = 1; $l <= 3; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                @for($l = 1; $l <= 10; $l++)
                                                    <td>{{$l}}</td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <th colspan="2">@lang('labels.sub_total') (@lang('pms::project_budget.capital'))</th>
                                                @for($l = 1; $l <= 8; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <th colspan="2">(গ) @lang('pms::project_budget.physical_contingency'): </th>
                                                @for($l = 1; $l <= 8; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                @for($l = 1; $l <= 10; $l++)
                                                    <td>{{$l}}</td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <th colspan="2">(ঘ) @lang('pms::project_budget.price_contingency'): </th>
                                                @for($l = 1; $l <= 8; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                @for($l = 1; $l <= 10; $l++)
                                                    <td>{{$l}}</td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <th colspan="2">@lang('labels.grand_total') (ক+খ+গ+ঘ)</th>
                                                @for($l = 1; $l <= 8; $l++)
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