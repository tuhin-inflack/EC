<h6>{{ trans('hm::booking-request.step_2') }}</h6>
<fieldset>
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.personal_information') }}</h4>
    <div class="row">
        <!-- Start of .col-md-6 -->
        <div class="col-md-6">
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="required">{{ trans('hm::booking-request.name') }}</label>
                    {!! Form::text('name', $page == 'create' ? old('name') : $requester->name, ['id' => 'primary-contact-name-input', 'class' => 'form-control required' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'John Doe', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>"At most 50 characters"]) !!}

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
                    {!! Form::text('contact', $page == 'create' ? old('contact') : $requester->contact, ['id' => 'primary-contact-contact-input', 'class' => 'form-control required' . ($errors->has('contact') ? ' is-invalid' : ''), 'placeholder' => '11 digit number', 'data-rule-minlength' => 11, 'data-msg-minlength'=>"At least 11 characters", 'data-rule-maxlength' => 11, 'data-msg-maxlength'=>"At most 11 characters"]) !!}

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
                                    <label>@lang('hm::booking-request.government')</label>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="skin skin-flat">
                                <fieldset>
                                    {!! Form::radio('organization_type', 'private', $page == 'create' ? old('organization_type') == 'private' : ($requester->organization_type == 'private')) !!}
                                    <label>{{ trans('hm::booking-request.private') }}</label>
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
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="required">{{ trans('hm::booking-request.your_photo') }}</label>
                    {!! Form::file('photo', ['class' => 'form-control required' . ($errors->has('photo') ? ' is-invalid' : ''), 'accept' => '.png, .jpg, .jpeg']) !!}

                    @if ($errors->has('photo'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('photo') }}</strong>
                        </span>
                    @endif
                </div>
                @if($page == 'edit')
                    <div class="col-md-6">
                        <img src="{{asset('/storage/app/'.$requester->photo)}}" style="width: 80px;height: 80px;margin-top: 10px;" alt="">
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>{{ trans('hm::booking-request.nid_copy') }}</label>
                    {!! Form::file('nid_doc', ['class' => 'form-control' . ($errors->has('nid_doc') ? ' is-invalid' : ''), 'accept' => '.png, .jpg, .jpeg']) !!}

                    @if ($errors->has('nid_doc'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nid_doc') }}</strong>
                        </span>
                    @endif
                </div>
                @if($page == 'edit')
                    <div class="col-md-6">
                        <img src="{{asset('/storage/app/'.$requester->nid_doc)}}" style="width: 80px;height: 80px;margin-top: 10px" alt="">
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>{{ trans('hm::booking-request.passport_copy') }}</label>
                    {!! Form::file('passport_doc', ['class' => 'form-control' . ($errors->has('passport_doc') ? ' is-invalid' : ''), 'accept' => '.png, .jpg, .jpeg']) !!}

                    @if ($errors->has('passport_doc'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('passport_doc') }}</strong>
                        </span>
                    @endif
                </div>
                @if($page == 'edit')
                    <div class="col-md-6">
                        <img src="{{asset('/storage/app/'.$requester->passport_doc)}}" style="width: 80px;height: 80px;margin-top: 10px" alt="">
                    </div>
                @endif
            </div>
        </div>
        <!-- End of .col-md-6 -->
    </div>
</fieldset>