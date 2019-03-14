<h6>{{ trans('tms::training.general_info') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstName1" class="required">@lang('tms::training.fathers_name') : </label>
                        {!! Form::text('fathers_name', old('fathers_name'), ['class' => 'form-control required' . ($errors->has('fathers_name') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>Lang::get('labels.At most 50 characters')]) !!}

                        @if ($errors->has('fathers_name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fathers_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastName1" class="required">@lang('tms::training.mothers_name') : </label>
                        {!! Form::text('mothers_name', old('mothers_name'), ['class' => 'form-control required' . ($errors->has('fathers_name') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>Lang::get('labels.At most 50 characters')]) !!}

                        @if ($errors->has('mothers_name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mothers_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.birth_place') :</label>
                        {!! Form::text('birth_place', old('birth_place'), ['class' => 'form-control required' . ($errors->has('fathers_name') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>Lang::get('labels.At most 50 characters')]) !!}

                        @if ($errors->has('birth_place'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('birth_place') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="location1" class="required">@lang('tms::training.marital_status') :</label>
                            <div class="skin skin-flat">
                                {!! Form::radio('marital_status', 'married', old('marital_status'), ['class' => 'required', 'data-msg-required' => trans('labels.This field is required')]) !!}
                                <label>@lang('tms::training.married')</label>
                            </div>
                            <div class="skin skin-flat">
                                {!! Form::radio('marital_status', 'unmarried', old('marital_status'), ['class' => 'required', 'data-msg-required' => trans('labels.This field is required')]) !!}
                                <label>@lang('tms::training.unmarried')</label>
                            </div>
                            <div class="row col-md-12 radio-error">
                                @if ($errors->has('marital_status'))
                                    <span class="small text-danger"><strong>{{ $errors->first('marital_status') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="shortDescription1" class="required">@lang('tms::training.present_address') :</label>
                        {!! Form::textarea('present_address', null, ['id' => 'shortDescription1', 'data-msg-required' => Lang::get('labels.This field is required'), 'rows' => 4, 'class' => 'form-control required']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>

