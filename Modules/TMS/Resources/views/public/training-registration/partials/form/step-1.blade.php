<h6>{{ trans('tms::training.personal_info') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstName1" class="required">@lang('tms::training.full_name') : (@lang('tms::training.in_bangla'))</label>
                        <input type="text" class="form-control" id="firstName1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastName1" class="required">@lang('tms::training.full_name') : (@lang('tms::training.in_english'))</label>
                        <input type="text" class="form-control" id="lastName1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="required">@lang('tms::training.gender')</label>
                    <div class="skin skin-flat">
                        {!! Form::radio('booking_type', 'general', old('booking_type'), ['class' => 'required', 'data-msg-required' => trans('labels.This field is required')]) !!}
                        <label>@lang('tms::training.male')</label>
                    </div>
                    <div class="skin skin-flat">
                        {!! Form::radio('booking_type', 'training', old('booking_type') == 'training', ['class' => 'required', 'data-msg-required' => trans('labels.This field is required')]) !!}
                        <label>@lang('tms::training.female')</label>
                    </div>
                    <div class="row col-md-12 radio-error">
                        @if ($errors->has('booking_type'))
                            <span class="small text-danger"><strong>{{ $errors->first('booking_type') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="date1" class="required">@lang('tms::training.dob') :</label>
                    <input type="date" class="form-control" id="date1">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.email') :</label>
                        <input type="email" class="form-control" id="emailAddress1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phoneNumber1" class="required">@lang('tms::training.mobile') :</label>
                        <input type="tel" class="form-control" id="phoneNumber1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1">@lang('tms::training.phone') :</label>
                        <input type="email" class="form-control" id="emailAddress1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phoneNumber1">@lang('tms::training.fax') :</label>
                        <input type="tel" class="form-control" id="phoneNumber1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <h1><label class="required">@lang('tms::training.upload_photo')</label></h1>
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" required  data-validation-required-message ="{{ trans('labels.Picture field is required') }}"/>
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview"
                             style="background-image: url({{ asset('/images/default-profile-picture.png') }});">
                        </div>
                    </div>
                    <div class="help-block"></div>
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

