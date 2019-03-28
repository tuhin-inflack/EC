<h6>{{ trans('hm::booking-request.step_3') }}</h6>
<fieldset>
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.guest_information') }}</h4>
    <div class="trainee-list table-responsive"></div>
    <div class="repeater-guest-information">
        @if(old('guests'))
            @foreach(old('guests') as $oldInput)
                <div data-repeater-list="guests">
                    <div data-repeater-item="" style="">
                        <div class="form">
                            <div class="row">
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">@lang('hm::booking-request.first_name')</label>
                                    <br>
                                    {!! Form::text('first_name', $oldInput['first_name'], ['class' => 'form-control required' . ($errors->has('guests.' . $loop->index . '.first_name') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => Lang::get('labels.At most 50 characters')]) !!}

                                    @if ($errors->has('guests.' . $loop->index . '.first_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('guests.' . $loop->index . '.first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label>@lang('hm::booking-request.middle_name')</label>
                                    <br>
                                    {!! Form::text('middle_name', isset($oldInput['middle_name']) ? : '', ['class' => 'form-control' . ($errors->has('guests.' . $loop->index . '.middle_name') ? ' is-invalid' : ''), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => Lang::get('labels.At most 50 characters')]) !!}

                                    @if ($errors->has('guests.' . $loop->index . '.middle_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('guests.' . $loop->index . '.middle_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">@lang('labels.last_name')</label>
                                    <br>
                                    {!! Form::text('last_name', $oldInput['last_name'], ['class' => 'form-control required' . ($errors->has('guests.' . $loop->index . '.last_name') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => Lang::get('labels.At most 50 characters')]) !!}

                                    @if ($errors->has('guests.' . $loop->index . '.last_name'))
                                        <span class="invalid-feedback"  role="alert">
                                            <strong>{{ $errors->first('guests.' . $loop->index . '.last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.age') }}</label>
                                    <br>
                                    {!! Form::number('age', isset($oldInput['age']) ? : 0, ['class' => 'form-control required' . ($errors->has('guests.' . $loop->index . '.age') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'min' => '1', 'placeholder' => 'e.g. 18']) !!}

                                    @if ($errors->has('guests.' . $loop->index . '.age'))
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $errors->first('guests.' . $loop->index . '.age') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.nationality') }}</label>
                                    <br>
                                    {!! Form::text('nationality', isset($oldInput['nationality']) ? : '', ['placeholder' => trans('hm::booking-request.nationality'), 'class' => 'form-control required' . ($errors->has('guests.' . $loop->index . '.nationality') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required')]) !!}

                                    @if ($errors->has('guests.' . $loop->index . '.nationality'))
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $errors->first('guests.' . $loop->index . '.nationality') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.gender') }}</label>
                                    <br>
                                    {!! Form::select('gender', ['' => '', 'male' => trans('hm::booking-request.male'), 'female' => trans('hm::booking-request.female')], $oldInput['gender'], ['class' => 'form-control guest-gender-select required' . ($errors->has('guests.' . $loop->index . '.gender') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required')]) !!}

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
                                    {!! Form::select('relation', ['' => '', 'myself' => trans('hm::booking-request.relation_myself'), 'family' => trans('hm::booking-request.relation_family'), 'friend' => trans('hm::booking-request.relation_friend'), 'coworker' => trans('hm::booking-request.relation_coworker') ], $oldInput['relation'], ['class' => 'form-control relation-select required' . ($errors->has('guests.' . $loop->index . '.relation') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required')]) !!}

                                    @if ($errors->has('guests.' . $loop->index . '.relation'))
                                        <span class="invalid-feedback" role="alert">
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
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('guests.' . $loop->index . '.nid_doc') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label>{{ trans('hm::booking-request.nid') }}</label>
                                    <br>
                                    {!! Form::text('nid_no', isset($oldInput['nid_no']) ? : '', ['class' => 'form-control' . ($errors->has('guests.' . $loop->index . '.nid_no') ? ' is-invalid' : ''), 'placeholder' => 'Nid number', 'data-rule-minlength' => 10, 'data-msg-minlength' => Lang::get('labels.At least 10 characters'), 'data-rule-maxlength' => 10, 'data-msg-maxlength' => Lang::get('labels.At most 10 characters')]) !!}

                                    @if ($errors->has('guests.' . $loop->index . '.nid_no'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('guests.' . $loop->index . '.nid_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-4">
                                    <label class="required">{{ trans('hm::booking-request.address') }}</label>
                                    <br>
                                    {!! Form::textarea('address', $oldInput['address'], ['class' => 'form-control required' . ($errors->has('guests.' . $loop->index . '.address') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'address', 'cols' => 30, 'rows' => 5, 'data-rule-maxlength' => 300, 'data-msg-maxlength' => Lang::get('labels.At most 300 characters')]) !!}

                                    @if ($errors->has('guests.' . $loop->index . '.address'))
                                        <span class="invalid-feedback" role="alert">
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
                                    <label class="required">@lang('hm::booking-request.first_name')</label>
                                    <br>
                                    {!! Form::text('first_name', null, ['class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => Lang::get('labels.At most 50 characters')]) !!}
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label>@lang('hm::booking-request.middle_name')</label>
                                    <br>
                                    {!! Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => Lang::get('labels.At most 50 characters')]) !!}
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">@lang('hm::booking-request.last_name')</label>
                                    <br>
                                    {!! Form::text('last_name', null, ['class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => Lang::get('labels.At most 50 characters')]) !!}
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.age') }}</label>
                                    <br>
                                    {!! Form::number('age', null, ['class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required'), 'min' => '1', 'placeholder' => 'e.g. 18']) !!}
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.nationality') }}</label>
                                    <br>
                                    {!! Form::text('nationality', null, ['placeholder' => trans('hm::booking-request.nationality'), 'class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required')]) !!}
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.gender') }}</label>
                                    <br>
                                    {!! Form::select('gender', ['' => '', 'male' => trans('hm::booking-request.male'), 'female' => trans('hm::booking-request.female')], null, ['class' => 'form-control guest-gender-select required', 'data-msg-required' => Lang::get('labels.This field is required')]) !!}
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label class="required">{{ trans('hm::booking-request.relation') }}</label>
                                    <br>
                                    {!! Form::select('relation', ['' => '', 'myself' => trans('hm::booking-request.relation_myself'), 'family' => trans('hm::booking-request.relation_family'), 'friend' => trans('hm::booking-request.relation_friend'), 'coworker' => trans('hm::booking-request.relation_coworker')], null, ['class' => 'form-control relation-select required', 'data-msg-required' => Lang::get('labels.This field is required')]) !!}
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
                                    {!! Form::text('nid_no', null, ['class' => 'form-control', 'placeholder' => 'Nid number', 'data-rule-minlength' => 10, 'data-msg-minlength' => Lang::get('labels.At least 10 characters'), 'data-rule-maxlength' => 10, 'data-msg-maxlength' => Lang::get('labels.At most 10 characters')]) !!}
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-4">
                                    <label class="required">{{ trans('hm::booking-request.address') }}</label>
                                    <br>
                                    {!! Form::textarea('address', null, ['class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'address', 'cols' => 30, 'rows' => 5, 'data-rule-maxlength' => 300, 'data-msg-maxlength' => Lang::get('labels.At most 300 characters')]) !!}
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
                @if(count($roomBooking->guestInfos))

                    <div data-repeater-list="guests">
                        @foreach($roomBooking->guestInfos as $guestInfo)

                            <div data-repeater-item="" style="">
                                <div class="form">
                                    <div class="row">
                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                            <label class="required">@lang('hm::booking-request.first_name')</label>
                                            <br>
                                            {!! Form::hidden('id', $guestInfo->id) !!}
                                            {!! Form::text('first_name', $guestInfo->first_name, ['class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => Lang::get('labels.At most 50 characters')]) !!}
                                        </div>
                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                            <label>@lang('hm::booking-request.middle_name')</label>
                                            <br>
                                            {!! Form::text('middle_name', $guestInfo->middle_name, ['class' => 'form-control', 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => Lang::get('labels.At most 50 characters')]) !!}
                                        </div>
                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                            <label class="required">@lang('hm::booking-request.last_name')</label>
                                            <br>
                                            {!! Form::text('last_name', $guestInfo->last_name, ['class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => Lang::get('labels.At most 50 characters')]) !!}
                                        </div>
                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                            <label class="required">@lang('hm::booking-request.age')</label>
                                            <br>
                                            {!! Form::number('age', $guestInfo->age, ['class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required'), 'min' => '1', 'placeholder' => 'e.g. 18']) !!}
                                        </div>
                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                            <label>@lang('hm::booking-request.nationality') <span
                                                        class="danger">*</span></label>
                                            <br>

                                            {!! Form::text('nationality',  $guestInfo->nationality, ['placeholder' => trans('hm::booking-request.nationality'), 'class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required')]) !!}
                                        </div>
                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                            <label>@lang('hm::booking-request.gender') <span
                                                        class="danger">*</span></label>
                                            <br>

                                            {!! Form::select('gender',  [null => '', 'male' => trans('hm::booking-request.male'), 'female' => trans('hm::booking-request.female')], $guestInfo->gender, ['id' => 'guest-gender-select', 'class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required')]) !!}
                                        </div>
                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                            <label>@lang('hm::booking-request.relation') <span
                                                        class="danger">*</span></label>
                                            <br>
                                            {!! Form::select('relation', ['' => '', 'myself' => trans('hm::booking-request.relation_myself'), 'family' => trans('hm::booking-request.relation_family'), 'friend' => trans('hm::booking-request.relation_friend'), 'coworker' => trans('hm::booking-request.relation_coworker')], $guestInfo->relation, ['class' => 'form-control relation-select required', 'data-msg-required' => Lang::get('labels.This field is required')]) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                            <label>@lang('hm::booking-request.nid_copy')</label>
                                            <br>
                                            {!! Form::file('nid_doc', ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                            <img src="{{asset('/storage/app/'.$guestInfo->nid_doc)}}"
                                                 style="width: 80px;height: 80px" alt="">
                                        </div>
                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                            <label>@lang('hm::booking-request.nid')</label>
                                            <br>
                                            {!! Form::text('nid_no', $guestInfo->nid_no, ['class' => 'form-control', 'placeholder' => 'Nid number', 'data-rule-minlength' => 10, 'data-msg-minlength' => Lang::get('labels.At least 10 characters'), 'data-rule-maxlength' => 10, 'data-msg-maxlength' => Lang::get('labels.At most 10 characters')]) !!}
                                        </div>
                                        <div class="form-group mb-1 col-sm-12 col-md-4">
                                            <label>@lang('hm::booking-request.address') <span
                                                        class="danger">*</span></label>
                                            <br>
                                            {!! Form::textarea('address', $guestInfo->address, ['class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'address', 'cols' => 30, 'rows' => 5, 'data-rule-maxlength' => 300, 'data-msg-maxlength' => Lang::get('labels.At most 300 characters')]) !!}
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
                        @endforeach
                    </div>
                @else
                    <div data-repeater-list="guests">
                        <div data-repeater-item="" style="">
                            <div class="form">
                                <div class="row">
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <label class="required">@lang('hm::booking-request.first_name')</label>
                                        <br>
                                        {!! Form::hidden('id', null) !!}
                                        {!! Form::text('first_name', null, ['class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => Lang::get('labels.At most 50 characters')]) !!}
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <label>@lang('hm::booking-request.middle_name')</label>
                                        <br>
                                        {!! Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => Lang::get('labels.At most 50 characters')]) !!}
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <label class="required">@lang('hm::booking-request.last_name')</label>
                                        <br>
                                        {!! Form::text('last_name', null, ['class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength' => Lang::get('labels.At most 50 characters')]) !!}
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <label class="required">{{ trans('hm::booking-request.age') }}</label>
                                        <br>
                                        {!! Form::number('age', null, ['class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required'), 'min' => '1', 'placeholder' => 'e.g. 18']) !!}
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <label class="required">{{ trans('hm::booking-request.nationality') }}</label>
                                        <br>
                                        {!! Form::text('nationality', null, ['placeholder' => trans('hm::booking-request.nationality'), 'class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required')]) !!}
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <label class="required">{{ trans('hm::booking-request.gender') }}</label>
                                        <br>
                                        {!! Form::select('gender', ['' => '', 'male' => trans('hm::booking-request.male'), 'female' => trans('hm::booking-request.female')], null, ['class' => 'form-control guest-gender-select required', 'data-msg-required' => Lang::get('labels.This field is required')]) !!}
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                        <label class="required">{{ trans('hm::booking-request.relation') }}</label>
                                        <br>
                                        {!! Form::select('relation', ['' => '', 'myself' => trans('hm::booking-request.relation_myself'), 'family' => trans('hm::booking-request.relation_family'), 'friend' => trans('hm::booking-request.relation_friend'), 'coworker' => trans('hm::booking-request.relation_coworker')], null, ['class' => 'form-control relation-select required', 'data-msg-required' => Lang::get('labels.This field is required')]) !!}
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
                                        {!! Form::textarea('address', null, ['class' => 'form-control required', 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'address', 'cols' => 30, 'rows' => 5, 'data-rule-maxlength' => 300, 'data-msg-maxlength' => 'At most 300 characters']) !!}
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
                    {!! Form::select('employee_id', $employeeOptions, $page == 'create' ? old('employee_id') : $roomBooking->employee_id, ['class' => 'form-control ', 'id' => 'referee-select' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => Lang::get('hm::booking-request.select_refferer'), 'onchange' => 'getRefereeInformation(value)']) !!}

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
