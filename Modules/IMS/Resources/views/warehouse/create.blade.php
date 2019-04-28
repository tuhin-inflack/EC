@extends('ims::layouts.master')

@section('title', trans('ims::warehouse.create_page_title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('ims::warehouse.create_page_title')</h4>
                        <a class="heading-elements-toggle" href=""><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements" style="top: 5px;">
                            <ul class="list-inline mb-1">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                        <div class="heading-elements mt-2" style="margin-right: 10px;">
                            <a href="{{ route('inventory.warehouse.list') }}" class="btn btn-primary btn-sm">
                                <i class="ft-list white">@lang('ims::warehouse-create-form.links.list')</i>
                            </a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            {{ Form::open(['route' =>  'inventory.warehouse.store', 'class' => 'warehouse-tab-steps wizard-circle']) }}
                            <h4 class="form-section"><i class="la la-building"></i> @lang('ims::warehouse-create-form.title')</h4>
                            <div class="row">
                                <div class="col-6">
                                    {!! Form::label('name', __('ims::warehouse-create-form.fields.name.title'), ['class' => 'form-label required']) !!}
                                    {!! Form::text('name', '', ['class' => "form-control", "required ", "placeholder" => __('ims::warehouse-create-form.fields.name.placeholder'), 'data-rule-maxlength' => 100, 'data-msg-maxlength'=>Lang::get('labels.At most 100 characters'),
                                    'data-msg-required' => Lang::get('labels.This field is required')]) !!}
                                    <div class="help-block"></div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-6">
                                    {!! Form::label('date', __('ims::product-create-form.fields.date.title'), ['class' => 'form-label required']) !!}
                                    {{ Form::text('date', date('Y-m-d'), ['id' => 'date', 'class' => 'form-control required' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Pick end date', 'data-msg-required' => Lang::get('labels.This field is required')]) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="row mt-lg-2">
                                <div class="col-6">
                                    {!! Form::label('department', __('ims::warehouse-create-form.fields.department.title'), ['class' => 'form-label required']) !!}
                                    {!! Form::select('department_id', $departments, ['class' => "form-control", "required ", "placeholder" => __('ims::warehouse-create-form.fields.department.placeholder'),
                                    "data-validation-required_message" => trans('validation.required', ['attribute' => __('ims::warehouse-create-form.fields.name.title')])]) !!}
                                    <div class="help-block"></div>
                                </div>
                                {{--<div class="col-2 float-left" style="margin-left: -30px; margin-top: 22px;">
                                    <a href="#" title="{{ __('ims::warehouse-create-form.link_icons.title') }}" class="fonticon-container">
                                        <div class="fonticon-wrap">
                                            <i class="ft-plus-circle"></i>
                                        </div>
                                    </a>
                                </div>--}}
                            </div>
                            <div class="form-actions mb-lg-3">
                                <a class="btn btn-warning pull-right" role="button" href="{{ route('inventory.warehouse.list') }}" style="margin-left: 2px;">
                                    <i class="la la-times"></i> {{trans('labels.cancel')}}
                                </a>
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="la la-check-square-o"></i> {{trans('labels.save')}}
                                </button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('page-css')
    <link rel="stylesheet" href="{{  asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css')  }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/assets/css/style.css') }}">
@endpush

@push('page-js')
    <script src="{{ asset('theme/js/scripts/pickers/dateTime/pick-a-datetime.js')  }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.js')  }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.date.js') }}"></script>

    <script src="{{ asset('theme/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/wizard-steps.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/checkbox-radio.js') }}"></script>
    <script>
        $(document).ready(function () {
            // datepicker
            $('#date').pickadate({
                min: new Date()
            });

            $('#date').pickadate();


            // validation
            $('.warehouse-tab-steps').validate({
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('select').select2({
                placeholder: {
                    id: '',
                    text: '{{ __('ims::warehouse-create-form.fields.department.placeholder') }}'
                }
            });
        });
    </script>
@endpush

