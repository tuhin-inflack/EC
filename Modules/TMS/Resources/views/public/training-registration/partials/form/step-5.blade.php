<h6>{{ trans('tms::training.emergency_contact') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="required">@lang('tms::training.name') : </label>
                        {!! Form::text('name', old('name'), ['class' => 'form-control required' . ($errors->has('name') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'Abdul Mutaleb', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>Lang::get('labels.At most 50 characters')]) !!}

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile_no" class="required">@lang('tms::training.mobile') : </label>
                        {!! Form::text('mobile_no', old('mobile_no'), ['class' => 'form-control required' . ($errors->has('mobile_no') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => '01XXXXXXXXX', 'data-rule-maxlength' => 11, 'data-msg-maxlength'=>Lang::get('labels.At least 11 characters')]) !!}

                        @if ($errors->has('mobile_no'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mobile_no') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="relation" class="required">@lang('tms::training.relation') :</label>
                        {!! Form::text('relation', old('relation'), ['class' => 'form-control required' . ($errors->has('relation') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'Father', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>Lang::get('labels.At most 50 characters')]) !!}

                        @if ($errors->has('relation'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('relation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="contact_address" >@lang('tms::training.address') :</label>
                    {!! Form::textarea('contact_address', null, ['id' => 'shortDescription1', 'data-msg-required' => Lang::get('labels.This field is required'),'data-msg-maxlength'=>Lang::get('labels.At most 150 characters'), 'rows' => 4, 'class' => 'form-control']) !!}

                    @if ($errors->has('contact_address'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contact_address') }}</strong>
                            </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
</fieldset>

