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
                            <label for="training_id" class="form-label required">{{trans('hrm::employee_general_info.employee_id')}}</label>
                            <input id="training_id" type="text"
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
                            <label for="training_name" class="form-label required">{{trans('hrm::employee_general_info.employee_name')}}</label>
                            <input id="training_name" type="text" class="form-control {{ $errors->has('training_title') ? ' is-invalid' : '' }}" name="training_title" value="{{ $user->name}}">
                            <div class="help-block"></div>
                            @if ($errors->has('training_title'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('training_title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="training_start_date"
                                   class="form-label required">{{trans('labels.email_address')}}</label>
                            <input type="text" class="form-control required {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                   name="start_date" value="{{$user->email}}" onchange="dateDifference()">
                            <input type="hidden" name="status" value="1">
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
                            <label for="training_end_date" class="form-label required">{{trans('hrm::employee_general_info.employee_designation')}}</label>
                            <input type='text' onchange="dateDifference()"
                                   class="form-control required {{ $errors->has('end_date') ? ' is-invalid' : '' }}" value="{{ $user->employee->designation->name}}"
                                   placeholder="Pick a Date" id="training_end_date" name="end_date" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.end_date')])}}">
                            {{--<input type="date"--}}
                            {{--class="form-control {{ $errors->has('end_date') ? ' is-invalid' : '' }}"--}}
                            {{--name="end_date" id="end_date" value="{{ old('end_date') }}" onchange="dateDifference()" onkeyup="dateDifference()" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.end_date')])}}">--}}
                            <div class="help-block"></div>
                            @if ($errors->has('end_date'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('end_date') }}</strong></span>
                            @endif
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