<h6>{{ trans('tms::training.health_examination_report') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstName1" class="required">@lang('tms::training.present_deseases') : </label>
                        {{--{{ Form::select('present_deseases', $diseases->pluck('name', 'id'), NULL , ['class' => 'room-type-select form-control required' . ($errors->has('present_deseases') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => trans('labels.select')]) }}

                        @if ($errors->has('present_deseases'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('present_deseases') }}</strong>
                        </span>
                        @endif--}}
                        <select class="select2 form-control">
                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                            </optgroup>
                            <optgroup label="Pacific Time Zone">
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                            </optgroup>
                            <optgroup label="Mountain Time Zone">
                                <option value="AZ">Arizona</option>
                                <option value="CO">Colorado</option>
                                <option value="ID">Idaho</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NM">New Mexico</option>
                                <option value="ND">North Dakota</option>
                                <option value="UT">Utah</option>
                                <option value="WY">Wyoming</option>
                            </optgroup>
                            <optgroup label="Central Time Zone">
                                <option value="AL">Alabama</option>
                                <option value="AR">Arkansas</option>
                                <option value="IL">Illinois</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="OK">Oklahoma</option>
                                <option value="SD">South Dakota</option>
                                <option value="TX">Texas</option>
                                <option value="TN">Tennessee</option>
                                <option value="WI">Wisconsin</option>
                            </optgroup>
                            <optgroup label="Eastern Time Zone">
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="IN">Indiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="OH">Ohio</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WV">West Virginia</option>
                            </optgroup>
                        </select>
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
                            {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => 'form-control instituteSelection',
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

