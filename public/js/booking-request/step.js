function setRequesterAsGuest() {
    let firstName = $('input[name=first_name]').val();
    let middleName = $('input[name=middle_name]').val();
    let lastName = $('input[name=last_name]').val();
    let address = $('textarea[name=address]').val();
    let gender = $('input[type=radio][name=gender]:checked').val();
    let nid = $('input[name=nid]').val();

    let $guestInfoRepeater = $('.repeater-guest-information').show();
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

function renderRoomInfos() {
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
}

function renderRequesterInfo() {
    $('#primary-contact-name').html($('input[name=first_name]').val() + ' ' + $('input[name=middle_name]').val()
        + ' ' + $('input[name=last_name]').val());
    $('#primary-contact-contact').html($('#primary-contact-contact-input').val());
    $('#start_date_display').html($('#start_date').val());
    $('#end_date_display').html($('#end_date').val());
}

function renderGuestInfos() {
    let guestInfos = $('.repeater-guest-information').repeaterVal().guests;
    let guestInfoRows = guestInfos.map(guestInfo => {
        return `<tr>
        <td>${guestInfo.first_name} ${guestInfo.middle_name} ${guestInfo.last_name}</td>
       
        <td>${guestInfo.gender == 'male' ? male : female}</td>
        <td>${guestInfo.relation}</td>
        <td>${guestInfo.address}</td>
        </tr>`;
    });
    $('#guests-info-table').find('tbody').html(guestInfoRows);
}

function renderReferenceInfo() {
    $('#bard-referee-name').html($('#referee-name').text());
    $('#bard-referee-designation').html($('#referee-designation').text());
    $('#bard-referee-department').html($('#referee-department').text());
}

var form = $('.booking-request-tab-steps').show();

// jquery steps
$('.booking-request-tab-steps').steps({
    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: labels,
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

            if (pageType == 'checkin') {
                // added by sumon mahmud
                // capturing data from matrix
                var selectedRoomTypeNumberFromMatrix = [];
                var allSelectedRoom = [];
                $('.ck-rooms:checked').map(function () {
                    allSelectedRoom.push($(this).data('roomType'));
                    return this.value;
                });

                // making array of same type counter value
                allSelectedRoom.forEach(function (i) {
                    selectedRoomTypeNumberFromMatrix[i] = (selectedRoomTypeNumberFromMatrix[i] || 0) + 1;
                });
                // counting the total number of room taken from input
                var totalSelectedRoomFromMatrix = 0;
                for (var i in selectedRoomTypeNumberFromMatrix) {
                    totalSelectedRoomFromMatrix += selectedRoomTypeNumberFromMatrix[i];
                }

                // Capturing data from repetitive form
                var data = $('.repeater-room-infos').repeaterVal('roomInfos');
                var roomInfoFromInput = data['roomInfos'];

                // counting the total number of room taken from input
                var totalRoomSelectedFromInput = 0;
                for (i = 0; i < roomInfoFromInput.length; i++) {
                    totalRoomSelectedFromInput += Number(roomInfoFromInput[i]['quantity']);
                }

                // Checking validation
                var validationStatus = false;
                if (totalRoomSelectedFromInput > totalSelectedRoomFromMatrix) {
                    $('#validationError').html(minimum_message + " " + totalRoomSelectedFromInput + " " + room);
                    $('#validationError').show();
                } else if (totalRoomSelectedFromInput < totalSelectedRoomFromMatrix) {
                    $('#validationError').html(maximum_message + " " + totalRoomSelectedFromInput + " " + room);
                    $('#validationError').show();
                } else {
                    for (i = 0; i < roomInfoFromInput.length; i++) {
                        var singleRoom = roomInfoFromInput[i];
                        roomTypeIdFromForm = singleRoom['room_type_id'];
                        roomQuantity = Number(singleRoom['quantity']);

                        if (roomTypeIdFromForm in selectedRoomTypeNumberFromMatrix) {
                            roomCountFromMatrix = Number(selectedRoomTypeNumberFromMatrix[roomTypeIdFromForm]);

                            if (roomQuantity < roomCountFromMatrix) {
                                if (current_lang == 'bn') {
                                    var message = maximum + " " + roomQuantity + " " + the + " " + room_type_names[roomTypeIdFromForm] + " " + room_selection;
                                } else {
                                    var message = at_most + " " + roomQuantity + " " + room_type_names[roomTypeIdFromForm] + room;
                                }
                                $('#validationError').html(message);
                                $('#validationError').show();
                                return;
                            } else if (roomQuantity > roomCountFromMatrix) {
                                if (current_lang == 'bn') {
                                    var message = minimum + " " + roomQuantity + " " + the + " " + room_type_names[roomTypeIdFromForm] + " " + room_selection;
                                } else {
                                    var message = at_least + " " + roomQuantity + " " + room_type_names[roomTypeIdFromForm] + room;
                                }
                                $('#validationError').html(message);
                                $('#validationError').show();
                                return;
                            } else {
                                validationStatus = true;
                            }
                        } else {
                            $('#validationError').html(wrong_selection + " ! ");
                            $('#validationError').show();
                            return;
                        }
                    }
                }
                if (!validationStatus) {
                    return false;
                    $('#validationError').show();
                } else {
                    $('#validationError').hide();
                }
                // end sumon mahmud
            }
        }
        if (newIndex == 2) {
            let trainingId = $('select[name=training_id]').val();

            if (!trainingId) {
                $('.trainee-list').find('table').remove();
                setRequesterAsGuest();
            }
        }
        if (newIndex == 3) {
            // render summary
            renderRoomInfos();

            renderRequesterInfo();

            let hasGuestInfo = $('.repeater-guest-information').has('div[data-repeater-item]').length >= 1;
            if (hasGuestInfo) {
                $('.guests-info-div').show();
                renderGuestInfos();
            } else {
                // $('.guests-info-div').hide();
            }

            let isReferencePresent = $('#referee-select').val();
            if (isReferencePresent) {
                $('.bard-referee-summary-div').show();
                renderReferenceInfo();
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