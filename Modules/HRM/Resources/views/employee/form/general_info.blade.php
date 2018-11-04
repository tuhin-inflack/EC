
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('first_name', 'First name') }}
            {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Jon']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('last_name', 'Last name') }}
            {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Doe']) }}
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('department', 'Department') }}
            {{ Form::select('department_id',  $departments, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('designation_code', 'Designation') }}
            {{ Form::select('designation_code', [],  null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('gender', 'Gender') }}
            <?php

            ?>
            {{ Form::select('gender', Config::get('constants.gender'),  null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::select('status', [],  null, ['class' => 'form-control']) }}
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
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => '']) }}
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
