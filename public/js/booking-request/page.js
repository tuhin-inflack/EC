$(document).ready(function () {
    initializeSelectReferee();

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
    $('.training-select, .room-type-select, .rate-select, .guest-gender-select, #department-select, .relation-select')
        .select2({
            placeholder: selectPlaceholder
        });

    // validation
    jQuery.validator.addMethod("greaterThanOrEqual",
        function (value, element, params) {
            let comparingDate = params == '#start_date' ? $(params).val() : params;
            return Date.parse(value) >= Date.parse(comparingDate);
        }, 'Must be greater than or equal to {0}.');

    // jQuery.validator.addMethod("CheckRoomValidation",
    //     function (value, element, params) {
    //         if (validationStatus) {
    //             return true
    //         } else {
    //             return false;
    //         }
    //     }, customErrorMessage);


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
            // 'room-show': {
            //     CheckRoomValidation: 0
            // },
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

    $('.training-select').on('change', function () {
        let trainingId = $(this).val();
        if (trainingId) {
            let $guestInfoRepeater = $('.repeater-guest-information').show();

            $.ajax({
                url: traineesUrl + '/' + trainingId,
                method: 'get',
                dataType: 'json'
            })
                .done(function (data) {
                    // remove form repeater inputs
                    $guestInfoRepeater.find('div[data-repeater-item]').remove();
                    // hide add more button
                    $guestInfoRepeater.find('button[data-repeater-create]').hide();
                    // render trainees table
                    $('.trainee-list').html(traineesListFromTraining(data));
                    $('#guests-info-table').find('tbody').html(traineesInfoListFromTraining(data));
                })
                .fail(function () {
                    alert('Failed to get content from server');
                });
        }
    });

    try {
        if (typeof roomInfos != undefined) {
            dynamicallySelectRateForRooms();
        }
    } catch (e) {
        console.debug(e)
    }
});

function initializeSelectReferee() {
    let $selectReferee = $('#referee-select').select2();

    let bookingRequestRefereeId = $selectReferee.val();

    if (bookingRequestRefereeId) {
        $selectReferee.val(bookingRequestRefereeId).trigger('change');
    }
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

function dynamicallySelectRateForRooms() {
    $('.room-type-select').parents('.form.row').find('select.rate-select').each((index, selectElement) => {
        let roomInfo = roomInfos[index];
        let selectedRoomType = roomTypes.find(roomType => roomType.id == roomInfo.room_type_id);
        // create options of select
        $(selectElement).html(`<option value=""></option>
        <option value="ge_${selectedRoomType.general_rate}">GE ${selectedRoomType.general_rate}</option>
        <option value="govt_${selectedRoomType.govt_rate}">GOVT ${selectedRoomType.govt_rate}</option>
        <option value="bard-emp_${selectedRoomType.bard_emp_rate}">BARD EMP ${selectedRoomType.bard_emp_rate}</option>
        <option value="special_${selectedRoomType.special_rate}">Special ${selectedRoomType.special_rate}</option>`);
        // set value of select
        $(selectElement).val(`${roomInfo.rate_type}_${roomInfo.rate}`).trigger('change');
    });
}

function traineesListFromTraining(trainees) {
    let tableRows = '';

    trainees.forEach((trainee, index) => {
        tableRows += `<tr>
        <input type="hidden" name="guests[${index}][first_name]" value="${trainee.trainee_first_name}"/>
        <input type="hidden" name="guests[${index}][last_name]" value="${trainee.trainee_last_name}"/>
        <input type="hidden" name="guests[${index}][gender]" value="${trainee.trainee_gender.toLowerCase()}"/>
 
        <input type="hidden" name="guests[${index}][relation]" value="trainee"/>
        <input type="hidden" name="guests[${index}][address]" value="Bangladesh"/>
        <td>${trainee.trainee_first_name}</td>
        <td>${trainee.trainee_last_name}</td>
        <td>${trainee.trainee_gender.toLowerCase() == 'male' ? male : female}</td>
        <td>${trainee.mobile}</td>
        </tr>`;
    });

    return `<table class="table table-bordered">
    <thead>
    <tr>
    <th>${firstNameLabel}</th>
    <th>${lastNameLabel}</th>
    <th>${genderLabel}</th>
    <th>${mobileLabel}</th>
    </tr>
    </thead>
    <tbody>
    ${tableRows}
    </tbody>
    </table>`;
}

function traineesInfoListFromTraining(trainees) {
    let tbody = '';

    trainees.forEach((trainee) => {
        tbody += `<tr>
        <td>${trainee.trainee_first_name} ${trainee.trainee_last_name}</td>
    
        <td>${trainee.trainee_gender.toLowerCase() == 'male' ? male : female}</td>
        <td>শিক্ষানবিস</td>
        <td>বাংলাদেশ</td>
        </tr>`;
    });

    return tbody;
}