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
                <label class="required">{{ trans('hm::booking-request.employee_name') }}</label>
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
                <label class="required">{{ trans('hm::booking-request.contact') }}</label>
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