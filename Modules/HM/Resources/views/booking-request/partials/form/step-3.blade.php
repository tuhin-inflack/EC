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
                                    <label class="required">@lang('labels.name')</label>
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
                                    <label class="required">@lang('labels.name')</label>
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
                                        <label class="required">@lang('labels.name')</label>
                                        <br>
                                        {!! Form::text('name', $guestInfo->name, ['class' => 'form-control', 'placeholder' => 'John Doe']) !!}
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <label class="required">@lang('labels.name')</label>
                                        <br>
                                        {!! Form::number('age', $guestInfo->age, ['class' => 'form-control', 'min' => '1', 'placeholder' => 'e.g. 18']) !!}
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <label>@lang('hm::booking-request.gender') <span
                                                    class="danger">*</span></label>
                                        <br>
                                        {!! Form::select('gender', ['' => '', 'male' => 'Male', 'female' => 'Female'], $guestInfo->gender, ['id' => 'guest-gender-select', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <label>@lang('hm::booking-request.relation') <span
                                                    class="danger">*</span></label>
                                        <br>
                                        {!! Form::text('relation', $guestInfo->relation, ['class' => 'form-control', 'placeholder' => 'Colleague']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <label>@lang('hm::booking-request.nid_copy')</label>
                                        <br>
                                        {!! Form::file('nid_doc', ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <img src="{{asset('/storage/app/'.$guestInfo->nid_doc)}}" style="width: 80px;height: 80px" alt="">
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <label>@lang('hm::booking-request.nid')</label>
                                        <br>
                                        {!! Form::text('nid_no', $guestInfo->nid_no, ['class' => 'form-control', 'placeholder' => 'Nid number']) !!}
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-4">
                                        <label>@lang('hm::booking-request.address') <span
                                                    class="danger">*</span></label>
                                        <br>
                                        {!! Form::textarea('address', $guestInfo->address, ['class' => 'form-control', 'placeholder' => 'address', 'cols' => 30, 'rows' => 5]) !!}
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
                    <i class="ft-plus"></i> @lang('labels.add')
                </button>
            </div>
        </div>
    </div>

    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.bard_reference') }}</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="row col-md-12">
                    <label class="">{{ trans('hm::booking-request.department') }}</label>
                    {!! Form::select('employee_id', $employeeOptions, $page == 'create' ? old('employee_id') : $roomBooking->employee_id, ['class' => 'form-control', 'id' => 'referee-select' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Referee', 'onchange' => 'getRefereeInformation(value)']) !!}

                    @if ($errors->has('employee_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('employee_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div id="bard-referee-div" class="col-md-6 row" style="display: none">
            <div class="col-md-12">
                <strong>@lang('labels.name'): </strong> <span id="referee-name"></span>
            </div>
            <div class="col-md-12">
                <strong>@lang('hm::booking-request.designation'): </strong> <span id="referee-designation"></span>
            </div>
            <div class="col-md-12">
                <strong>@lang('hm::booking-request.department'): </strong> <span id="referee-department"></span>
            </div>
        </div>
    </div>
</fieldset>