@extends('hm::layouts.master')
@section('title', $type=='checkin' ? trans('hm::booking-request.check_in'): trans('hm::booking-request.title'))

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
                                    <h4 class="card-title">{{ $type=='checkin' ? trans('hm::booking-request.check_in_card_title')
                                    : trans('hm::booking-request.card_title')}}</h4>
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
                                        @include('hm::booking-request.form', ['page' => 'create'])
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
    <script>
        var form = $('.booking-request-tab-steps').show();

        // jquery steps
        $('.booking-request-tab-steps').steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: '{!! trans('labels.submit') !!}',
                next: '{!! trans('labels.next') !!}',
                previous: '{!! trans('labels.previous') !!}',
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex) {
                    return true;
                }
                if (newIndex == 1) {
                    if ($('.repeater-room-infos').has('div[data-repeater-item]').length == 0) {
                        alert('Please select room details');
                        return false;
                    }
                }
                if (newIndex == 2) {
                    if (!$('select[name=training_id]').val()) {
                        let firstName = $('input[name=first_name]').val();
                        let middleName = $('input[name=middle_name]').val();
                        let lastName = $('input[name=last_name]').val();
                        let address = $('textarea[name=address]').val();
                        let gender = $('input[type=radio][name=gender]').val();
                        let nid = $('input[name=nid]').val();

                        $('input[name="guests[0][first_name]"]').val(firstName);
                        $('input[name="guests[0][middle_name]"]').val(middleName);
                        $('input[name="guests[0][last_name]"]').val(lastName);
                        $('input[name="guests[0][nid_no]"]').val(nid);
                        $('textarea[name="guests[0][address]"]').val(address);
                        $('select[name="guests[0][gender]"]').val(gender).trigger('change');
                    }
                }
                if (newIndex == 3) {
                    // render summary
                    let roomTypes = {!! $roomTypes !!};
                    let roomInfos = $('.repeater-room-infos').repeaterVal().roomInfos;
                    let roomInfoRows = roomInfos.map(roomInfo => {
                        return `<tr>
                            <td>${roomTypes.find(roomType => roomType.id == roomInfo.room_type_id).name}</td>
                            <td>${roomInfo.quantity || 0}</td>
                            <td>${$('#start_date').val() + ' To ' + $('#end_date').val()}</td>
                            <td>${getRateType(roomInfo.rate.split('_')[0])}</td>
                            <td>${roomInfo.rate.split('_')[1]} x ${roomInfo.quantity}</td>
                            <td>${Number.parseFloat(roomInfo.rate.split('_')[1] * roomInfo.quantity).toFixed(2)}</td>
                        </tr>`;
                    });

                    $('#billing-table').find('tbody').html(roomInfoRows);

                    $('#primary-contact-name').html($('input[name=first_name]').val() + ' ' + $('input[name=middle_name]').val()
                        + ' ' + $('input[name=last_name]').val());
                    $('#primary-contact-contact').html($('#primary-contact-contact-input').val());
                    $('#start_date_display').html($('#start_date').val());
                    $('#end_date_display').html($('#end_date').val());

                    if ($('.repeater-guest-information').has('div[data-repeater-item]').length >= 1) {
                        $('.guests-info-div').show();
                        let guestInfos = $('.repeater-guest-information').repeaterVal().guests;
                        let guestInfoRows = guestInfos.map(guestInfo => {
                            let male = '{!! trans('hm::booking-request.male') !!}'
                            let female = '{!! trans('hm::booking-request.female') !!}'
                            return `<tr>
                                <td>${guestInfo.first_name} ${guestInfo.middle_name} ${guestInfo.last_name}</td>
                                <td>${guestInfo.age}</td>
                                <td>${guestInfo.gender == 'male' ? male : female}</td>
                                <td>${guestInfo.relation}</td>
                                <td>${guestInfo.address}</td>
                            </tr>`;
                        });
                        $('#guests-info-table').find('tbody').html(guestInfoRows);
                    } else {
                        //$('.guests-info-div').hide();
                    }

                    if ($('#referee-select').val()) {
                        $('.bard-referee-summary-div').show();
                        $('#bard-referee-name').html($('#referee-name').text());
                        $('#bard-referee-designation').html($('#referee-designation').text());
                        $('#bard-referee-department').html($('#referee-department').text());
                    } else {
                        $('.bard-referee-summary-div').hide();
                    }
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex) {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                $('.booking-request-tab-steps').submit();
            }
        });
    </script>
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/checkbox-radio.js') }}"></script>

    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $(this).find('#referee-select').select2()
            // datepicker
            $('#start_date').pickadate({
                min: new Date()
            });

            $('#end_date').pickadate({
                min: +1,
            });

            $('#start_date, #end_date').pickadate();

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
            for (value in data) {
                {{--@php $gender = "<script>document.write(data[value].trainee_gender)</script>"@endphp--}}
                    table += '<tr>' +
                    '<td>' + data[value].trainee_first_name + '<input type="hidden" name="guests[' + value + '][first_name]" value="' + data[value].trainee_first_name + '">' + '</td>' +
                    '<td>' + data[value].trainee_last_name + '<input type="hidden" name="guests[' + value + '][last_name]" value="' + data[value].trainee_last_name + '">' + '</td>' +
                    '<td>' + ((data[value].trainee_gender === 'male') ? "@lang('hm::booking-request.male')" : "@lang('hm::booking-request.female')") + '<input type="hidden" name="guests[' + value + '][gender]" value="' + data[value].trainee_gender.toLowerCase() + '">' + '</td>' +
                    '<td>' + data[value].mobile +
                    '<input type="hidden" name="guests[' + value + '][age]" value="1">' +
                    '<input type="hidden" name="guests[' + value + '][relation]" value="Trainee">' +
                    '<input type="hidden" name="guests[' + value + '][address]" value="Bangladesh">' +
                    '<input type="hidden" name="guests[' + value + '][middle_name]">' +
                    '<input type="hidden" name="guests[' + value + '][nid_no]">' +
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
                '<th>@lang("labels.mobile")</th>' +
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

            for (value in data) {
                tbody += '<tr>' +
                    '<td>' + data[value].trainee_first_name + ' ' + data[value].trainee_last_name + '</td>' +
                    '<td></td>' +
                    '<td>' + ((data[value].trainee_gender === 'male') ? "@lang('hm::booking-request.male')" : "@lang('hm::booking-request.female')") + '</td>' +
                    '<td>শিক্ষানবিস</td>' +
                    '<td>বাংলাদেশ</td>' +
                    '</tr>';
            }

            console.log(tbody);

            return tbody;
        }

        function getRoomTypeRates(event, roomTypeId) {
            let roomTypes = {!! $roomTypes !!};
            let selectedRoomType = roomTypes.find(roomType => roomType.id == roomTypeId);

            $(event.target).parents('.form.row').find('select.rate-select').html(`<option value=""></option>
                <option value="ge_${selectedRoomType.general_rate}">GE ${selectedRoomType.general_rate}</option>
                <option value="govt_${selectedRoomType.govt_rate}">GOVT ${selectedRoomType.govt_rate}</option>
                <option value="bard-emp_${selectedRoomType.bard_emp_rate}">BARD EMP ${selectedRoomType.bard_emp_rate}</option>
                <option value="special_${selectedRoomType.special_rate}">Special ${selectedRoomType.special_rate}</option>`);
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

        function getRefereeInformation(employeeId) {
            if (!employeeId) {
                $('#bard-referee-div').hide();
                return;
            }
            let employees = {!! $employees !!};
            let designations = {!! $designations !!};
            let departments = {!! $departments !!};

            let employee = employees.find(emp => emp.id == employeeId);
            let designation = designations.find(designation => designation.id == employee.designation_code);
            let department = departments.find(dept => dept.id == employee.department_id);

            $('#referee-name').html(employee.first_name + ' ' + employee.last_name);
            $('#referee-designation').html(designation.name);
            $('#referee-department').html(department.name);

            $('#bard-referee-div').show();
        }
    </script>
@endpush
