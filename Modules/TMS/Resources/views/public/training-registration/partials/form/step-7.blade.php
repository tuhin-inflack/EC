<h6>{{ trans('tms::training.physical_information') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.joining_age') :</label>
                        {!! Form::number('joining_age', old('joining_age'), ['class' => 'form-control required' . ($errors->has('joining_age') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => '30']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="expertise_sports" class="">@lang('tms::training.expertise_sports') : </label>
                        {{ Form::select('academic_institute_id',[], NULL , ['class' => 'select2-tags form-control', 'id' => 'select2-tags', 'data-msg-required'=>trans('labels.This field is required'), 'multiple' => 'multiple']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastName1" class="">@lang('tms::training.hobby') : </label>
                        {{ Form::select('hobby',[], NULL , ['class' => 'select2-tags form-control', 'id' => 'select2-tags', 'data-msg-required'=>trans('labels.This field is required'), 'multiple' => 'multiple']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="emailAddress1" class="">@lang('tms::training.experience') :</label>
                            {{ Form::select('academic_institute_id',['Song' => 'Song', 'Acting' => 'Acting', 'Dancing' => 'Dancing', 'Speech' => 'Speech'], NULL , ['class' => ' form-control instituteSelection',
                                                'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="shortDescription1" class="required">@lang('tms::training.hieght') :</label>
                    {!! Form::text('bangla_name', old('bangla_name'), ['class' => 'form-control required' . ($errors->has('bangla_name') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'হামিদুর রহমান', 'data-rule-maxlength' => 50, 'data-msg-maxlength'=>Lang::get('labels.At most 50 characters')]) !!}
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


