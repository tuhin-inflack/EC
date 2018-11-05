<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('first_name', 'First name') }}
            {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Jon', 'required' => 'required', 'data-validation-required-message'=>'Enter First Name']) }}
            <div class="help-block"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('last_name', 'Last name') }}
            {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Doe', 'required' => 'required', 'data-validation-required-message'=>'Enter Last Name']) }}
            <div class="help-block"></div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('department', 'Department') }}
            {{ Form::select('department_id',[null => '-- Select --' ] + $employeeDepartments, null, ['class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>'Please Select Department']) }}
            <div class="help-block"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('designation_code', 'Designation') }}
            {{ Form::select('designation_code',  [null => '-- Select --']  + $employeeDesignations,  null, ['class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>'Please Select Designation']) }}
            <div class="help-block"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('gender', 'Gender') }}
            {{ Form::select('gender', Config::get('constants.gender'),  null, ['class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>'Please Select Gender']) }}
            <div class="help-block"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::select('status', Config::get('constants.employee_available_status'),  null, ['class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>'Please Select status']) }}
            <div class="help-block"></div>
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
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'info@example.com', 'required' => 'required', 'data-validation-required-message'=>'Email address can\'t be empty']) }}
            <div class="help-block"></div>
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
