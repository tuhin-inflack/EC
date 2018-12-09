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
                                                        <label for="" class="required">Start Date</label>
                                                        {{ Form::text('start_date', null, ['id' => 'start_date', 'class' => 'form-control', 'placeholder' => 'Pick start date', 'required' => 'required']) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="" class="required">End Date</label>
                                                        {{ Form::text('end_date', null, ['id' => 'end_date', 'class' => 'form-control', 'placeholder' => 'Pick end date']) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Booking Date</label>
                                                        <input type="text" class="form-control"
                                                               value="{{ date('d-m-Y') }}" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Booking Type</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="skin skin-flat">
                                                                <fieldset>
                                                                    {!! Form::radio('booking_type', 'general') !!}
                                                                    <label for="">General Purpose</label>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="skin skin-flat">
                                                                <fieldset>
                                                                    {!! Form::radio('booking_type', 'training') !!}
                                                                    <label for="">Training</label>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="form-section"><i class="la  la-building-o"></i>Room
                                                Details</h4>
                                            <div class="repeater-room-types">
                                                <div data-repeater-list="rooms">
                                                    <div data-repeater-item="" style="">
                                                        <div class="form row">
                                                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                <label>Room Type <span class="danger">*</span></label>
                                                                <br>
                                                                {!! Form::select('room_type', $roomTypes->map(function ($roomType) { return [$roomType->id => $roomType->name]; }), null, ['class' => 'form-control room-type-select', 'placeholder' => 'Select Room Type', 'onChange' => 'getRoomTypeRates(this.value)']) !!}
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                <label>Quantity <span class="danger">*</span></label>
                                                                <br>
                                                                {!! Form::number('number', null, ['class' => 'form-control', 'placeholder' => 'e.g. 2', 'min' => 1]) !!}
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
                                                            <label for="">Name <span class="danger">*</span></label>
                                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'John Doe']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="">Email</label>
                                                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'john@example.com']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="">NID</label>
                                                            {!! Form::text('nid', null, ['class' => 'form-control', 'placeholder' => '10 digit number']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of .col-md-6 -->
                                                <!-- Start of .col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="">Gender <span
                                                                        class="danger">*</span></label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-square">
                                                                        <fieldset>
                                                                            {!! Form::radio('gender', 'male') !!}
                                                                            <label for="input-radio-11"
                                                                                   class="">Male</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-square">
                                                                        <fieldset>
                                                                            {!! Form::radio('gender', 'female') !!}
                                                                            <label for="input-radio-11"
                                                                                   class="">Female</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="">Contact <span
                                                                        class="danger">*</span></label>
                                                            {!! Form::text('contact', null, ['class' => 'form-control', 'placeholder' => '11 digit number']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="">Passport No</label>
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
                                                            <label for="">Organization</label>
                                                            {!! Form::text('organization', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="">Organization Type</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'government') !!}
                                                                            <label for="">Government</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'private') !!}
                                                                            <label for="">Private</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'foreign') !!}
                                                                            <label for="">Foreign</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'others') !!}
                                                                            <label for="">Others</label>
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
                                                            <label for="">Designation</label>
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
                                                            <label for="">Your Photo <span
                                                                        class="danger">*</span></label>
                                                            {!! Form::file('photo', ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="">NID Copy</label>
                                                            {!! Form::file('nid_doc', ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="">Passport Copy</label>
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
                                                                    {!! Form::text('relationship', null, ['class' => 'form-control', 'placeholder' => 'Colleague']) !!}
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
                                                        <label for="">Department</label>
                                                        {!! Form::select('referee_dept', ['' => '', '1' => 'Dept 1', '2' => 'Dept 2'], null, ['class' => 'form-control', 'id' => 'department-select']) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row col-md-12">
                                                        <label for="">Employee Name</label>
                                                        {!! Form::text('referee_name', null, ['class' => 'form-control', 'placeholder' => 'John Doe']) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row col-md-12">
                                                        <label for="">Contact</label>
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
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Room Type</th>
                                                            <th>Quantity</th>
                                                            <th>Duration</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>AC room</td>
                                                            <td>2</td>
                                                            <td>{{ \Carbon\Carbon::today()->addDays(7)->format('d-m-Y') . ' to ' . \Carbon\Carbon::today()->addDays(14)->format('d-m-Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Non ac room</td>
                                                            <td>3</td>
                                                            <td>{{ \Carbon\Carbon::today()->addDays(7)->format('d-m-Y') . ' to ' . \Carbon\Carbon::today()->addDays(14)->format('d-m-Y') }}</td>
                                                        </tr>
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
            $('.repeater-room-types').repeater({
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

        function getRoomTypeRates(id) {
            console.log(id);
        }
    </script>
@endpush