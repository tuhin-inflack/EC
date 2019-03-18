{!! Form::open(['url' =>  route('employee-leave.store'), 'class' => 'form', 'novalidate', 'method' => 'post']) !!}
<div class="form-body">
    <h4 class="form-section"><i class="ft-grid"></i> @lang('hrm::employee.employee_loan_from') </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="leave_type" class="form-label required">{{trans('hrm::employee.employee_loan_type')}}</label>
                <select name="leave_type" id="leave_type" class="form-control">
                    <option value=""> - @lang('hrm::employee.select_loan_type')</option>
                    <option value="house">House Loan</option>
                    <option value="house">House Repair Loan</option>
                    <option value="house">Motor Cycle Loan</option>
                    <option value="house">Car Loan</option>
                    <option value="house">Computer Loan</option>
                </select>
                <div class="help-block"></div>
                @if ($errors->has('start_date'))
                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('start_date') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="attachment" class="form-label required">{{trans('labels.attachments')}}</label>
                <input name="attachment" id="attachment" class="form-control" type="file">
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
                <label for="amount" class="form-label required">{{trans('hrm::employee.employee_loan_amount')}}</label>
                <input type="text" class="form-control "
                       name="amount" id="amount" value="{{ old('amount') }}" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('hrm::employee.employee_loan_amount')])}}">
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
                <label for="installment" class="form-label required">{{trans('hrm::employee.employee_loan_installment')}}</label>
                <input type='text' class="form-control required" value="{{ old('installment') }}"
                       id="installment" name="installment" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('hrm::employee.employee_loan_installment')])}}">
                <div class="help-block"></div>
                @if ($errors->has('end_date'))
                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('end_date') }}</strong></span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="duration" class="form-label required">{{trans('hrm::employee.employee_loan_reason')}}</label>
                <input type="text" class="form-control required {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                       name="duration" id="duration" value="{{ old('') }}" onchange="dateDifference()" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('hrm::employee.employee_loan_reason')])}}">
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
                <label class="form-label" >@lang('labels.remarks')</label>
                <textarea name="reason" class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn-primary">
        <i class="ft-check-square"></i> {{trans('hrm::employee.employee_loan_apply_btn')}}
    </button>
    <button class="btn btn-warning" type="button" onclick="window.location = '{{route('training.index')}}'">
        <i class="ft-x"></i> {{trans('labels.cancel')}}
    </button>
</div>

{!! Form::close() !!}

