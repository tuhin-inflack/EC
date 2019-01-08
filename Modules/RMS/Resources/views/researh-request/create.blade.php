@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.research_proposal_request_creation'))

@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css')  }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css')  }}">
@endpush

@section('content')
    @include('rms::researh-request.form')
@endsection

@push('page-js')
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.js')  }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/pickers/dateTime/pick-a-datetime.js')  }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            // datepicker
            $('#end_date').pickadate({
                min: new Date()
            });

            $('#end_date').pickadate();

            $(".research-request-form").validate({
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
                        error.insertBefore(element.siblings('.select-error'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    "to[]": "required"
                },
                messages: {
                    "to[]": "Please select category",
                }
            });

            $('.research-request-form').on('submit', function (event) {
                event.preventDefault();
                console.log(event)

            })
        });
    </script>
@endpush

