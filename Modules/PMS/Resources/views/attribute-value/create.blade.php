@extends('pms::layouts.master')
@section('title', trans('pms::attribute.attribute_value_input'))

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
                            @include('pms::attribute-value.partials.form')
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
        $(document).ready(function () {
            $('input[name=date]').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'MM yy',
                onClose: function () {
                    var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                    var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
                },
                beforeShow: function () {
                    if ((selDate = $(this).val()).length > 0) {
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
