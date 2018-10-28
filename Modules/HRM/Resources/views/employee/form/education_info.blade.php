<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('institute_name', 'Institute Name') }}
            {{ Form::text('institute_name', null, ['class' => 'form-control', 'placeholder' => 'University of Dhaka']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('degree_name', 'Degree Name') }}
            {{ Form::text('degree_name', null, ['class' => 'form-control', 'placeholder' => 'B.A Hons']) }}
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('department', 'Department/Section/Group') }}
            {{ Form::text('department',  null, ['class' => 'form-control', 'placeholder' => 'Science/CSE']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('passing_year', 'Passing Year') }}
            {{ Form::number('passing_year',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('medium', 'Medium') }}
            {{ Form::select('medium', [null=>'Please Select'] + ['Bengali', 'English'],  null, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('result', 'Result') }}
            {{ Form::text('result',  null, ['class' => 'form-control', 'placeholder' => 'CGPA / Grade / Division']) }}
        </div>
    </div>
   <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('achievement', 'Achievement') }}
            {{ Form::text('achievement',  null, ['class' => 'form-control', 'placeholder' => 'eg. President Gold Madel']) }}
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