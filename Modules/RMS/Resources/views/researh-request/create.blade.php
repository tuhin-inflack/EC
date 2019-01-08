@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.menu_title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Form wizard with number tabs section start -->
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ trans('rms::research_proposal.research_proposal_request_creation')
                               }}</h4>
                                    <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-h font-medium-3"></i></a>
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
                                        @include('rms::researh-request.form')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with number tabs section end -->
            </div>
        </div>
    </div>
@endsection

@push('page-css')
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/checkboxes-radios.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/wizard.css') }}">

    <link rel="stylesheet" href="{{  asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css')  }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css')  }}">
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

    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            // datepicker
            $('#end_date').pickadate({
                min: new Date()
            });

            $('#end_date').pickadate();

            // form-repeater
            $('.repeater-room-infos').repeater({
                show: function () {
                    $(this).find('.select2-container').remove();
                    $(this).find('.room-type-select').select2({
                        placeholder: 'Select Room Type'
                    });
                    $(this).find('.rate-select').select2({
                        placeholder: 'Select Rate'
                    });

                    // remove error span
                    $('div:hidden[data-repeater-item]')
                        .find('input.is-invalid, select.is-invalid')
                        .each((index, element) => {
                            $(element).removeClass('is-invalid');
                        });

                    $(this).slideDown();
                }
            });
            $('.repeater-guest-information').repeater({
                show: function () {
                    // remove error span
                    $('div:hidden[data-repeater-item]')
                        .find('input.is-invalid, select.is-invalid, textarea.is-invalid')
                        .each((index, element) => {
                            $(element).removeClass('is-invalid');
                        });

                    $(this).find('.select2-container').remove();
                    $(this).find('select').select2({
                        placeholder: 'Select Gender'
                    });

                    $(this).slideDown();
                }
            });

            // select2
            $('.training-select').select2({
                placeholder: 'Select Training'
            });
            $('.room-type-select').select2({
                placeholder: 'Select Room Type'
            });
            $('.rate-select').select2({
                placeholder: 'Select Rate'
            });
            $('.guest-gender-select').select2({
                placeholder: 'Select Gender'
            });
            $('#department-select').select2({
                placeholder: 'Select Department'
            });

            // validation
            jQuery.validator.addMethod("greaterThanOrEqual",
                function (value, element, params) {
                    let comparingDate = params == '#start_date' ? $(params).val() : params;
                    return Date.parse(value) >= Date.parse(comparingDate);
                }, 'Must be greater than or equal to {0}.');

            $('.booking-request-tab-steps').validate({
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
                    } else if (element.attr('id') == 'start_date' || element.attr('id') == 'end_date') {
                        error.insertAfter(element.parents('.input-group'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    end_date: {
                        greaterThanOrEqual: '#start_date'
                    },
                    first_name: {
                        maxlength: 50
                    },
                    contact: {
                        minlength: 11,
                        maxlength: 11
                    },
                    address: {
                        maxlength: 300
                    },
                    nid: {
                        minlength: 10,
                        maxlength: 10
                    },
                    referee_dept: "required"
                },
            });

            $('input[type=radio][name=booking_type]').on('ifChecked', function (event) {
                if ($(this).val() == 'training') {
                    $('.select-training-div').show();
                } else {
                    $('select[name=training_id]').val(null).trigger('change');
                    $('.select-training-div').hide();
                }
            });

            /* Load Trainees of Training
            * ======================*/
            $('.training-select').change(function (e) {
                $.get("{{  url("/tms/get-trainees-of-training") }}/" + $(this).val(), function (data) {

                    // TODO: repeater-guest-information hide or Remove
                    $('.repeater-guest-information').remove();

                    // TODO: generate table with hidden inputs | key
                    $('.trainee-list').html(traineesListFromTraining(data));
                    $('#guests-info-table').find('tbody').html(traineesInfoListFromTraining(data));
                });
            });
        });

        function traineesListFromTraining(data) {
            var table = '';

            // id, mobile, email, trainee_first_name, trainee_last_name, trainee_gender, trainingId, training_id, training_title);
            for (value in data){

                table += '<tr>' +
                    '<td>' + data[value].trainee_first_name + '<input type="hidden" name="guests['+value+'][first_name]" value="' + data[value].trainee_first_name + '">' + '</td>' +
                    '<td>' + data[value].trainee_last_name + '<input type="hidden" name="guests['+value+'][last_name]" value="' + data[value].trainee_last_name + '">' + '</td>' +
                    '<td>' + data[value].trainee_gender + '<input type="hidden" name="guests['+value+'][gender]" value="' + data[value].trainee_gender.toLowerCase() + '">' + '</td>' +
                    '<td>' + data[value].mobile +
                    '<input type="hidden" name="guests['+value+'][age]" value="1">' +
                    '<input type="hidden" name="guests['+value+'][relation]" value="Trainee">' +
                    '<input type="hidden" name="guests['+value+'][address]" value="Bangladesh">' +
                    '<input type="hidden" name="guests['+value+'][middle_name]">' +
                    '<input type="hidden" name="guests['+value+'][nid_no]">' +
                    '</td>' +
                    '</tr>';
            }

            return '<div data-repeater-list="guests">' +
                '<table class="table table-bordered">' +
                '<thead>' +
                '<tr>' +
                '<th>@lang("hm::booking-request.first_name")</th>' +
                '<th>@lang("hm::booking-request.last_name")</th>' +
                '<th>@lang("hm::booking-request.gender")</th>' +
                '<th>Mobile</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>' +
                table +
                '</tbody>' +
                '</table>' +
                '</div>';
        }

        function traineesInfoListFromTraining(data) {
            var tbody = '';

            for (value in data){
                tbody += '<tr>' +
                    '<td>'+ data[value].trainee_first_name + ' '+ data[value].trainee_last_name + '</td>' +
                    '<td></td>' +
                    '<td>' + ((data[value].trainee_gender === 'Male') ? "@lang('hm::booking-request.male')" : "@lang('hm::booking-request.female')") + '</td>' +
                    '<td>শিক্ষানবিস</td>' +
                    '<td>বাংলাদেশ</td>' +
                    '</tr>';
            }

            console.log(tbody);

            return tbody;
        }



        function getRateType(shortCode) {
            switch (shortCode) {
                case 'ge':
                    return 'General Rate';
                case 'govt':
                    return 'Government Rate';
                case 'bard-emp':
                    return 'BARD Employee Rate';
                case 'special':
                    return 'Special Rate';
            }
        }


    </script>
@endpush
