<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('course_name', 'Course Name') }}
            {{ Form::text('course_name', null, ['class' => 'form-control', 'placeholder' => 'eg. Microsoft Office Application']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('organization_name', 'Organization Name') }}
            {{ Form::text('organization_name', null, ['class' => 'form-control', 'placeholder' => 'eg. BARD']) }}
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('duration', 'Duration (in week)') }}
            {{ Form::text('duration',  null, ['class' => 'form-control', 'placeholder' => 'eg. 4 Week / 8 Week or any Number of week']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('training_year', 'Training Year') }}
            {{ Form::date('training_year',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('result', 'Result') }}
            {{ Form::text('result',  null, ['class' => 'form-control', 'placeholder' => 'CGPA / Grade / Division / Certificate name / Course Completed']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('organization_country', 'Organization Country') }}
            {{ Form::text('organization_country',  null, ['class' => 'form-control', 'placeholder' => 'eg. Bangladesh']) }}
        </div>
    </div>


   <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('achievement', 'Achievement') }}
            {{ Form::text('achievement',  null, ['class' => 'form-control', 'placeholder' => 'eg. Best Performer']) }}
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