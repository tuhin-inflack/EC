<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('first_name') ? ' error' : '' }}">
            {{ Form::label('first_name', 'First name') }}
            {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Jon', 'required' => 'required', 'data-validation-required-message'=>'Enter first name']) }}
            <div class="help-block"></div>
            @if ($errors->has('first_name'))
                <div class="help-block">  {{ $errors->first('first_name') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('last_name') ? ' error' : '' }}">
            {{ Form::label('last_name', 'Last name') }}
            {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Doe', 'required' => 'required', 'data-validation-required-message'=>'Enter last name']) }}
            <div class="help-block"></div>
            @if ($errors->has('last_name'))
                <div class="help-block">  {{ $errors->first('last_name') }}</div>
            @endif
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group {{ $errors->has('department_id') ? ' error' : '' }}">
            {{ Form::label('department', 'Department') }}
            {{ Form::select('department_id',[null => '-- Select --' ] + $employeeDepartments, null, ['class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>'Please Select Department']) }}
            <div class="help-block"></div>
            @if ($errors->has('department_id'))
                <div class="help-block">  {{ $errors->first('department_id') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('designation_code') ? ' error' : '' }}">
            {{ Form::label('designation_code', 'Designation') }}
            {{ Form::select('designation_code',  [null => '-- Select --']  + $employeeDesignations,  null, ['class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>'Please Select Designation']) }}
            <div class="help-block"></div>
            @if ($errors->has('designation_code'))
                <div class="help-block">  {{ $errors->first('designation_code') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('gender') ? ' error' : '' }}">
            {{ Form::label('gender', 'Gender') }}
            {{ Form::select('gender', Config::get('constants.gender'),  null, ['class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>'Please Select Gender']) }}
            <div class="help-block"></div>
            @if ($errors->has('gender'))
                <div class="help-block">  {{ $errors->first('gender') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('status') ? ' error' : '' }}">
            {{ Form::label('status', 'Status') }}
            {{ Form::select('status', Config::get('constants.employee_available_status'),  null, ['class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>'Please Select status']) }}
            <div class="help-block"></div>
            @if ($errors->has('status'))
                <div class="help-block">  {{ $errors->first('status') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('tel_office', 'Telephone (Office)') }}
            {{ Form::text('tel_office',null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('tel_home', 'Telephone (Home)') }}
            {{ Form::text('tel_home', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('email') ? ' error' : '' }}">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'info@example.com', 'required' => 'required', 'data-validation-required-message'=>'Email address can\'t be empty']) }}
            <div class="help-block"></div>
            @foreach ($errors->get('email') as $message)
                <div class="help-block">  {{ $message }}</div>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('mobile_one', 'Mobile (1)') }}
            {{ Form::text('mobile_one', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('mobile_two', 'Mobile (2) ') }}
            {{ Form::text('mobile_two', null, ['class' => 'form-control']) }}
        </div>
    </div>


    <hr>

    <div class="form-actions col-md-12 ">
        <div class="pull-right">
            {{ Form::button('<i class="la la-check-square-o"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
            <a href="{{ url('/hrm/employee') }}">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="la la-times"></i> Cancel
                </button>
            </a>

        </div>

    </div>
</div>
