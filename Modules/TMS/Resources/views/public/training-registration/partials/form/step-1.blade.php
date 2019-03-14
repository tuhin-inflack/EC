<h6>{{ trans('tms::training.personal_info') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">@lang('tms::training.full_name') : (@lang('tms::training.in_bangla')
                            )</label>
                        {!! Form::text('bangla_name', old('bangla_name'), ['class' => 'form-control required' . ($errors->has('bangla_name') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>Lang::get('labels.At most 50 characters')]) !!}

                        @if ($errors->has('bangla_name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bangla_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">@lang('tms::training.full_name') : (@lang('tms::training.in_english')
                            )</label>
                        {!! Form::text('english_name', old('english_name'), ['class' => 'form-control required' . ($errors->has('english_name') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'John', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>Lang::get('labels.At most 50 characters')]) !!}

                        @if ($errors->has('english_name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('english_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                {!! Form::hidden('training_id', $training->id) !!}
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="required">@lang('tms::training.gender')</label>
                    <div class="skin skin-flat">
                        {!! Form::radio('gender', 'male', old('gender'), ['class' => 'required', 'data-msg-required' => trans('labels.This field is required')]) !!}
                        <label>@lang('tms::training.male')</label>
                    </div>
                    <div class="skin skin-flat">
                        {!! Form::radio('gender', 'female', old('gender'), ['class' => 'required', 'data-msg-required' => trans('labels.This field is required')]) !!}
                        <label>@lang('tms::training.female')</label>
                    </div>
                    <div class="row col-md-12 radio-error">
                        @if ($errors->has('gender'))
                            <span class="small text-danger"><strong>{{ $errors->first('gender') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="date1" class="required">@lang('tms::training.dob') :</label>
                    {{ Form::date('dob', null, ['class' => 'form-control required', 'id'=>'date1', 'data-msg-required' => trans('labels.This field is required')]) }}
                    @if ($errors->has('dob'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('dob') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.email') :</label>
                        {!! Form::text('email', old('email'), ['class' => 'form-control required' . ($errors->has('email') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'john@example.com', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>Lang::get('labels.At least 50 characters'), 'data-msg-email' => trans('labels.Please enter a valid email address')]) !!}

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phoneNumber1" class="required">@lang('tms::training.mobile') :</label>
                        {!! Form::text('mobile', old('mobile'), ['class' => 'form-control required' . ($errors->has('mobile') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => '017XXXXXXXX', 'data-rule-maxlength' => 11, 'data-msg-maxlength'=>Lang::get('labels.At least 11 characters')]) !!}

                        @if ($errors->has('mobile'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1">@lang('tms::training.phone') :</label>
                        {!! Form::text('phone', old('phone'), ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => '02XXXXXXX', 'data-rule-maxlength' => 9, 'data-msg-maxlength'=>Lang::get('labels.At least 9 characters')]) !!}

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phoneNumber1">@lang('tms::training.fax') :</label>
                        {!! Form::text('fax', old('fax'), ['class' => 'form-control' . ($errors->has('fax') ? ' is-invalid' : ''), 'placeholder' => 'XXXXXXX', 'data-rule-maxlength' => 9, 'data-msg-maxlength'=>Lang::get('labels.At least 9 characters')]) !!}

                        @if ($errors->has('fax'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fax') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <h1><label class="required">@lang('tms::training.upload_photo')</label></h1>
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" class="form-control required"
                               data-msg-required = "{{ trans('labels.Picture field is required') }}"/>
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview"
                             style="background-image: url({{ asset('/images/default-profile-picture.png') }});">
                        </div>
                    </div>
                    <div class="help-block"></div>
                    @if ($errors->has('photo'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('photo') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</fieldset>

@push('page-js')
    <script>
        $(document).ready(function () {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imageUpload").change(function () {
                readURL(this);
            });
        })
    </script>
@endpush

