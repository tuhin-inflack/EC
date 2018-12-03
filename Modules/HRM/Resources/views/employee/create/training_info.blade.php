<div class="repeater-default">

    <div data-repeater-list="training">
        @php
            $oldTrainings = old();
        @endphp
        @if(isset($oldTrainings['training']) && count($oldTrainings['training'])>0)
            @foreach($oldTrainings['training'] as $key => $training)
                <div data-repeater-item="">
                    <div class="row">
                        {{--<form class="form">--}}
                        <div class=" col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->trainingError->has("training.".$key.".course_name") ? ' error' : '' }}">
                                        {{ Form::label('course_name', 'Course Name') }}
                                        {{ Form::text('course_name', $training['course_name'], ['class' => 'form-control', 'placeholder' => 'eg. Microsoft Office Application', 'data-validation-required-message'=>'Please enter course name ']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->trainingError->has("training.".$key.".course_name"))
                                            <div class="help-block">  {{ $errors->trainingError->first("training.*.course_name") }}</div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->trainingError->has("training.".$key.".organization_name") ? ' error' : '' }}">
                                    {{ Form::label('organization_name', 'Organization Name') }}
                                        {{ Form::text('organization_name', $training['organization_name'], ['class' => 'form-control', 'placeholder' => 'eg. BARD', 'data-validation-required-message'=>'Please enter organization name']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->trainingError->has("training.".$key.".organization_name"))
                                            <div class="help-block">  {{ $errors->trainingError->first("training.*.organization_name") }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->trainingError->has("training.".$key.".duration") ? ' error' : '' }}">
                                    {{ Form::label('duration', 'Duration (in week)') }}
                                        {{ Form::text('duration',  $training['duration'], ['class' => 'form-control', 'placeholder' => 'eg. 4 Week / 8 Week or any Number of week', 'data-validation-required-message'=>'Please enter course duration']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->trainingError->has("training.".$key.".duration"))
                                            <div class="help-block">  {{ $errors->trainingError->first("training.*.duration") }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('training_year', 'Training Year') }}
                                        {{ Form::text('training_year',  $training['training_year'], ['class' => 'form-control datepicker-default', 'placeholder' => '']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->trainingError->has("training.".$key.".result") ? ' error' : '' }}">
                                    {{ Form::label('result', 'Result') }}
                                        {{ Form::text('result',  $training['result'], ['class' => 'form-control', 'placeholder' => 'CGPA / Grade / Division / Certificate name / Course Completed', 'data-validation-required-message'=>'Please enter result']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->trainingError->has("training.".$key.".result"))
                                            <div class="help-block">  {{ $errors->trainingError->first("training.*.result") }}</div>
                                        @endif
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
                                {{ Form::hidden('employee_id', $employee_id, ['class' =>'EmployeeId']) }}
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
                                    {{ Form::select('duration',  $employeeTrainingDuration, null, ['class' => 'form-control', 'placeholder' => 'Select training duration', 'data-validation-required-message'=>'Please enter course duration']) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('training_year', 'Training Year') }}
                                    {{ Form::text('training_year',  null, ['class' => 'form-control datepicker-default', 'placeholder' => '']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('result', 'Result') }}
                                    {{ Form::text('result',  null, ['class' => 'form-control', 'placeholder' => 'CGPA / Grade / Division / Certificate name / Course Completed', 'data-validation-required-message'=>'Please enter result']) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('organization_country', 'Organization Country') }}
                                    {{ Form::text('organization_country',  null, ['class' => 'form-control', 'placeholder' => 'eg. Bangladesh']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('organization_website', 'Organization Website') }}
                                    {{ Form::url('organization_website',  null, ['class' => 'form-control', 'placeholder' => 'http://www.bs-23.net', 'data-validation-required-message'=>'Please enter organization website']) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('achievement', 'Achievement') }}
                                    {{ Form::text('achievement',  null, ['class' => 'form-control', 'placeholder' => 'eg. Best Performer']) }}
                                </div>
                            </div>
                            {{ Form::hidden('employee_id', $employee_id, ['class' =>'EmployeeId']) }}
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