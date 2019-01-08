(function () {
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
                $(this).find('select').select2({
                    placeholder: selectPlaceholder
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
                    placeholder: selectPlaceholder
                });

                $(this).slideDown();
            }
        });

        // select2
        $('.training-select, .room-type-select, .rate-select, .guest-gender-select, #department-select')
            .select2({
                placeholder: selectPlaceholder
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

        // Load Trainees of Training
        $('.training-select').change(function (e) {
            $.get(traineesUrl + $(this).val(), function (data) {

                $('.repeater-guest-information').remove();

                $('.trainee-list').html(traineesListFromTraining(data));
                $('#guests-info-table').find('tbody').html(traineesInfoListFromTraining(data));
            });
        });
    });
})(male, female, traineesUrl);

function traineesListFromTraining(data) {
    var table = '';

    // id, mobile, email, trainee_first_name, trainee_last_name, trainee_gender, trainingId, training_id, training_title);
    for (value in data) {
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
        '<th>@lang("labe.mobile")</th>' +
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

    let employee = employees.find(emp => emp.id == employeeId);
    let designation = designations.find(designation => designation.id == employee.designation_code);
    let department = departments.find(dept => dept.id == employee.department_id);

    $('#referee-name').html(employee.first_name + ' ' + employee.last_name);
    $('#referee-designation').html(designation.name);
    $('#referee-department').html(department.name);

    $('#bard-referee-div').show();
}