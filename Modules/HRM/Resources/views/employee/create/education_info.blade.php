<div class="repeater-default">

    <div data-repeater-list="education">
        <div data-repeater-item="">
            <div class="row">
                {{--<form class="form">--}}
                <div class=" col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('institute_name', 'Institute Name') }}
                                {{ Form::text('institute_name', null, ['class' => 'form-control', 'placeholder' => 'University of Dhaka', 'data-validation-required-message'=>'Please Select Designation']) }}
                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('degree_name', 'Degree Name') }}
                                {{ Form::text('degree_name', null, ['class' => 'form-control', 'placeholder' => 'B.A Hons', 'data-validation-required-message'=>'Please enter degree name']) }}
                                <div class="help-block"></div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('department', 'Department/Section/Group') }}
                                {{ Form::text('department',  null, ['class' => 'form-control', 'placeholder' => 'Science/CSE', 'data-validation-required-message'=>'Please enter department name']) }}
                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('passing_year', 'Passing Year') }}
                                {{ Form::number('passing_year',  null, ['class' => 'form-control', 'placeholder' => '', 'data-validation-required-message'=>'Please enter passing year']) }}
                                <div class="help-block"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('medium', 'Medium') }}
                                {{ Form::select('medium', Config('constants.employee_education_medium'),  null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('duration', 'Duration') }}
                                {{ Form::text('duration',  null, ['class' => 'form-control', 'placeholder' =>'4 years', 'data-validation-required-message'=>'Please enter course duration']) }}
                                <div class="help-block"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('result', 'Result') }}
                                {{ Form::text('result',  null, ['class' => 'form-control', 'placeholder' => 'CGPA / Grade / Division', 'data-validation-required-message'=>'Please enter result']) }}
                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('achievement', 'Achievement') }}
                                {{ Form::text('achievement',  null, ['class' => 'form-control', 'placeholder' => 'eg. President Gold Madel']) }}
                            </div>
                        </div>
                        {{ Form::hidden('employee_id', $employee_id, ['class' =>'EmployeeId']) }}
                        <hr>
                    </div>
                </div>
                <div class=" col-md-2">
                    <div class="form-group col-sm-12 col-md-2 mt-2">
                        <button type="button" class="btn btn-danger" data-repeater-delete=""><i class="ft-x"></i> Remove
                        </button>
                    </div>
                </div>
            </div>
            <hr style="border-bottom: 1px solid #1E9FF2">

        </div>
    </div>
    {{--form repeater end--}}
    <div class="col-md-12">
        <button type="button" data-repeater-create="" class="btn btn-primary addMore"><i class="ft-plus"></i> Add More
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


