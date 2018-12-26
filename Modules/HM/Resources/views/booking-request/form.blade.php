
@if($page == 'create')
    {!! Form::open(['route' =>  'booking-requests.store', 'class' => 'booking-request-tab-steps wizard-circle', 'enctype' => 'multipart/form-data']) !!}
@else
    {!! Form::open(['route' =>  'booking-requests.update', 'class' => 'booking-request-tab-steps wizard-circle', 'enctype' => 'multipart/form-data']) !!}
    @method('PUT')
@endif
<!-- Step 1 -->
<h6>{{ trans('hm::booking-request.step_1') }}</h6>
<fieldset>
    <h4 class="form-section"><i
                class="la  la-building-o"></i>{{ trans('hm::booking-request.booking_details') }}
    </h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="required">{{ trans('hm::booking-request.start_date') }}</label>
                {{ Form::text('start_date', $page == 'create' ? old('start_date') : date('j F, Y',strtotime($roomBooking->start_date)), ['id' => 'start_date', 'class' => 'form-control required' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Pick start date', 'required' => 'required', $page == 'create' ? '' :  'disabled' => 'disabled']) }}

                @if ($errors->has('start_date'))
                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('start_date') }}</strong>
                                                        </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="required">{{ trans('hm::booking-request.end_date') }}</label>
                {{ Form::text('end_date', $page == 'create' ? old('end_date') : date('j F, Y',strtotime($roomBooking->end_date)), ['id' => 'end_date', 'class' => 'form-control required' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'Pick end date']) }}

                @if ($errors->has('end_date'))
                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('end_date') }}</strong>
                                                        </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>{{ trans('hm::booking-request.booking_date') }}</label>
                <input type="text" class="form-control"
                        value="{{ $page == 'create' ? date('j F, Y') : date('j F, Y',strtotime($roomBooking->start_date)) }}" disabled>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label class="required">{{ trans('hm::booking-request.booking_type') }}</label>
            <div class="skin skin-flat">
                {!! Form::radio('booking_type', 'general', $page == 'create' ? old('booking_type') == 'general' : ($roomBooking->booking_type == 'general'), ['class' => 'required']) !!}
                <label>{{ trans('hm::booking-request.general_purpose') }}</label>
            </div>
            <div class="skin skin-flat">
                {!! Form::radio('booking_type', 'training', $page == 'create' ? old('booking_type') == 'training' : ($roomBooking->booking_type == 'training'), ['class' => 'required']) !!}
                <label>{{ trans('hm::booking-request.training') }}</label>
            </div>

            <div class="row col-md-12 radio-error">
                @if ($errors->has('booking_type'))
                    <span class="small text-danger"><strong>{{ $errors->first('booking_type') }}</strong></span>
                @endif
            </div>

        </div>
    </div>

    <h4 class="form-section"><i
                class="la  la-building-o"></i>{{ trans('hm::booking-request.room_details') }}
    </h4>
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
                                <label class="required">{{ trans('hm::booking-request.room_type') }}</label>
                                <br>
                                {!! Form::select('room_type_id', $roomTypes->pluck('name', 'id'), $oldInput['room_type_id'], ['class' => 'form-control required room-type-select' . ($errors->has('roomInfos.' . $loop->index . '.room_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Room Type', 'onChange' => 'getRoomTypeRates(event, this.value)']) !!}

                                {!! Form::select('room_type_id', $roomTypes->pluck('name', 'id'), $oldInput['room_type_id'], ['class' => 'form-control room-type-select' . ($errors->has('roomInfos.' . $loop->index . '.room_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Room Type', 'onChange' => 'getRoomTypeRates(event, this.value)']) !!}

                                @if ($errors->has('roomInfos.' . $loop->index . '.room_type_id'))
                                    <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('roomInfos.' . $loop->index . '.room_type_id') }}</strong>
                                                                        </span>
                                @endif
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                <label for="quantity"
                                       class="required">{{ trans('hm::booking-request.quantity') }}</label>
                                <br>
                                {!! Form::number('quantity', $oldInput['quantity'], ['class' => 'form-control required' . ($errors->has('roomInfos.' . $loop->index . '.quantity') ? ' is-invalid' : ''), 'placeholder' => 'e.g. 2', 'min' => 1]) !!}

                                @if ($errors->has('roomInfos.' . $loop->index . '.quantity'))
                                    <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('roomInfos.' . $loop->index . '.quantity') }}</strong>
                                                                        </span>
                                @endif
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                <label class="required">{{ trans('hm::booking-request.rate') }}</label>
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
                @if( $page == 'create' )
                    <div data-repeater-item="" style="">
                        <div class="form row">
                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                <label class="required">{{ trans('hm::booking-request.room_type') }}</label>
                                <br>
                                {!! Form::select('room_type_id', $roomTypes->pluck('name', 'id'), null, ['class' => 'form-control room-type-select required', 'placeholder' => 'Select Room Type', 'onChange' => 'getRoomTypeRates(event, this.value)']) !!}
                                <span class="select-error"></span>
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                <label class="required"
                                       for="quantity">{{ trans('hm::booking-request.quantity') }}</label>
                                <br>
                                {!! Form::number('quantity', null, ['class' => 'form-control required', 'placeholder' => 'e.g. 2', 'min' => 1]) !!}
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                <label class="required">{{ trans('hm::booking-request.rate') }}</label>
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
<h6>{{ trans('hm::booking-request.step_2') }}</h6>
<fieldset>
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.personal_information') }}</h4>
    <div class="row">
        <!-- Start of .col-md-6 -->
        <div class="col-md-6">
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="required">{{ trans('hm::booking-request.name') }}</label>
                    {!! Form::text('name', $page == 'create' ? old('name') : $requester->name, ['class' => 'form-control required' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>"At most 50 characters"]) !!}

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="required">{{ trans('hm::booking-request.contact') }}</label>
                    {!! Form::text('contact', $page == 'create' ? old('contact') : $requester->contact, ['class' => 'form-control required' . ($errors->has('contact') ? ' is-invalid' : ''), 'placeholder' => '11 digit number', 'data-rule-minlength' => 11, 'data-msg-minlength'=>"At least 11 characters", 'data-rule-maxlength' => 11, 'data-msg-maxlength'=>"At most 11 characters"]) !!}

                    @if ($errors->has('contact'))
                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('contact') }}</strong>
                                                            </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="required">{{ trans('hm::booking-request.address') }}</label>
                    {!! Form::textarea('address', $page == 'create' ? old('address') : $requester->address, ['class' => 'form-control required' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'address', 'cols' => 5, 'rows' => 6, 'data-rule-maxlength' => 2, 'data-msg-maxlength'=>"At least 300 characters"]) !!}

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
                    <label class="required">{{ trans('hm::booking-request.gender') }}</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="skin skin-flat">
                                {!! Form::radio('gender', 'male', $page == 'create' ? old('gender') == 'male' : ($requester->gender == 'male'), ['class' => 'required']) !!}
                                <label for="gender">{{ trans('hm::booking-request.male') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="skin skin-flat">
                                {!! Form::radio('gender', 'female', $page == 'create' ? old('gender') == 'female' : ($requester->gender == 'female'), ['class' => 'required']) !!}
                                <label for="gender">{{ trans('hm::booking-request.female') }}</label>
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
                    <label>{{ trans('hm::booking-request.email') }}</label>
                    {!! Form::email('email', $page == 'create' ? old('email') : $requester->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'john@example.com', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>"At least 50 characters"]) !!}

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>{{ trans('hm::booking-request.passport_no') }}</label>
                    {!! Form::text('passport_no', $page == 'create' ? old('passport_no') : $requester->passport_no, ['class' => 'form-control' . ($errors->has('passport_no') ? ' is-invalid' : ''), 'placeholder' => 'passport number', 'data-rule-minlength' => 10, 'data-msg-minlength'=>"At least 10 characters", 'data-rule-maxlength' => 10, 'data-msg-maxlength'=>"At max 10 characters"]) !!}

                    @if ($errors->has('passport_no'))
                        <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('passport_no') }}</strong>
                                                                </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>{{ trans('hm::booking-request.nid') }}</label>
                    {!! Form::text('nid', $page == 'create' ? old('nid') : $requester->nid, ['class' => 'form-control' . ($errors->has('passport_no') ? ' is-invalid' : ''), 'placeholder' => '10 digit number']) !!}

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
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.occupation_details') }}</h4>
    <div class="row">
        <!-- Start of .col-md-6 -->
        <div class="col-md-6">
            <div class="row">
                <div class="form-group col-md-12">
                    <label>{{ trans('hm::booking-request.organization') }}</label>
                    {!! Form::text('organization', $page == 'create' ? old('organization') : $requester->organization, ['class' => 'form-control' . ($errors->has('organization') ? ' is-invalid' : ''), 'placeholder' => 'Organization name', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>"At least 50 characters"]) !!}

                    @if ($errors->has('organization'))
                        <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('organization') }}</strong>
                                                                </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>{{ trans('hm::booking-request.organization_type') }}</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="skin skin-flat">
                                <fieldset>
                                    {!! Form::radio('organization_type', 'government', $page == 'create' ? old('organization_type') == 'government' : ($requester->organization_type == 'government')) !!}
                                    <label>Government</label>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="skin skin-flat">
                                <fieldset>
                                    {!! Form::radio('organization_type', 'private', $page == 'create' ? old('organization_type') == 'private' : ($requester->organization_type == 'private')) !!}
                                    <label>{{ trans('booking-request') }}</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="skin skin-flat">
                                <fieldset>
                                    {!! Form::radio('organization_type', 'foreign', $page == 'create' ? old('organization_type') == 'foreign' : ($requester->organization_type == 'foreign')) !!}
                                    <label>{{ trans('hm::booking-request.foreign') }}</label>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="skin skin-flat">
                                <fieldset>
                                    {!! Form::radio('organization_type', 'others', $page == 'create' ? old('organization_type') == 'others' : ($requester->organization_type == 'others')) !!}
                                    <label>{{ trans('hm::booking-request.others') }}</label>
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
                    <label>{{ trans('hm::booking-request.designation') }}</label>
                    {!! Form::text('designation', $page == 'create' ? old('designation') : $requester->designation, ['class' => 'form-control' . ($errors->has('designation') ? ' is-invalid' : ''), 'placeholder' => 'Designation', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>"At least 50 characters"]) !!}

                    @if ($errors->has('designation'))
                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('designation') }}</strong>
                                                            </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>{{ trans('hm::booking-request.address') }}</label>
                    {!! Form::textarea('org_address', $page == 'create' ? old('org_address') : $requester->org_address, ['class' => 'form-control' . ($errors->has('org_address') ? ' is-invalid' : ''), 'cols' => 5, 'rows' => 3, 'placeholder' => 'Organization address', 'data-rule-maxlength' => 300, 'data-msg-maxlength'=>"At least 300 characters"]) !!}

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
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.documents') }}</h4>
    <div class="row">
        <!-- Start of .col-md-6 -->
        <div class="col-md-6">
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="required">{{ trans('hm::booking-request.your_photo') }}</label>
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
                    <label>{{ trans('hm::booking-request.nid_copy') }}</label>
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
                    <label>{{ trans('hm::booking-request.passport_copy') }}</label>
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
<h6>{{ trans('hm::booking-request.step_3') }}</h6>
<fieldset>
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.guest_information') }}</h4>
    <div class="repeater-guest-information">
        @if(old('guests'))
            @foreach(old('guests') as $oldInput)
                <div data-repeater-list="guests">
                    <div data-repeater-item="" style="">
                        <div class="form">
                            <div class="row">
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.name') }}</label>
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
                                    <label class="required">{{ trans('hm::booking-request.age') }}</label>
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
                                    <label class="required">{{ trans('hm::booking-request.gender') }}</label>
                                    <br>
                                    {!! Form::select('gender', ['' => '', 'male' => trans('hm::booking-request.male'), 'female' => trans('hm::booking-request.female')], $oldInput['gender'], ['class' => 'form-control guest-gender-select required' . ($errors->has('guests.' . $loop->index . '.gender') ? ' is-invalid' : '')]) !!}

                                    @if ($errors->has('guests.' . $loop->index . '.gender'))
                                        <span class="invalid-feedback"
                                              role="alert">
                                                                                <strong>{{ $errors->first('guests.' . $loop->index . '.gender') }}</strong>
                                                                            </span>
                                    @endif
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.relation') }}</label>
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
                                    <label>{{ trans('hm::booking-request.nid_copy') }}</label>
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
                                    <label>{{ trans('hm::booking-request.nid') }}</label>
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
                                    <label class="required">{{ trans('hm::booking-request.address') }}</label>
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
            @if($page == 'create')
                <div data-repeater-list="guests">
                    <div data-repeater-item="" style="">
                        <div class="form">
                            <div class="row">
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.name') }}</label>
                                    <br>
                                    {!! Form::text('name', null, ['class' => 'form-control required', 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => 'At most 50 characters']) !!}
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.age') }}</label>
                                    <br>
                                    {!! Form::number('age', null, ['class' => 'form-control required', 'min' => '1', 'placeholder' => 'e.g. 18']) !!}
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.gender') }}</label>
                                    <br>
                                    {!! Form::select('gender', ['' => '', 'male' => 'Male', 'female' => 'Female'], null, ['class' => 'form-control guest-gender-select required']) !!}
                                    <span class="select-error"></span>
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.relation') }}</label>
                                    <br>
                                    {!! Form::text('relation', null, ['class' => 'form-control required', 'placeholder' => 'Colleague', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => 'At most 50 characters']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label>{{ trans('hm::booking-request.nid_copy') }}</label>
                                    <br>
                                    {!! Form::file('nid_doc', ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label>{{ trans('hm::booking-request.nid') }}</label>
                                    <br>
                                    {!! Form::text('nid_no', null, ['class' => 'form-control', 'placeholder' => 'Nid number']) !!}
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-4">
                                    <label class="required">{{ trans('hm::booking-request.address') }}</label>
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

    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.bard_reference') }}</h4>
    <div class="col-md-6">
        <div class="form-group">
            <div class="row col-md-12">
                <label class="required">{{ trans('hm::booking-request.department') }}</label>
                {!! Form::select('referee_dept', $departments->pluck('name', 'id'), $page == 'create' ? old('referee_dept') : $departments->department, ['class' => 'form-control required', 'id' => 'department-select' . ($errors->has('referee_dept') ? ' is-invalid' : ''), 'placeholder' => 'Select Department']) !!}

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
                <label class="required">{{ trans('hm::booking-request.employee_name') }}</label>
                {!! Form::text('referee_name', $page == 'create' ? old('referee_dept') : $departments->name, ['class' => 'form-control required' . ($errors->has('referee_name') ? ' is-invalid' : ''), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => 'At most 50 characters']) !!}

                @if ($errors->has('referee_name'))
                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('referee_name') }}</strong>
                                                                </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="row col-md-12">
                <label class="required">{{ trans('hm::booking-request.contact') }}</label>
                {!! Form::text('referee_contact', $page == 'create' ? old('referee_dept') : $departments->contact, ['class' => 'form-control required' . ($errors->has('referee_contact') ? ' is-invalid' : ''), 'placeholder' => '11 digits', 'data-rule-minlength' => 11, 'data-msg-minlength' => 'At least 11 characters', 'data-rule-maxlength' => 11, 'data-msg-maxlength' => 'At most 11 characters']) !!}

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
<h6>{{ trans('hm::booking-request.step_4') }}</h6>
<fieldset>
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.billing_information') }}</h4>
    <div class="row">
        <div class="table-responsive">
            <table id="billing-table"
                   class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{{ trans('hm::booking-request.room_type') }}</th>
                    <th>{{ trans('hm::booking-request.quantity') }}</th>
                    <th>{{ trans('hm::booking-request.duration') }}</th>
                    <th>{{ trans('hm::booking-request.rate_type') }}</th>
                    <th>{{ trans('hm::booking-request.rate') }}</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}

