<h6>{{ trans('tms::training.educational_info') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('degree', trans('tms::training.degree_name'), ['class' => 'required']) }}
                        <br/>
                        {!! Form::text('degree', old('degree'), ['class' => 'form-control required' . ($errors->has('degree') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'Bachelor of Science', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>Lang::get('labels.At most 50 characters')]) !!}

                        @if ($errors->has('degree'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('degree') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('subject', trans('tms::training.degree_subject'), ['class' => 'required']) }}
                        <br/>
                        {!! Form::text('subject', old('subject'), ['class' => 'form-control required' . ($errors->has('subject') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'Computer Science', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>Lang::get('labels.At most 50 characters')]) !!}

                        @if ($errors->has('subject'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('passing_year', trans('tms::training.passing_year'), ['class' => 'required']) }}
                        {!! Form::text('passing_year', old('passing_year'), ['class' => 'form-control required' . ($errors->has('passing_year') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'xxxx', 'data-rule-maxlength' => 4, 'data-msg-maxlength'=>Lang::get('labels.At least 4 characters')]) !!}

                        @if ($errors->has('passing_year'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('passing_year') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('institution', trans('tms::training.education_board'). ' / ' .trans('tms::training.university'), ['class' => 'required']) }}
                        <br/>
                        {!! Form::text('institution', old('institution'), ['class' => 'form-control required' . ($errors->has('institution') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'University of Dhaka', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>Lang::get('labels.At most 50 characters')]) !!}

                        @if ($errors->has('institution'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('institution') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<hr style="border-bottom: 1px solid #1E9FF2">
    <h5><u><b>@lang('tms::training.optional')</b></u></h5>--}}
</fieldset>

