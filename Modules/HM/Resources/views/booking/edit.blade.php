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
                                    {!! Form::open(['route' =>  'bookings.update', 'class' => 'booking-request-tab-steps wizard-circle', 'enctype' => 'multipart/form-data']) !!}
                                    <!-- Step 1 -->
                                        <h6>Step 1</h6>
                                        <fieldset>
                                            <h4 class="form-section"><i class="la  la-building-o"></i>Booking
                                                Details</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="required">Start Date</label>
                                                        {{ Form::text('start_date', date('j F, Y',strtotime($roomBooking->start_date)), ['id' => 'start_date', 'class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Pick start date', 'required' => 'required','disabled' => 'disabled']) }}

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
                                                        {{ Form::text('end_date',date('j F, Y',strtotime($roomBooking->end_date)) , ['id' => 'end_date', 'class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'Pick end date']) }}

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
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="skin skin-flat">
                                                                <fieldset>
                                                                    {!! Form::radio('booking_type', 'general',($roomBooking->booking_type == 'general'), old('booking_type') == 'general') !!}
                                                                    <label>General Purpose</label>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="skin skin-flat">
                                                                <fieldset>
                                                                    {!! Form::radio('booking_type', 'training', ($roomBooking->booking_type == 'training'), old('booking_type') == 'training') !!}
                                                                    <label>Training</label>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row col-md-12">
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
                                                                        {!! Form::select('room_type_id', $roomTypes->pluck('name', 'id'), $oldInput['room_type_id'], ['class' => 'form-control room-type-select' . ($errors->has('roomInfos.' . $loop->index . '.room_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Room Type', 'onChange' => 'getRoomTypeRates(event, this.value)']) !!}

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
                                                                        {!! Form::number('quantity',$oldInput['quantity'], ['class' => 'form-control' . ($errors->has('roomInfos.' . $loop->index . '.quantity') ? ' is-invalid' : ''), 'placeholder' => 'e.g. 2', 'min' => 1]) !!}

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
                                                                        {!! Form::select('rate', ['' => ''], null, ['class' => 'form-control rate-select' . ($errors->has('roomInfos.' . $loop->index . '.rate') ? ' is-invalid' : '')]) !!}

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

                                                        @foreach($roomInfos as $roomInfo)
                                                            <div data-repeater-item="" style="">
                                                                <div class="form row">
                                                                    <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                        <label class="required">Room Type</label>
                                                                        <br>
                                                                        {!! Form::select('room_type_id', $roomTypes->pluck('name', 'id'), $roomInfo->room_type_id, ['class' => 'form-control room-type-select', 'placeholder' => 'Select Room Type', 'onChange' => 'getRoomTypeRates(event, this.value)']) !!}
                                                                    </div>
                                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                        <label for="quantity">Quantity <span
                                                                                    class="danger">*</span></label>
                                                                        <br>
                                                                        {!! Form::number('quantity', $roomInfo->quantity, ['class' => 'form-control', 'placeholder' => 'e.g. 2', 'min' => 1]) !!}
                                                                    </div>
                                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                        <label class="required">Rate</label>
                                                                        <br>
                                                                        {!! Form::select('rate', ['' => ''], $roomInfo->rate_type . '_' . $roomInfo->rate, ['class' => 'form-control rate-select']) !!}
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
                                                            {!! Form::text('name', $requester->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'John Doe']) !!}

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
                                                            {!! Form::text('contact', $requester->contact, ['class' => 'form-control' . ($errors->has('contact') ? ' is-invalid' : ''), 'placeholder' => '11 digit number']) !!}

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
                                                            {!! Form::textarea('address', $requester->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'address', 'cols' => 5, 'rows' => 6]) !!}

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
                                                                        <fieldset>
                                                                            {!! Form::radio('gender', 'male', ($requester->gender == 'male')) !!}
                                                                            <label for="gender">Male</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('gender', 'female',($requester->gender == 'female')) !!}
                                                                            <label for="gender">Female</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @if ($errors->has('gender'))
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <span class="small danger"><strong>{{ $errors->first('gender') }}</strong></span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Email</label>
                                                            {!! Form::email('email', $requester->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'john@example.com']) !!}

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
                                                            {!! Form::text('passport_no', $requester->passport_no, ['class' => 'form-control' . ($errors->has('passport_no') ? ' is-invalid' : ''), 'placeholder' => 'passport number']) !!}

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
                                                            {!! Form::text('nid', $requester->nid, ['class' => 'form-control' . ($errors->has('passport_no') ? ' is-invalid' : ''), 'placeholder' => '10 digit number']) !!}

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
                                                            {!! Form::text('organization', $requester->organization, ['class' => 'form-control' . ($errors->has('organization') ? ' is-invalid' : ''), 'placeholder' => 'Organization name']) !!}

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
                                                                            {!! Form::radio('organization_type', 'government', ($requester->organization_type == 'government'),old('organization_type') == 'government') !!}
                                                                            <label>Government</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'private', ($requester->organization_type == 'private'), old('organization_type') == 'private') !!}
                                                                            <label>Private</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'foreign', ($requester->organization_type == 'foreign'), old('organization_type') == 'foreign') !!}
                                                                            <label>Foreign</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            {!! Form::radio('organization_type', 'others', ($requester->organization_type == 'others'), old('organization_type') == 'others') !!}
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
                                                            {!! Form::text('designation', $requester->designation, ['class' => 'form-control' . ($errors->has('designation') ? ' is-invalid' : ''), 'placeholder' => 'Designation']) !!}

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
                                                            {!! Form::textarea('org_address', $requester->org_address, ['class' => 'form-control' . ($errors->has('org_address') ? ' is-invalid' : ''), 'cols' => 5, 'rows' => 3, 'placeholder' => 'Organization address']) !!}

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
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Your Photo <span
                                                                        class="danger">*</span></label>
                                                            {!! Form::file('photo', ['class' => 'form-control' . ($errors->has('photo') ? ' is-invalid' : '')]) !!}

                                                            @if ($errors->has('photo'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('photo') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">
                                                            <img src="{{ asset('public/storage/booking-requests/1545205492/requester/95YoxKXqvmf8InsbpE8q5PpzyCtdqUnYal9D9SE9.jpeg') }}" alt="photo">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>NID Copy</label>
                                                            {!! Form::file('nid_doc', ['class' => 'form-control' . ($errors->has('nid_doc') ? ' is-invalid' : '')]) !!}

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
                                                            {!! Form::file('passport_doc', ['class' => 'form-control' . ($errors->has('passport_doc') ? ' is-invalid' : '')]) !!}

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
                                                                            {!! Form::text('name', $oldInput['name'], ['class' => 'form-control' . ($errors->has('guests.' . $loop->index . '.name') ? ' is-invalid' : ''), 'placeholder' => 'John Doe']) !!}

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
                                                                            {!! Form::number('age', $oldInput['age'], ['class' => 'form-control' . ($errors->has('guests.' . $loop->index . '.age') ? ' is-invalid' : ''), 'min' => '1', 'placeholder' => 'e.g. 18']) !!}

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
                                                                            {!! Form::select('gender', ['' => '', 'male' => 'Male', 'female' => 'Female'], $oldInput['gender'], ['id' => 'guest-gender-select', 'class' => 'form-control' . ($errors->has('guests.' . $loop->index . '.gender') ? ' is-invalid' : '')]) !!}

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
                                                                            {!! Form::text('relation', $oldInput['relation'], ['class' => 'form-control' . ($errors->has('guests.' . $loop->index . '.relation') ? ' is-invalid' : ''), 'placeholder' => 'Colleague']) !!}

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
                                                                            {!! Form::text('nid_no', $oldInput['nid_no'], ['class' => 'form-control' . ($errors->has('guests.' . $loop->index . '.nid_no') ? ' is-invalid' : ''), 'placeholder' => 'Nid number']) !!}

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
                                                                            {!! Form::textarea('address', $oldInput['address'], ['class' => 'form-control' . ($errors->has('guests.' . $loop->index . '.address') ? ' is-invalid' : ''), 'placeholder' => 'address', 'cols' => 30, 'rows' => 5]) !!}

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
                                                    @foreach($guestInfos as $guestInfo)
                                                        <div data-repeater-list="guests">
                                                            <div data-repeater-item="" style="">
                                                                <div class="form">
                                                                    <div class="row">
                                                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                            <label>Name <span
                                                                                        class="danger">*</span></label>
                                                                            <br>
                                                                            {!! Form::text('name', $guestInfo->name, ['class' => 'form-control', 'placeholder' => 'John Doe']) !!}
                                                                        </div>
                                                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                            <label class="required">Age</label>
                                                                            <br>
                                                                            {!! Form::number('age', $guestInfo->age, ['class' => 'form-control', 'min' => '1', 'placeholder' => 'e.g. 18']) !!}
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
                                                    @endforeach
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
                                                        <label>Department</label>
                                                        {!! Form::select('referee_dept', $departments->pluck('name', 'id'), $departments->department, ['class' => 'form-control', 'id' => 'department-select' . ($errors->has('referee_dept') ? ' is-invalid' : ''), 'placeholder' => 'Select Department']) !!}

                                                        @if ($errors->has('referee_dept'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('referee_dept') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row col-md-12">
                                                        <label>Employee Name</label>
                                                        {!! Form::text('referee_name', $departments->name, ['class' => 'form-control' . ($errors->has('referee_name') ? ' is-invalid' : ''), 'placeholder' => 'John Doe']) !!}

                                                        @if ($errors->has('referee_name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('referee_name') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row col-md-12">
                                                        <label>Contact</label>
                                                        {!! Form::text('referee_contact', $departments->contact, ['class' => 'form-control' . ($errors->has('referee_contact') ? ' is-invalid' : ''), 'placeholder' => '11 digits']) !!}

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
                initEmpty: {{ (old('guests') || count($guestInfos)) ? 'false' : 'true' }},
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
            $('#guest-gender-select').select2({
                placeholder: 'Select Gender'
            });
            $('#department-select').select2({
                placeholder: 'Select Department'
            });

            let roomInfos = {!! $roomInfos !!};
            let roomTypes = {!! $roomTypes !!};

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