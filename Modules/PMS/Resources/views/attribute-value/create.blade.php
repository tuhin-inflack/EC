@extends('pms::layouts.master')
@section('title', trans('pms::attribute.create_attribute'))

@section('content')
    <div class="container">
        <div class="row match-height">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">@lang('pms::attribute.attribute_value_input')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                            {!! Form::open(['route' =>  ['attribute-values.store', $attribute->id], 'class' => 'form']) !!}
                            <div class="form-body">
                                <h4 class="form-section"><i
                                            class="ft-at-sign"></i>@lang('pms::attribute.attribute_value_input_form')
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="attribute"
                                                   class="form-label required">@lang('pms::attribute.attribute_name')</label>
                                            {!! Form::text('attribute', $attribute->name, ['class' => 'form-control' . ($errors->has('attribute_id') ? ' is-invalid' : ''), 'disabled']) !!}
                                            {!! Form::hidden('attribute_id', $attribute->id) !!}

                                            @if ($errors->has('attribute_id'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('attribute_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date"
                                                   class="form-label required">@lang('labels.date')</label>
                                            {!! Form::text('date', null, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'required']) !!}

                                            @if ($errors->has('date'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="value"
                                                   class="form-label required">@lang('pms::attribute.planned_value')
                                                <i>( {{ $attribute->unit }} )</i></label>
                                            {!! Form::number('planned_value', null, ['class' => 'form-control' . ($errors->has('planned_value') ? ' is-invalid' : ''), 'required', 'min' => 0]) !!}

                                            @if ($errors->has('planned_value'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('planned_value') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="value"
                                                   class="form-label required">@lang('pms::attribute.achieved_value')
                                                <i>( {{ $attribute->unit }} )</i></label>
                                            {!! Form::number('achieved_value', null, ['class' => 'form-control' . ($errors->has('achieved_value') ? ' is-invalid' : ''), 'required', 'min' => 0]) !!}

                                            @if ($errors->has('achieved_value'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('achieved_value') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> {{trans('labels.save')}}
                                    </button>
                                    <a class="btn btn-warning mr-1" role="button"
                                       href="{{ route('attributes.index') }}">
                                        <i class="ft-x"></i> {{trans('labels.cancel')}}
                                    </a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-css')
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/ui/jquery-ui.min.css') }}">
    <style>
        .ui-datepicker-calendar {
            display: none;
        }
    </style>
@endpush

@push('page-js')
    <script src="{{ asset('theme/js/core/libraries/jquery_ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/ui/jquery-ui/date-pickers.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('input[name=date]').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'MM yy',
                onClose: function() {
                    var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                    var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
                },
                beforeShow: function() {
                    if ((selDate = $(this).val()).length > 0)
                    {
                        iYear = selDate.substring(selDate.length - 4, selDate.length);
                        iMonth = jQuery.inArray(selDate.substring(0, selDate.length - 5), $(this).datepicker('option', 'monthNames'));
                        $(this).datepicker('option', 'defaultDate', new Date(iYear, iMonth, 1));
                        $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
                    }
                }
            });
        });
    </script>
@endpush
