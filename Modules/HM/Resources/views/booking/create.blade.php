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
                                    <h4 class="card-title">Booking Request Form</h4>
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
                                    {!! Form::open(['route' =>  'bookings.store', 'class' => 'booking-request-tab-steps wizard-circle', 'enctype' => 'multipart/form-data']) !!}
                                    <!-- Step 1 -->
                                        <h6>Step 1</h6>
                                        <fieldset>
                                            <h4 class="form-section"><i class="la  la-building-o"></i>Booking
                                                Details</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="required">Start Date</label>
                                                        {{ Form::text('start_date', null, ['id' => 'start_date', 'class' => 'form-control required' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Pick start date', 'required' => 'required']) }}

                                                        @if ($errors->has('start_date'))
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('start_date') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="required">End Date</label>
                                                        {{ Form::text('end_date', null, ['id' => 'end_date', 'class' => 'form-control required' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'Pick end date']) }}

                                                        @if ($errors->has('end_date'))
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('end_date') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Booking Date</label>
                                                        <input type="text" class="form-control"
                                                               value="{{ date('j F, Y') }}" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="required">Booking Type</label>
                                                    <div class="skin skin-flat">
                                                        {!! Form::radio('booking_type', 'general', old('booking_type') == 'general', ['class' => 'required']) !!}
                                                        <label>General Purpose</label>
                                                    </div>
                                                    <div class="skin skin-flat">
                                                        {!! Form::radio('booking_type', 'training', old('booking_type') == 'training', ['class' => 'required']) !!}
                                                        <label>Training</label>
                                                    </div>

                                                    <div class="row col-md-12 radio-error">
                                                        @if ($errors->has('booking_type'))
                                                            <span class="small text-danger"><strong>{{ $errors->first('booking_type') }}</strong></span>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>

                                            <h4 class="form-section"><i class="la  la-building-o"></i>Room
                                                Details</h4>
                                            @if($errors->has('roomInfos'))
                                                <span class="danger small">
                                                    <strong>{{ $errors->first('roomInfos') }}</strong>
                                                </span>
                                            @endif
                                            <div class="repeater-room-infos">
                                                <div data-repeater-list="roomInfos">
                                                    @if (old('roomInfos'))
                                                        @foreach(old('roomInfos') as $oldInput)
                                                            <div data-repeater-item="" style="">
                                                                <div class="form row">
                                                                    <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                        <label class="required">Room Type</label>
                                                                        <br>
                                                                        {!! Form::select('room_type_id', $roomTypes->pluck('name', 'id'), $oldInput['room_type_id'], ['class' => 'form-control required room-type-select' . ($errors->has('roomInfos.' . $loop->index . '.room_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Room Type', 'onChange' => 'getRoomTypeRates(event, this.value)']) !!}

                                                                        @if ($errors->has('roomInfos.' . $loop->index . '.room_type_id'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('roomInfos.' . $loop->index . '.room_type_id') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                        <label for="quantity"
                                                                               class="required">Quantity</label>
                                                                        <br>
                                                                        {!! Form::number('quantity', $oldInput['quantity'], ['class' => 'form-control required' . ($errors->has('roomInfos.' . $loop->index . '.quantity') ? ' is-invalid' : ''), 'placeholder' => 'e.g. 2', 'min' => 1]) !!}

                                                                        @if ($errors->has('roomInfos.' . $loop->index . '.quantity'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('roomInfos.' . $loop->index . '.quantity') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                        <label class="required">Rate</label>
                                                                        <br>
                                                                        <!-- TODO: generate select options based on old room type input -->
                                                                        {!! Form::select('rate', ['' => ''], null, ['class' => 'form-control required rate-select' . ($errors->has('roomInfos.' . $loop->index . '.rate') ? ' is-invalid' : '')]) !!}

                                                                        @if ($errors->has('roomInfos.' . $loop->index . '.rate'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('roomInfos.' . $loop->index . '.rate') }}</strong>
                                                                    </span>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                                        <button type="button"
                                                                                class="btn btn-outline-danger"
                                                                                data-repeater-delete=""><i
                                                                                    class="ft-x"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div data-repeater-item="" style="">
                                                            <div class="form row">
                                                                <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                    <label class="required">Room Type</label>
                                                                    <br>
                                                                    {!! Form::select('room_type_id', $roomTypes->pluck('name', 'id'), null, ['class' => 'form-control room-type-select required', 'placeholder' => 'Select Room Type', 'onChange' => 'getRoomTypeRates(event, this.value)']) !!}
                                                                    <span class="select-error"></span>
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label class="required"
                                                                           for="quantity">Quantity</label>
                                                                    <br>
                                                                    {!! Form::number('quantity', null, ['class' => 'form-control required', 'placeholder' => 'e.g. 2', 'min' => 1]) !!}
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label class="required">Rate</label>
                                                                    <br>
                                                                    {!! Form::select('rate', ['' => ''], null, ['class' => 'form-control required rate-select']) !!}
                                                                    <span class="select-error"></span>

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
                                                    @endif
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
                                                            <label class="required">Name</label>
                                                            {!! Form::text('name', null, ['class' => 'form-control required' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>"At most 50 characters"]) !!}

                                                            @if ($errors->has('name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Contact <span
                                                                        class="danger">*</span></label>
                                                            {!! Form::text('contact', null, ['class' => 'form-control required' . ($errors->has('contact') ? ' is-invalid' : ''), 'placeholder' => '11 digit number', 'data-rule-minlength' => 11, 'data-msg-minlength'=>"At least 11 characters", 'data-rule-maxlength' => 11, 'data-msg-maxlength'=>"At most 11 characters"]) !!}

                                                            @if ($errors->has('contact'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('contact') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label class="required">Address</label>
                                                            {!! Form::textarea('address', null, ['class' => 'form-control required' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'address', 'cols' => 5, 'rows' => 6, 'data-rule-maxlength' => 2, 'data-msg-maxlength'=>"At least 300 characters"]) !!}

                                                            @if ($errors->has('address'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('address') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of .col-md-6 -->
                                                <!-- Start of .col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label class="required">Gender</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        {!! Form::radio('gender', 'male', old('gender') == 'male', ['class' => 'required']) !!}
                                                                        <label for="gender">Male</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        {!! Form::radio('gender', 'female', old('gender') == 'female', ['class' => 'required']) !!}
                                                                        <label for="gender">Female</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row radio-error"></div>

                                                            @if ($errors->has('gender'))
                                                                <div class="row">
                                                                    <div class="col-md-12 radio-error">
                                                                        <span class="small danger"><strong>{{ $errors->first('gender') }}</strong></span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Email</label>
                                                            {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'john@example.com', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>"At least 50 characters"]) !!}

                                                            @if ($errors->has('email'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Passport No</label>
                                                            {!! Form::text('passport_no', null, ['class' => 'form-control' . ($errors->has('passport_no') ? ' is-invalid' : ''), 'placeholder' => 'passport number', 'data-rule-minlength' => 10, 'data-msg-minlength'=>"At least 10 characters", 'data-rule-maxlength' => 10, 'data-msg-maxlength'=>"At least 10 characters"]) !!}

                                                            @if ($errors->has('passport_no'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('passport_no') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>NID</label>
                                                            {!! Form::text('nid', null, ['class' => 'form-control' . ($errors->has('passport_no') ? ' is-invalid' : ''), 'placeholder' => '10 digit number']) !!}

                                                            @if ($errors->has('nid'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('nid') }}</strong>
                                                                </span>
                                                            @endif
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
                                                            {!! Form::text('organization', null, ['class' => 'form-control' . ($errors->has('organization') ? ' is-invalid' : ''), 'placeholder' => 'Organization name', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>"At least 50 characters"]) !!}

                                                            @if ($errors->has('organization'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('organization') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Organization Type</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'government', old('organization_type') == 'government') !!}
                                                                            <label>Government</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'private', old('organization_type') == 'private') !!}
                                                                            <label>Private</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'foreign', old('organization_type') == 'foreign') !!}
                                                                            <label>Foreign</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'others', old('organization_type') == 'others') !!}
                                                                            <label>Others</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @if ($errors->has('organization_type'))
                                                                <div class="small danger">
                                                                    <strong>{{ $errors->first('organization_type') }}</strong>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of .col-md-6 -->
                                                <!-- Start of .col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Designation</label>
                                                            {!! Form::text('designation', null, ['class' => 'form-control' . ($errors->has('designation') ? ' is-invalid' : ''), 'placeholder' => 'Designation', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>"At least 50 characters"]) !!}

                                                            @if ($errors->has('designation'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('designation') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Address</label>
                                                            {!! Form::textarea('org_address', null, ['class' => 'form-control' . ($errors->has('org_address') ? ' is-invalid' : ''), 'cols' => 5, 'rows' => 3, 'placeholder' => 'Organization address', 'data-rule-maxlength' => 300, 'data-msg-maxlength'=>"At least 300 characters"]) !!}

                                                            @if ($errors->has('org_address'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('org_address') }}</strong>
                                                            </span>
                                                            @endif
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
                                                            <label class="required">Your Photo</label>
                                                            {!! Form::file('photo', ['class' => 'form-control required' . ($errors->has('photo') ? ' is-invalid' : ''), 'accept' => 'images/*']) !!}

                                                            @if ($errors->has('photo'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('photo') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>NID Copy</label>
                                                            {!! Form::file('nid_doc', ['class' => 'form-control' . ($errors->has('nid_doc') ? ' is-invalid' : ''), 'accept' => 'images/*']) !!}

                                                            @if ($errors->has('nid_doc'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('nid_doc') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Passport Copy</label>
                                                            {!! Form::file('passport_doc', ['class' => 'form-control' . ($errors->has('passport_doc') ? ' is-invalid' : ''), 'accept' => 'images/*']) !!}

                                                            @if ($errors->has('passport_doc'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('passport_doc') }}</strong>
                                                            </span>
                                                            @endif
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
                                                @if(old('guests'))
                                                    @foreach(old('guests') as $oldInput)
                                                        <div data-repeater-list="guests">
                                                            <div data-repeater-item="" style="">
                                                                <div class="form">
                                                                    <div class="row">
                                                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                            <label>Name <span
                                                                                        class="danger">*</span></label>
                                                                            <br>
                                                                            {!! Form::text('name', $oldInput['name'], ['class' => 'form-control required' . ($errors->has('guests.' . $loop->index . '.name') ? ' is-invalid' : ''), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => 'At most 50 characters']) !!}

                                                                            @if ($errors->has('guests.' . $loop->index . '.name'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                <strong>{{ $errors->first('guests.' . $loop->index . '.name') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                            <label class="required">Age</label>
                                                                            <br>
                                                                            {!! Form::number('age', $oldInput['age'], ['class' => 'form-control required' . ($errors->has('guests.' . $loop->index . '.age') ? ' is-invalid' : ''), 'min' => '1', 'placeholder' => 'e.g. 18']) !!}

                                                                            @if ($errors->has('guests.' . $loop->index . '.age'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                <strong>{{ $errors->first('guests.' . $loop->index . '.age') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                            <label class="required">Gender</label>
                                                                            <br>
                                                                            {!! Form::select('gender', ['' => '', 'male' => 'Male', 'female' => 'Female'], $oldInput['gender'], ['class' => 'form-control guest-gender-select required' . ($errors->has('guests.' . $loop->index . '.gender') ? ' is-invalid' : '')]) !!}

                                                                            @if ($errors->has('guests.' . $loop->index . '.gender'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                <strong>{{ $errors->first('guests.' . $loop->index . '.gender') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                            <label class="required">Relation</label>
                                                                            <br>
                                                                            {!! Form::text('relation', $oldInput['relation'], ['class' => 'form-control required' . ($errors->has('guests.' . $loop->index . '.relation') ? ' is-invalid' : ''), 'placeholder' => 'Colleague', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => 'At most 50 characters']) !!}

                                                                            @if ($errors->has('guests.' . $loop->index . '.relation'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                <strong>{{ $errors->first('guests.' . $loop->index . '.relation') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                            <label>NID Copy</label>
                                                                            <br>
                                                                            {!! Form::file('nid_doc', ['class' => 'form-control' . ($errors->has('guests.' . $loop->index . '.nid_doc') ? ' is-invalid' : '')]) !!}

                                                                            @if ($errors->has('guests.' . $loop->index . '.nid_doc'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                <strong>{{ $errors->first('guests.' . $loop->index . '.nid_doc') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                            <label>NID</label>
                                                                            <br>
                                                                            {!! Form::text('nid_no', $oldInput['nid_no'], ['class' => 'form-control' . ($errors->has('guests.' . $loop->index . '.nid_no') ? ' is-invalid' : ''), 'placeholder' => 'Nid number', 'data-rule-minlength' => 10, 'data-msg-minlength' => 'At least 10 characters', 'data-rule-maxlength' => 10, 'data-msg-maxlength' => 'At most 10 characters']) !!}

                                                                            @if ($errors->has('guests.' . $loop->index . '.nid_no'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                <strong>{{ $errors->first('guests.' . $loop->index . '.nid_no') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                            <label class="required">Address</label>
                                                                            <br>
                                                                            {!! Form::textarea('address', $oldInput['address'], ['class' => 'form-control required' . ($errors->has('guests.' . $loop->index . '.address') ? ' is-invalid' : ''), 'placeholder' => 'address', 'cols' => 30, 'rows' => 5, 'data-rule-maxlength' => 300, 'data-msg-maxlength' => 'At most 300 characters']) !!}

                                                                            @if ($errors->has('guests.' . $loop->index . '.address'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                <strong>{{ $errors->first('guests.' . $loop->index . '.address') }}</strong>
                                                                            </span>
                                                                            @endif
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
                                                    @endforeach
                                                @else
                                                    <div data-repeater-list="guests">
                                                        <div data-repeater-item="" style="">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                        <label>Name <span
                                                                                    class="danger">*</span></label>
                                                                        <br>
                                                                        {!! Form::text('name', null, ['class' => 'form-control required', 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => 'At most 50 characters']) !!}
                                                                    </div>
                                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                        <label class="required">Age</label>
                                                                        <br>
                                                                        {!! Form::number('age', null, ['class' => 'form-control required', 'min' => '1', 'placeholder' => 'e.g. 18']) !!}
                                                                    </div>
                                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                        <label>Gender <span
                                                                                    class="danger">*</span></label>
                                                                        <br>
                                                                        {!! Form::select('gender', ['' => '', 'male' => 'Male', 'female' => 'Female'], null, ['class' => 'form-control guest-gender-select required']) !!}
                                                                        <span class="select-error"></span>
                                                                    </div>
                                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                        <label>Relation <span
                                                                                    class="danger">*</span></label>
                                                                        <br>
                                                                        {!! Form::text('relation', null, ['class' => 'form-control required', 'placeholder' => 'Colleague', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => 'At most 50 characters']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                        <label>NID Copy</label>
                                                                        <br>
                                                                        {!! Form::file('nid_doc', ['class' => 'form-control']) !!}
                                                                    </div>
                                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                        <label>NID</label>
                                                                        <br>
                                                                        {!! Form::text('nid_no', null, ['class' => 'form-control', 'placeholder' => 'Nid number']) !!}
                                                                    </div>
                                                                    <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                        <label>Address <span
                                                                                    class="danger">*</span></label>
                                                                        <br>
                                                                        {!! Form::textarea('address', null, ['class' => 'form-control required', 'placeholder' => 'address', 'cols' => 30, 'rows' => 5, 'data-rule-maxlength' => 300, 'data-msg-maxlength' => 'At most 300 characters']) !!}
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
                                                @endif
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
                                                        <label class="required">Department</label>
                                                        {!! Form::select('referee_dept', $departments->pluck('name', 'id'), null, ['class' => 'form-control required', 'id' => 'department-select' . ($errors->has('referee_dept') ? ' is-invalid' : ''), 'placeholder' => 'Select Department']) !!}

                                                        <span class="select-error"></span>
                                                        @if ($errors->has('referee_dept'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('referee_dept') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row col-md-12">
                                                        <label class="required">Employee Name</label>
                                                        {!! Form::text('referee_name', null, ['class' => 'form-control required' . ($errors->has('referee_name') ? ' is-invalid' : ''), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => 'At most 50 characters']) !!}

                                                        @if ($errors->has('referee_name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('referee_name') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row col-md-12">
                                                        <label class="required">Contact</label>
                                                        {!! Form::text('referee_contact', null, ['class' => 'form-control required' . ($errors->has('referee_contact') ? ' is-invalid' : ''), 'placeholder' => '11 digits', 'data-rule-minlength' => 11, 'data-msg-minlength' => 'At least 11 characters', 'data-rule-maxlength' => 11, 'data-msg-maxlength' => 'At most 11 characters']) !!}

                                                        @if ($errors->has('referee_contact'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('referee_contact') }}</strong>
                                                                </span>
                                                        @endif
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
                finish: 'Submit'
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex) {
                    return true;
                }
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

                    $('#billing-table').find('tbody').html(billingRows);
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
            // datepicker
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
                initEmpty: {{ old('guests') ? 'false' : 'true' }},
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
                    return Date.parse(value) > Date.parse($(params).val())
                }, 'Must be greater than {0}.');

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
                        error.insertBefore(element.siblings('.select-error'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    end_date: {
                        greaterThanOrEqual: '#start_date'
                    },
                    name: {
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
                        maxlength: 10
                    },
                    referee_dept: "required"
                },
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