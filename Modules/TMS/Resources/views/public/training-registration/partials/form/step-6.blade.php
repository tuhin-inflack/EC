<h6>{{ trans('tms::training.health_examination_report') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstName1" class="required">@lang('tms::training.present_deseases') : </label>
                        {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control required     instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}

                        @if ($errors->has('academic_institute_id'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('academic_institute_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastName1" class="required">@lang('tms::training.physical_disability') : </label>
                        {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.general_exammination') :</label>
                        {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="location1" class="required">@lang('tms::training.systemic_exammination') :</label>
                            {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.eye_sight') :</label>
                        <input type="email" class="form-control" id="emailAddress1">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.left_eye') :</label>
                        <input type="email" class="form-control" id="emailAddress1">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.right_eye') :</label>
                        <input type="email" class="form-control" id="emailAddress1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="shortDescription1" class="required">@lang('tms::training.comments') :</label>
                    <textarea name="shortDescription" id="shortDescription1" rows="4" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
    <br>
</fieldset>

