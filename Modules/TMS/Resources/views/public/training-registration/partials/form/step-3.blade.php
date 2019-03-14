<h6>{{ trans('tms::training.educational_info') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-12">
            <div class="education-repeater">
                <div data-repeater-list="education">
                    <div data-repeater-item="">
                        <div class="row">
                            {{--<form class="form">--}}

                            <div class=" col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('academic_institute_id', trans('tms::training.degree_name'), ['class' => 'required']) }}
                                            <br/>
                                            {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('academic_institute_id', trans('tms::training.degree_subject'), ['class' => 'required']) }}
                                            <br/>
                                            {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('passing_year', trans('tms::training.passing_year'), ['class' => 'required']) }}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                      <span class="la la-calendar-o"></span>
                                                    </span>
                                                </div>
                                                <input type='text' class="form-control pickadate" placeholder="Basic Pick-a-date"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('academic_institute_id', trans('tms::training.education_board'). ' / ' .trans('tms::training.university'), ['class' => 'required']) }}
                                            <br/>
                                            {{ Form::select('academic_institute_id',['L' => 'Large', 'S' => 'Small'], NULL , ['class' => ' form-control instituteSelection',
                                            'placeholder' => trans('labels.select'),'data-validation-required-message'=>trans('labels.This field is required')]) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" col-md-2">
                                <div class="form-group col-sm-12 col-md-2 mt-2">
                                    <button type="button" class="btn btn-danger" data-repeater-delete=""><i
                                                class="ft-x"></i>
                                        @lang('labels.remove')
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr style="border-bottom: 1px solid #1E9FF2">
                    </div>
                </div>
                {{--form repeater end--}}
                <div class="col-md-12">
                    <button type="button" data-repeater-create="" class="btn btn-primary addMore"><i class="ft-plus"></i> @lang('labels.add_more')
                    </button>
                </div>
            </div>
        </div>
    </div>
</fieldset>

@push('page-js')
    {{--<script>--}}

        {{--$(document).ready(function () {--}}

            {{--$(" .instituteSelection, .academicDepartmentSelect, .academicDegreeSelect").select2({width: '100%'});--}}
            {{--$(".addOtherInstitute").hide();--}}
            {{--$(".addDepartmentSection").hide();--}}
            {{--$(".addDegreeSection").hide();--}}


            {{--$('.instituteSelection').on('select2:select', function (e) {--}}
                {{--var value = $(".instituteSelection option:selected").val();--}}
                {{--if (value === 'other') {--}}
                    {{--$(".addOtherInstitute").show();--}}
                    {{--$(".addInstituteInput").focus();--}}
                {{--} else {--}}
                    {{--$(".addOtherInstitute").hide();--}}

                {{--}--}}
            {{--});--}}
            {{--$('.academicDepartmentSelect').on('select2:select', function (e) {--}}
                {{--var value = $(".academicDepartmentSelect option:selected").val();--}}
                {{--if (value === 'other_department') {--}}
                    {{--$(".addDepartmentSection").show();--}}
                    {{--$(".addDepartmentInput").focus();--}}
                {{--} else {--}}
                    {{--$(".addDepartmentSection").hide();--}}

                {{--}--}}
            {{--});--}}
            {{--$('.academicDegreeSelect').on('select2:select', function (e) {--}}
                {{--var value = $(".academicDegreeSelect option:selected").val();--}}
                {{--if (value === 'other_degree') {--}}
                    {{--$(".addDegreeSection").show();--}}
                    {{--$(".addDegreeInput").focus();--}}
                {{--} else {--}}
                    {{--$(".addDegreeSection").hide();--}}

                {{--}--}}
            {{--});--}}
            {{--$('.education-repeater').repeater({--}}
                {{--show: function () {--}}
                    {{--$(this).find('.select2-container').remove();--}}
                    {{--$(this).find('select').select2({--}}
                        {{--placeholder: selectPlaceholder--}}
                    {{--});--}}

                    {{--// remove error span--}}
                    {{--$('div:hidden[data-repeater-item]')--}}
                        {{--.find('input.is-invalid, select.is-invalid')--}}
                        {{--.each((index, element) => {--}}
                            {{--$(element).removeClass('is-invalid');--}}
                        {{--});--}}

                    {{--$(this).slideDown();--}}
                {{--}--}}
            {{--});--}}
        {{--})--}}
    {{--</script>--}}
@endpush

