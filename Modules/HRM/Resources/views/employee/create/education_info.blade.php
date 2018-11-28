<div class="repeater-default">

    <div data-repeater-list="education">

        @php
            $oldEducations = old();
        @endphp
        @if(isset($oldEducations['education']) && count($oldEducations['education'])>0)
            @foreach($oldEducations['education'] as $key => $education)
                <div data-repeater-item="">
                    <div class="row">
                        {{--<form class="form">--}}

                        <div class=" col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <section class="basic-select2">
                                        <div class="form-group {{ $errors->educationError->has("education.".$key.".institute_id") ? ' error' : '' }}">
                                            {{ Form::label('institute_id', 'Select Your Institute ', ['class' => 'required']) }}
                                            <br/>
                                            {{ Form::select('institute_id',$institutes,  $education['institute_id'] , ['class' => 'select2 form-control instituteSelection','placeholder' => 'Select Institute Name', 'data-validation-required-message'=>'Please Select Institute']) }}
                                            <div class="help-block"></div>
                                            @if ($errors->educationError->has("education.".$key.".institute_id"))
                                                <div class="help-block">  {{ $errors->educationError->first("education.*.institute_id") }}</div>
                                            @endif

                                        </div>
                                    </section>
                                </div>

                                <div class="help-block"></div>

                                <div class="col-md-6 " id="addOtherInstitute">
                                    <div class="form-group ">
                                        {{ Form::label('other_institute_name', 'Enter Your Institute Name') }}<br/>
                                        {{ Form::text('other_institute_name',  null, ['id'=>'', 'class' => ' form-control addInstituteInput', 'placeholder' => 'Enter Your Institute Name']) }}

                                        <div class="help-block"></div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->educationError->has("education.".$key.".institute_department_id") ? ' error' : '' }}">
                                        {{ Form::label('institute_department_id', 'Department/Section/Group') }}
                                        {{ Form::text('institute_department_id',  $education['institute_department_id'], ['class' => 'form-control', 'placeholder' => 'Science/CSE', 'data-validation-required-message'=>'Please enter department name']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->educationError->has("education.".$key.".institute_department_id"))
                                            <div class="help-block">  {{ $errors->educationError->first("education.*.institute_department_id") }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->educationError->has("education.".$key.".institute_degree_id") ? ' error' : '' }}">
                                        {{ Form::label('institute_degree_id', 'Degree Name') }}
                                        {{ Form::text('institute_degree_id', $education['institute_degree_id'], ['class' => 'form-control', 'placeholder' => 'B.A Hons', 'data-validation-required-message'=>'Please enter degree name']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->educationError->has("education.".$key.".institute_degree_id"))
                                            <div class="help-block">  {{ $errors->educationError->first("education.*.institute_degree_id") }}</div>
                                        @endif
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->educationError->has("education.".$key.".passing_year") ? ' error' : '' }}">
                                        {{ Form::label('passing_year', 'Passing Year') }}
                                        {{ Form::number('passing_year',  $education['passing_year'], ['class' => 'form-control', 'placeholder' => '', 'data-validation-required-message'=>'Please enter passing year']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->educationError->has("education.".$key.".passing_year"))
                                            <div class="help-block">  {{ $errors->educationError->first("education.*.passing_year") }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        {{ Form::label('medium', 'Medium') }}
                                        {{ Form::select('medium', Config('constants.employee_education_medium'),  $education['medium'], ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->educationError->has("education.".$key.".duration") ? ' error' : '' }}">
                                        {{ Form::label('duration', 'Duration') }}
                                        {{ Form::text('duration',  $education['duration'], ['class' => 'form-control', 'placeholder' =>'4 years', 'data-validation-required-message'=>'Please enter course duration']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->educationError->has("education.".$key.".duration"))
                                            <div class="help-block">  {{ $errors->educationError->first("education.*.duration") }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->educationError->has("education.".$key.".result") ? ' error' : '' }}">
                                        {{ Form::label('result', 'Result') }}
                                        {{ Form::text('result',  $education['result'], ['class' => 'form-control', 'placeholder' => 'CGPA / Grade / Division', 'data-validation-required-message'=>'Please enter result']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->educationError->has("education.".$key.".result"))
                                            <div class="help-block">  {{ $errors->educationError->first("education.*.result") }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('achievement', 'Achievement') }}
                                        {{ Form::text('achievement',  $education['achievement'], ['class' => 'form-control', 'placeholder' => 'eg. President Gold Madel']) }}
                                    </div>
                                </div>
                                {{ Form::hidden('id', isset($education['id']) ? $education['id'] : null   ) }}
                                {{ Form::hidden('employee_id', isset($education['employee_id']) ? $education['employee_id'] : null, ['class' =>'EmployeeId']) }}
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
                                <section class="basic-select2">
                                    <div class="form-group">
                                        {{ Form::label('institute_id', 'Select Your Institute ', ['class' => 'required']) }}
                                        <br/>
                                        {{ Form::select('institute_id', $institutes, null, ['class' => 'select2 form-control instituteSelection', 'placeholder' =>'Please select institute', 'data-validation-required-message'=>'Please Select Institute']) }}

                                        <div class="help-block"></div>
                                    </div>
                                </section>
                            </div>
                            <div class="col-md-6 addOtherInstitute">
                                <div class="form-group ">
                                    {{ Form::label('other_institute_name', 'Enter Your Institute Name') }}<br/>
                                    {{ Form::text('other_institute_name',  null, ['id'=>'addInstituteInput', 'class' => ' form-control', 'placeholder' => 'Enter Your Institute Name']) }}

                                    <div class="help-block"></div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('institute_department_id', 'Department/Section/Group') }}
                                    {{ Form::text('institute_department_id',  null, ['class' => 'form-control', 'placeholder' => 'Science/CSE', 'data-validation-required-message'=>'Please enter department name']) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('institute_degree_id', 'Degree Name') }}
                                    {{ Form::text('institute_degree_id', null, ['class' => 'form-control', 'placeholder' => 'B.A Hons', 'data-validation-required-message'=>'Please enter degree name']) }}
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
                            {{ Form::hidden('employee_id', isset($employee_id) ? $employee_id : null, ['class' =>'EmployeeId']) }}
                            <hr>
                        </div>
                    </div>
                    <div class=" col-md-2">
                        <div class="form-group col-sm-12 col-md-2 mt-2">
                            <button type="button" class="btn btn-danger" data-repeater-delete=""><i class="ft-x"></i>
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

@push('page-js')
    <script>

        $(document).ready(function () {
            $(".instituteSelection").select2({width: '100%'});
            $(".addOtherInstitute").hide();
            hideUnhide();
        })

        function hideUnhide() {
            $('.instituteSelection').on('select2:select', function (e) {
                var value = $(".instituteSelection option:selected").val();
                if (value === 'other') {
                    $(".addOtherInstitute").show();
                    $(".addInstituteInput").focus();
                } else {
                    $(".addOtherInstitute").hide();

                }
            });
        }
    </script>
@endpush


