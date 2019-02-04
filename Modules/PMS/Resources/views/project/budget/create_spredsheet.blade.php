@extends('pms::layouts.master')
@section('title', trans('pms::project_budget.title'))

@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/assets/css/style.css') }}">
    <style type="text/css">

        .table thead {
            text-align: center;
        }
        .table thead th{
            vertical-align: inherit;
        }
        .table th, .table td {
            padding: 0.15rem 0.05rem;
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

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@lang('labels.create') @lang('pms::project_budget.budgeting')</h4>
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
                                                <th colspan="7">(ক) রাজস্ব : <i class="la la-plus-circle tex-row-add text-primary"></i></th>
                                                @for($l = 1; $l <= 3; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="10%">
                                                    {!! Form::select('economy_code',$economyCodeOptions, null, ['class'=>'form-control']) !!}
                                                </td>
                                                <td width="6%"><input type="text" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control" readonly></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">উপ-মোট (রাজস্ব)</th>
                                                @for($l = 1; $l <= 8; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <th colspan="7">(খ) মূলধন : <i class="la la-plus-circle capital-row-add text-primary"></i></th>
                                                @for($l = 1; $l <= 3; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="10%">
                                                    {!! Form::select('economy_code',$economyCodeOptions, null, ['class'=>'form-control']) !!}
                                                </td>
                                                <td width="6%"><input type="text" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control" readonly></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">উপ-মোট (মূলধন)</th>
                                                @for($l = 1; $l <= 8; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <th colspan="2">(গ) ফিজিক্যাল কনটিনজেন্সি: <i class="la la-plus-circle capital-row-add text-primary"></i></th>
                                                @for($l = 1; $l <= 8; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="10%">
                                                    {!! Form::select('economy_code',$economyCodeOptions, null, ['class'=>'form-control']) !!}
                                                </td>
                                                <td width="6%"><input type="text" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control" readonly></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">(ঘ) প্রাইস কনটিনজেন্সি: <i class="la la-plus-circle capital-row-add text-primary"></i></th>
                                                @for($l = 1; $l <= 8; $l++)
                                                    <td></td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="10%">
                                                    {!! Form::select('economy_code',$economyCodeOptions, null, ['class'=>'form-control']) !!}
                                                </td>
                                                <td width="6%"><input type="text" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control" readonly></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                                <td width="6%"><input type="number" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">সর্বমোট (ক+খ+গ+ঘ)</th>
                                                <th class=""></th>
                                                <th class="unit-rate-grand-total"></th>
                                                @for($l = 3; $l <= 8; $l++)
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
    <script src="{{ asset('theme/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $('.tex-row-add').css('cursor', 'pointer').click(function (e) {
                console.log(e);
            });

            $('.capital-row-add').css('cursor', 'pointer').click(function (e) {
                console.log(e);
            });

            // validation
            $('.project-submission-tab-steps').validate({
                ignore: 'input[type=hidden]', // ignore hidden fields
                errorClass: 'danger',
                successClass: 'success',
                highlight: function (element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                unhighlight: function (element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                errorPlacement: function (error, element) {
                    if (element.attr('type') == 'radio') {
                        error.insertBefore(element.parents().siblings('.radio-error'));
                    } else if (element[0].tagName == "SELECT") {
                        error.insertAfter(element.siblings('.select2-container'));
                    } else if (element.attr('id') == 'ckeditor') {
                        error.insertAfter(element.siblings('#cke_ckeditor'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    title: {
                        maxlength: 100
                    },
                    remarks: {
                        maxlength: 5000
                    }
                },
            });

        });


    </script>
@endpush
