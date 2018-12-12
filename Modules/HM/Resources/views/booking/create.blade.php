@extends('hm::layouts.master')
@section('title', 'Booking create')

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
                                    <h4 class="card-title">Form wizard with number tabs</h4>
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
                                    {!! Form::open(['route' =>  'bookings.store', 'class' => 'booking-request-tab-steps wizard-circle']) !!}
                                    <!-- Step 1 -->
                                        <h6>Step 1</h6>
                                        <fieldset>
                                            <h4 class="form-section"><i class="la  la-building-o"></i>Booking
                                                Details</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="required">Start Date</label>
                                                        {{ Form::text('start_date', null, ['id' => 'start_date', 'class' => 'form-control', 'placeholder' => 'Pick start date', 'required' => 'required']) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="required">End Date</label>
                                                        {{ Form::text('end_date', null, ['id' => 'end_date', 'class' => 'form-control', 'placeholder' => 'Pick end date']) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Booking Date</label>
                                                        <input type="text" class="form-control"
                                                               value="{{ date('d-m-Y') }}" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Booking Type</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="skin skin-flat">
                                                                <fieldset>
                                                                    {!! Form::radio('booking_type', 'general') !!}
                                                                    <label>General Purpose</label>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="skin skin-flat">
                                                                <fieldset>
                                                                    {!! Form::radio('booking_type', 'training') !!}
                                                                    <label>Training</label>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="form-section"><i class="la  la-building-o"></i>Room
                                                Details</h4>
                                            <div class="repeater-room-infos">
                                                <div data-repeater-list="roomInfos">
                                                    <div data-repeater-item="" style="">
                                                        <div class="form row">
                                                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                <label>Room Type <span class="danger">*</span></label>
                                                                <br>
                                                                {!! Form::select('room_type_id', $roomTypes->pluck('name', 'id'), null, ['class' => 'form-control room-type-select', 'placeholder' => 'Select Room Type', 'onChange' => 'getRoomTypeRates(event, this.value)']) !!}
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                <label for="quantity">Quantity <span class="danger">*</span></label>
                                                                <br>
                                                                {!! Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => 'e.g. 2', 'min' => 1]) !!}
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                <label>Rate <span class="danger">*</span></label>
                                                                <br>
                                                                {!! Form::select('rate', [], null, ['class' => 'form-control rate-select']) !!}
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                                <button type="button" class="btn btn-outline-danger"
                                                                        data-repeater-delete=""><i
                                                                            class="ft-x"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="form-group overflow-auto">
                                                    <div class="col-12">
                                                        <button type="button" data-repeater-create=""
                                                                class="pull-right btn btn-sm btn-outline-primary">
                                                            <i class="ft-plus"></i> Add
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Step 2 -->
                                        <h6>Step 2</h6>
                                        <fieldset>
                                            <h4 class="form-section"><i class="la  la-building-o"></i>Personal
                                                Information</h4>
                                            <div class="row">
                                                <!-- Start of .col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Name <span class="danger">*</span></label>
                                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'John Doe']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Email</label>
                                                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'john@example.com']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>NID</label>
                                                            {!! Form::text('nid', null, ['class' => 'form-control', 'placeholder' => '10 digit number']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of .col-md-6 -->
                                                <!-- Start of .col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Gender <span
                                                                        class="danger">*</span></label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-square">
                                                                        <fieldset>
                                                                            {!! Form::radio('gender', 'male') !!}
                                                                            <label class="">Male</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-square">
                                                                        <fieldset>
                                                                            {!! Form::radio('gender', 'female') !!}
                                                                            <label class="">Female</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Contact <span
                                                                        class="danger">*</span></label>
                                                            {!! Form::text('contact', null, ['class' => 'form-control', 'placeholder' => '11 digit number']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Passport No</label>
                                                            {!! Form::text('passport_no', null, ['class' => 'form-control', 'placeholder' => 'passport number']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of .col-md-6 -->
                                            </div>
                                            <h4 class="form-section"><i class="la  la-building-o"></i>Occupation
                                                Detials</h4>
                                            <div class="row">
                                                <!-- Start of .col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Organization</label>
                                                            {!! Form::text('organization', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Organization Type</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'government') !!}
                                                                            <label>Government</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'private') !!}
                                                                            <label>Private</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'foreign') !!}
                                                                            <label>Foreign</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'others') !!}
                                                                            <label>Others</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of .col-md-6 -->
                                                <!-- Start of .col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Designation</label>
                                                            {!! Form::text('designation', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of .col-md-6 -->
                                            </div>
                                            <h4 class="form-section"><i class="la  la-building-o"></i>Documents</h4>
                                            <div class="row">
                                                <!-- Start of .col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Your Photo <span
                                                                        class="danger">*</span></label>
                                                            {!! Form::file('photo', ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>NID Copy</label>
                                                            {!! Form::file('nid_doc', ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Passport Copy</label>
                                                            {!! Form::file('passport_doc', ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of .col-md-6 -->
                                            </div>
                                        </fieldset>
                                        <!-- Step 3 -->
                                        <h6>Step 3</h6>
                                        <fieldset>
                                            <h4 class="form-section"><i class="la  la-building-o"></i>Guest
                                                Information</h4>
                                            <div class="repeater-guest-information">
                                                <div data-repeater-list="guests">
                                                    <div data-repeater-item="" style="">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label>Name <span
                                                                                class="danger">*</span></label>
                                                                    <br>
                                                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'John Doe']) !!}
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label>Age <span class="danger">*</span></label>
                                                                    <br>
                                                                    {!! Form::number('age', null, ['class' => 'form-control', 'min' => '1', 'placeholder' => 'e.g. 18']) !!}
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label>Gender <span
                                                                                class="danger">*</span></label>
                                                                    <br>
                                                                    {!! Form::select('gender', ['' => '', 'male' => 'Male', 'female' => 'Female'], null, ['id' => 'guest-gender-select', 'class' => 'form-control']) !!}
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label>Relation <span
                                                                                class="danger">*</span></label>
                                                                    <br>
                                                                    {!! Form::text('relation', null, ['class' => 'form-control', 'placeholder' => 'Colleague']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label>NID Copy <span
                                                                                class="danger">*</span></label>
                                                                    <br>
                                                                    {!! Form::file('nid_doc', ['class' => 'form-control']) !!}
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label>NID <span class="danger">*</span></label>
                                                                    <br>
                                                                    {!! Form::text('nid_no', null, ['class' => 'form-control', 'placeholder' => 'Nid number']) !!}
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                    <label>Address <span
                                                                                class="danger">*</span></label>
                                                                    <br>
                                                                    {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'address', 'cols' => 30, 'rows' => 5]) !!}
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                                    <button type="button"
                                                                            class="btn btn-outline-danger"
                                                                            data-repeater-delete=""><i
                                                                                class="ft-x"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="form-group overflow-auto">
                                                    <div class="col-12">
                                                        <button type="button" data-repeater-create=""
                                                                class="pull-right btn btn-sm btn-outline-primary">
                                                            <i class="ft-plus"></i> Add
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="form-section"><i class="la  la-building-o"></i>BARD
                                                Reference</h4>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="row col-md-12">
                                                        <label>Department</label>
                                                        {!! Form::select('referee_dept', $departments->pluck('name', 'id'), null, ['class' => 'form-control', 'id' => 'department-select', 'placeholder' => 'Select Department']) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row col-md-12">
                                                        <label>Employee Name</label>
                                                        {!! Form::text('referee_name', null, ['class' => 'form-control', 'placeholder' => 'John Doe']) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row col-md-12">
                                                        <label>Contact</label>
                                                        {!! Form::text('referee_contact', null, ['class' => 'form-control', 'placeholder' => '11 digits']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Step 4 -->
                                        <h6>Step 4</h6>
                                        <fieldset>
                                            <h4 class="form-section"><i class="la  la-building-o"></i>Billing
                                                Information</h4>
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table id="billing-table"
                                                           class="table table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Room Type</th>
                                                            <th>Quantity</th>
                                                            <th>Duration</th>
                                                            <th>Rate Type</th>
                                                            <th>Rate</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                        {!! Form::close() !!}
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

    <link rel="stylesheet" type="text/css" href="{{  asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
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
        // jquery steps
        $('.booking-request-tab-steps').steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: 'Submit'
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                if (newIndex == 3) {
                    let roomTypes = {!! $roomTypes !!};
                    let roomInfos = $('.repeater-room-infos').repeaterVal().roomInfos;

                    let billingRows = roomInfos.map(roomInfo => {
                        return `<tr>
                            <td>${roomTypes.find(roomType => roomType.id == roomInfo.room_type_id).name}</td>
                            <td>${roomInfo.quantity || 0}</td>
                            <td>${$('#start_date').val() + ' To ' + $('#end_date').val()}</td>
                            <td>${getRateType(roomInfo.rate.split('_')[0])}</td>
                            <td>${roomInfo.rate.split('_')[1]} x ${roomInfo.quantity}</td>
                        </tr>`;
                    });

                    $('#billing-table').append(billingRows);
                }
                return true;
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
            // datepicker
            $('#start_date, #end_date').pickadate();
            // form-repeater
            $('.repeater-guest-information').repeater({
                show: function () {
                    $(this).find('.select2-container').remove();
                    $(this).find('select').select2({
                        placeholder: 'Select Gender'
                    });
                    $(this).slideDown();
                }
            });
            $('.repeater-room-infos').repeater({
                show: function () {
                    $(this).find('.select2-container').remove();
                    $(this).find('.room-type-select').select2({
                        placeholder: 'Select Room Type'
                    });
                    $(this).find('.rate-select').select2({
                        placeholder: 'Select Rate'
                    });
                    $(this).slideDown();
                }
            });
            // select2
            $('.room-type-select').select2({
                placeholder: 'Select Room Type'
            });
            $('.rate-select').select2({
                placeholder: 'Select Rate'
            });
            $('#guest-gender-select').select2({
                placeholder: 'Select Gender'
            });
            $('#department-select').select2({
                placeholder: 'Select Department'
            });
        });

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
    </script>
@endpush