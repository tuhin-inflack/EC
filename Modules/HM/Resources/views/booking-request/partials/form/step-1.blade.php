<h6>{{ trans('hm::booking-request.step_1') }}</h6>
<fieldset>
    <h4 class="form-section"><i
            class="la  la-building-o"></i>{{ $type=='checkin'?trans('hm::booking-request.checkin_details')
            :trans('hm::booking-request.booking_details') }}
    </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="required">{{ trans('hm::booking-request.start_date') }}</label>
                {{ Form::text('start_date', $page == 'create' ? date('j F, Y') : date('j F, Y',strtotime($roomBooking->start_date)), ['id' => 'start_date', 'class' => 'form-control required' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Pick start date', 'required' => 'required']) }}

                @if ($errors->has('start_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('start_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
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
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label class="required">{{ $type=='checkin'?trans('hm::booking-request.checkin_type')
            :trans('hm::booking-request.booking_type') }}</label>
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
                    @foreach($roomBooking->roomInfos as $roomInfo)
                        <div data-repeater-item="" style="">
                            <div class="form row">
                                <div class="form-group mb-1 col-sm-12 col-md-4">
                                    <label class="required">Room Type</label>
                                    <br>
                                    {!! Form::hidden('id', $roomInfo->id) !!}
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
                    <i class="ft-plus"></i> @lang('labels.add')
                </button>
            </div>
        </div>
    </div>
</fieldset>
