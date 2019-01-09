{{--{{ dd($errors->PersonalInfo->has('father_name') ) }}--}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->PersonalInfo->has('father_name') ? ' error' : '' }}">
            {{ Form::label('father_name', trans('hrm::personal_info.father_name'), ['class' => 'required']) }}
            {{ Form::text('father_name', null, ['class' => 'form-control', 'placeholder' => '', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->PersonalInfo->has('father_name'))
                <div class="help-block">  {{ $errors->PersonalInfo->first('father_name') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->PersonalInfo->has('mother_name') ? ' error' : '' }}">
            {{ Form::label('mother_name', trans('hrm::personal_info.mother_name'), ['class' => 'required']) }}
            {{ Form::text('mother_name', null, ['class' => 'form-control', 'placeholder' => '', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->PersonalInfo->has('mother_name'))
                <div class="help-block">  {{ $errors->PersonalInfo->first('mother_name') }}</div>
            @endif
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('title', trans('hrm::personal_info.title_name')) }}
            {{ Form::select('title',$employeeTitles,  null, ['class' => 'form-control', 'placeholder' => trans('labels.select')]) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->PersonalInfo->has('date_of_birth') ? ' error' : '' }}">
            {{ Form::label('date_of_birth', trans('hrm::personal_info.date_of_birth'), ['class' => 'required']) }}
            {{ Form::date('date_of_birth',  null, ['class' => 'form-control', 'placeholder' => '', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->PersonalInfo->has('date_of_birth'))
                <div class="help-block">  {{ $errors->PersonalInfo->first('date_of_birth') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->PersonalInfo->has('job_joining_date') ? ' error' : '' }}">
            {{ Form::label('job_joining_date', trans('hrm::personal_info.joining_date'), ['class' => 'required']) }}
            {{ Form::date('job_joining_date',  null, ['class' => 'form-control', 'placeholder' => '', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->PersonalInfo->has('job_joining_date'))
                <div class="help-block">  {{ $errors->PersonalInfo->first('job_joining_date') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('current_position_joining_date', trans('hrm::personal_info.current_position_joining_date')) }}
            {{ Form::date('current_position_joining_date',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div clarclass="form-group">
            {{ Form::label('current_position_expire_date', trans('hrm::personal_info.current_position_expire_date')) }}
            {{ Form::date('current_position_expire_date',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('salary_scale', trans('hrm::personal_info.salary_scale')) }}
            {{ Form::select('salary_scale',  $employeeSalaryScale, null, ['class' => 'form-control', 'placeholder' => trans('labels.select')]) }}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('total_salary', trans('hrm::personal_info.current_basic_pay')) }}
            {{ Form::text('total_salary',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group {{ $errors->PersonalInfo->has('marital_status') ? ' error' : '' }}">
            {{ Form::label('marital_status', trans('hrm::personal_info.marital_status'), ['class' => 'required']) }}
            {{ Form::select('marital_status',  Config('constants.marital_status') ,  null, ['placeholder' => trans('labels.select'), 'class' => 'form-control', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->PersonalInfo->has('marital_status'))
                <div class="help-block">  {{ $errors->PersonalInfo->first('marital_status') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('number_of_children', trans('hrm::personal_info.number_of_children')) }}
            {{ Form::number('number_of_children',  null, ['class' => 'form-control']) }}
        </div>
    </div>
    @if(isset($employee->id))
        {{ Form::hidden('employee_id', isset($employee->id) ? $employee->id : null)   }}
    @else($employee_id)
        {{ Form::hidden('employee_id', isset($employee_id) ? $employee_id : null) }}
    @endif
    {{ Form::hidden('id', isset($employee->employeePersonalInfo->id) ? $employee->employeePersonalInfo->id : null) }}

    <hr>

    <div class="form-actions col-md-12 ">
        <div class="pull-right">
            {{ Form::button('<i class="la la-check-square-o"></i>'.trans('labels.save'), ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
            <a href="{{ url('/hrm/employee') }}">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="la la-times"></i> @lang('labels.cancel')
                </button>
            </a>

        </div>

    </div>
</div>