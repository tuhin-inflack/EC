@extends('ims::layouts.master')

@section('title', trans('ims::inventory.add_page_title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('ims::inventory.add_page_title')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements" style="top: 5px;">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            {{ Form::open(['class' => 'form', 'novlidate']) }}
                            <h4 class="form-section"><i class="la la-building-o"></i>@lang('ims::inventory-add-form.warehouse_department_date')</h4>
                            <div class="row">
                                <div class="col-6">
                                    {!! Form::label('warehouse', __('ims::inventory-add-form.fields.warehouse.title'), ['class' => 'form-label required']) !!}
                                    {!! Form::select('warehouse_id', $warehouses, ['class' => "form-control", "required ", "placeholder" => __('ims::warehouse-create-form.fields.department.placeholder'),
        "data-validation-required_message" => trans('validation.required', ['attribute' => __('ims::warehouse-create-form.fields.name.title')])]) !!}
                                    <div class="help-block"></div>
                                </div>
                                <div class="col-6">
                                    {!! Form::label('date', __('ims::product-create-form.fields.date.title'), ['class' => 'form-label required']) !!}
                                    {{ Form::text('date', date('j F, Y'), ['id' => 'date', 'class' => 'form-control required' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Pick end date', 'data-msg-required' => Lang::get('labels.This field is required')]) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <h4 class="form-section"><i class="la la-plus-circle"></i>@lang('ims::inventory-add-form.title')</h4>
                            <div class="row">
                                <div class="col-6">
                                    {!! Form::label('name', __('ims::product-create-form.fields.name.title'), ['class' => 'form-label required']) !!}
                                    {!! Form::text('name', '', ['class' => "form-control", "required ", "placeholder" => __('ims::product-create-form.fields.name.placeholder'),
                                    "data-validation-required_message" => trans('validation.required', ['attribute' => __('ims::product-create-form.fields.name.title')])]) !!}
                                    <div class="help-block"></div>
                                </div>
                                <div class="col-6">
                                    {!! Form::label('code', __('ims::product-create-form.fields.code.title'), ['class' => 'form-label required']) !!}
                                    {!! Form::text('code', '', ['class' => "form-control", "required ", "placeholder" => __('ims::product-create-form.fields.code.placeholder'),
                                    "data-validation-required_message" => trans('validation.required', ['attribute' => __('ims::product-create-form.fields.code.title')])]) !!}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="row mt-lg-2">
                                <div class="col-6">
                                    {!! Form::label('sh_code', __('ims::product-create-form.fields.sh_code.title'), ['class' => 'form-label required']) !!}
                                    {!! Form::text('sh_code', '', ['class' => "form-control", "required ", "placeholder" => __('ims::product-create-form.fields.sh_code.placeholder'),
                                    "data-validation-required_message" => trans('validation.required', ['attribute' => __('ims::product-create-form.fields.hs_code.title')])]) !!}
                                    <div class="help-block"></div>
                                </div>
                                <div class="col-6">
                                    {!! Form::label('bar_code', __('ims::product-create-form.fields.bar_code.title'), ['class' => 'form-label required']) !!}
                                    {!! Form::text('bar_code', '', ['class' => "form-control", "required ", "placeholder" => __('ims::product-create-form.fields.bar_code.placeholder'),
                                    "data-validation-required_message" => trans('validation.required', ['attribute' => __('ims::product-create-form.fields.bar_code.title')])]) !!}
                                    <div class="help-block"></div>
                                </div>
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