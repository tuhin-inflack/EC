<h6>{{ trans('tms::training.physical_information') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.joining_age') :</label>
                        <input type="email" class="form-control" id="emailAddress1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastName1" class="required">@lang('tms::training.physical_problem') : </label>
                        {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.expertise_sports') :</label>
                        {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection', 'data-validation-required-message'=>trans('labels.This field is required'), 'multiple' => 'multiple']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="location1" class="required">@lang('tms::training.hobby') :</label>
                            {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection', 'data-validation-required-message'=>trans('labels.This field is required'), 'multiple' => 'multiple']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.experience') :</label>
                        {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.games') :</label>
                        {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection', 'data-validation-required-message'=>trans('labels.This field is required'), 'multiple' => 'multiple']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="shortDescription1" class="required">@lang('tms::training.hieght') :</label>
                    {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                </div>
                <div class="col-md-6">
                    <label for="shortDescription1" class="required">@lang('tms::training.weight') :</label>
                    {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="shortDescription1" class="required">@lang('tms::training.normal_chest') :</label>
                    {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                </div>
                <div class="col-md-4">
                    <label for="shortDescription1" class="required">@lang('tms::training.expended_chest') :</label>
                    {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                </div>
                <div class="col-md-4">
                    <label for="shortDescription1" class="required">@lang('tms::training.weight_end_course') :</label>
                    {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                </div>
            </div>
        </div>
    </div>
    <br>
</fieldset>

