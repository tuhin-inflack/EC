<div class="repeater-default">

    <div data-repeater-list="training">
        @if(count($employee->employeeTrainingInfo)>0)
            @foreach($employee->employeeTrainingInfo as $training)
                <div data-repeater-item="">
                    <div class="row">
                        {{--<form class="form">--}}
                        <div class=" col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('course_name', 'Course Name') }}
                                        {{ Form::text('course_name', $training->course_name, ['class' => 'form-control', 'placeholder' => 'eg. Microsoft Office Application', 'data-validation-required-message'=>'Please enter course name ']) }}
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('organization_name', 'Organization Name') }}
                                        {{ Form::text('organization_name', $training->organization_name, ['class' => 'form-control', 'placeholder' => 'eg. BARD', 'data-validation-required-message'=>'Please enter organization name']) }}
                                        <div class="help-block"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('duration', 'Duration (in week)') }}
                                        {{ Form::text('duration',  $training->duration, ['class' => 'form-control', 'placeholder' => 'eg. 4 Week / 8 Week or any Number of week', 'data-validation-required-message'=>'Please enter course duration']) }}
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('training_year', 'Training Year') }}
                                        {{ Form::number('training_year',  $training->training_year, ['class' => 'form-control', 'placeholder' => '']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('result', 'Result') }}
                                        {{ Form::text('result',  $training->result, ['class' => 'form-control', 'placeholder' => 'CGPA / Grade / Division / Certificate name / Course Completed', 'data-validation-required-message'=>'Please enter result']) }}
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('organization_country', 'Organization Country') }}
                                        {{ Form::text('organization_country',  $training->organization_country, ['class' => 'form-control', 'placeholder' => 'eg. Bangladesh']) }}
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('achievement', 'Achievement') }}
                                        {{ Form::text('achievement',  $training->achievement, ['class' => 'form-control', 'placeholder' => 'eg. Best Performer']) }}
                                    </div>
                                </div>
                                {{ Form::hidden('id', $training->id) }}
                                {{ Form::hidden('employee_id', $training->employee_id, ['class' =>'EmployeeId']) }}
                                <hr>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group col-sm-12 col-md-2 mt-2">
                                <button type="button" class="btn btn-danger" data-repeater-delete=""><i
                                            class="ft-x"></i>
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr style="border-bottom: 1px solid #1E9FF2">
                </div>
            @endforeach
        @else
            <div data-repeater-item="">
                <div class="row">
                    {{--<form class="form">--}}
                    <div class=" col-md-10">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('course_name', 'Course Name') }}
                                    {{ Form::text('course_name', null, ['class' => 'form-control', 'placeholder' => 'eg. Microsoft Office Application', 'data-validation-required-message'=>'Please enter course name ']) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('organization_name', 'Organization Name') }}
                                    {{ Form::text('organization_name', null, ['class' => 'form-control', 'placeholder' => 'eg. BARD', 'data-validation-required-message'=>'Please enter organization name']) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('duration', 'Duration (in week)') }}
                                    {{ Form::text('duration',  null, ['class' => 'form-control', 'placeholder' => 'eg. 4 Week / 8 Week or any Number of week', 'data-validation-required-message'=>'Please enter course duration']) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('training_year', 'Training Year') }}
                                    {{ Form::number('training_year',  null, ['class' => 'form-control', 'placeholder' => '']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('result', 'Result') }}
                                    {{ Form::text('result',  null, ['class' => 'form-control', 'placeholder' => 'CGPA / Grade / Division / Certificate name / Course Completed', 'data-validation-required-message'=>'Please enter result']) }}
                                    <div class="help-block"></div>
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

                            {{ Form::hidden('employee_id', $employee->id, ['class' =>'EmployeeId']) }}
                            <hr>
                        </div>
                    </div>
                    <div class=" col-md-2">
                        <div class="form-group col-sm-12 col-md-2 mt-2">
                            <button type="button" class="btn btn-danger" data-repeater-delete=""><i
                                        class="ft-x"></i>
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
                <hr style="border-bottom: 1px solid #1E9FF2">
            </div>
        @endif
    </div>
    {{--form repeater end--}}
    <div class="col-md-12">
        <button type="button" data-repeater-create="" class="btn btn-primary addMore"><i class="ft-plus"></i>
            Add More
        </button>
    </div>
    <div class="form-actions col-md-12 ">
        <div class="pull-right">
            {{ Form::button('<i class="la la-check-square-o"></i> Save', ['type' => 'submit', 'id' => 'SubmitButton', 'class' => 'btn btn-primary'] )  }}
            <a href="{{ url('/hrm/employee') }}">
                <button type="button" class="btn btn-warning mr-1"><i class="la la-times"></i> Cancel</button>
            </a>
        </div>
    </div>
</div>