<div class="form-body">
    <h4 class="form-section"><i class="ft-grid"></i> @lang('hrm::leave.leave_application_form_title') </h4>

    <div class="card-content collapse show">
        <div class="card-body">
            {!! Form::open(['url' =>  route('training.store'), 'class' => 'form', 'novalidate', 'method' => 'post']) !!}
            <div class="form-body">
                <h5 class="form-section"><i class="ft-user"></i> {{trans('hrm::leave.employee_info')}}</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_id" class="form-label required">{{trans('hrm::employee_general_info.employee_id')}}</label>
                            <input id="employee_id" type="text"
                                   class="form-control {{ $errors->has('training_id') ? ' is-invalid' : '' }}"
                                   name="training_id" readonly value="{{$user->username}}">
                            <div class="help-block"></div>
                            @if ($errors->has('training_id'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('training_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_name" class="form-label required">{{trans('hrm::employee_general_info.employee_name')}}</label>
                            <input id="employee_name" type="text" class="form-control" name="employee_name" value="{{ $user->name}}">
                            <div class="help-block"></div>
                            @if ($errors->has('training_title'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('training_title') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label required">{{trans('labels.email_address')}}</label>
                            <input type="text" class="form-control" name="email" value="{{$user->email}}">
                            <div class="help-block"></div>
                            @if ($errors->has('start_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('start_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="designation" class="form-label required">{{trans('hrm::employee_general_info.employee_designation')}}</label>
                            <input type='text' class="form-control required" value="{{ $user->employee->designation->name}}"
                                   id="designation" name="end_date" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.end_date')])}}">
                           <div class="help-block"></div>
                            @if ($errors->has('end_date'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('end_date') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <h5 class="form-section"><i class="ft-calendar"></i> {{trans('hrm::leave.leave_details')}}</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="leave_type" class="form-label required">{{trans('hrm::leave.leave_type')}}</label>
                            <select name="leave_type" id="leave_type" class="form-control">
                                <option value=""> - @lang('hrm::leave.select_leave_type')</option>
                                <option value="sick">Sick Leave</option>
                                <option value="casual">Casual Leave</option>
                                <option value="earn">Earn Leave</option>
                            </select>
                            <div class="help-block"></div>
                            @if ($errors->has('start_date'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('start_date') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="training_end_date" class="form-label required">{{trans('hrm::employee_general_info.employee_designation')}}</label>
                            <input type='text'
                                   class="form-control required {{ $errors->has('end_date') ? ' is-invalid' : '' }}" value="{{ $user->employee->designation->name}}"
                                   placeholder="Pick a Date" id="" name="end_date" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.end_date')])}}">
                          <div class="help-block"></div>
                            @if ($errors->has('end_date'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('end_date') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="leave_start_date" class="form-label required">{{trans('hrm::leave.leave_start_date')}}</label>
                            <input type="text" class="form-control required {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                   name="start_date" placeholder="{{trans('labels.pick_a_date')}}" id="leave_start_date" value="{{ old('start_date') }}" onchange="dateDifference()" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.start_date')])}}">
                            <div class="help-block"></div>
                            @if ($errors->has('start_date'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="leave_end_date" class="form-label required">{{trans('hrm::leave.leave_end_date')}}</label>
                            <input type='text' onchange="dateDifference()" class="form-control required" value="{{ old('end_date') }}"
                                   placeholder="{{trans('labels.pick_a_date')}}" id="leave_end_date" name="end_date" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.end_date')])}}">
                          <div class="help-block"></div>
                            @if ($errors->has('end_date'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('end_date') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="duration" class="form-label required">{{trans('hrm::leave.leave_duration')}}</label>
                            <input type="text" class="form-control required {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                   name="duration" placeholder="{{trans('hrm::leave.leave_duration_placeholder')}}" id="duration" value="{{ old('start_date') }}" onchange="dateDifference()" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.start_date')])}}">
                            <div class="help-block"></div>
                            @if ($errors->has('start_date'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('start_date') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" >@lang('hrm::leave.leave_reason')</label>
                            <textarea name="reason" class="form-control" placeholder="{{trans('hrm::leave.leave_reason_placeholder')}}"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="ft-check-square"></i> {{trans('hrm::leave.apply')}}
                </button>
                <button class="btn btn-warning" type="button" onclick="window.location = '{{route('training.index')}}'">
                    <i class="ft-x"></i> {{trans('labels.cancel')}}
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>