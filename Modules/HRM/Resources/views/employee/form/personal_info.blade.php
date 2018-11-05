<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('father_name', 'Father\'s name') }}
            {{ Form::text('father_name', null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('mother_name', 'Mother\'s name') }}
            {{ Form::text('mother_name', null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('title', 'Title Name') }}
            {{ Form::text('title',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('date_of_birth', 'Date of Birth') }}
            {{ Form::date('date_of_birth',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('job_joining_date', 'Joining Date') }}
            {{ Form::date('job_joining_date',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('current_position_joining_date', 'Current Position Joining Date') }}
            {{ Form::date('current_position_joining_date',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('current_position_expire_date', 'Current Position Expire Date') }}
            {{ Form::date('current_position_expire_date',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('salary_scale', 'Salary Scale') }}
            {{ Form::text('salary_scale',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('total_salary', 'Total salary') }}
            {{ Form::text('total_salary',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('marital_status', 'Marital Status') }}
            {{ Form::select('marital_status',  Config('constants.marital_status') ,  null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('number_of_children', 'Number of Children') }}
            {{ Form::number('number_of_children',  null, ['class' => 'form-control']) }}
        </div>
    </div>

    {{ Form::hidden('employee_id', $employee_id) }}

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