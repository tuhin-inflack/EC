(function () {
    var form = $('.booking-request-tab-steps').show();

    // jquery steps
    $('.booking-request-tab-steps').steps({
        headerTag: "h6",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: labels,
        onStepChanging: function (event, currentIndex, newIndex) {
            let hasNoAjaxError = true;
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
                let $guestInfoRepeater = $('.repeater-guest-information').show();
                let trainingId = $('select[name=training_id]').val();

                if (trainingId) {
                    $.ajax({
                        async: false,
                        url: traineesUrl + '' + trainingId,
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
                            hasNoAjaxError = false;
                        });
                } else {
                    $('.trainee-list').find('table').remove();
                    let firstName = $('input[name=first_name]').val();
                    let middleName = $('input[name=middle_name]').val();
                    let lastName = $('input[name=last_name]').val();
                    let address = $('textarea[name=address]').val();
                    let gender = $('input[type=radio][name=gender]').val();
                    let nid = $('input[name=nid]').val();

                    let $addMoreGuestBtn = $guestInfoRepeater.find('button[data-repeater-create]').show();
                    if (!$guestInfoRepeater.has('div[data-repeater-item]').length) {
                        $addMoreGuestBtn.click();
                    }

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
                    // $('.guests-info-div').hide();
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
            return hasNoAjaxError && form.valid();
        },
        onFinished: function (event, currentIndex) {
            $('.booking-request-tab-steps').submit();
        }
    });
})(labels, roomTypes, male, female);

function traineesListFromTraining(data) {
    var table = '';

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

    return '<table class="table table-bordered">' +
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

    return tbody;
}