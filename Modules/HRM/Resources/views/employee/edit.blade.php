@extends('hrm::layouts.master')
@section('title', trans('hrm::employee.edit_employee'))

@section("content")
    @php
        $tab_action = isset($employee_id) ? '' : 'disabled';
        $employee_id = isset($employee_id) ? $employee_id : '';
    @endphp
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="repeat-form">@lang('hrm::employee.edit_employee')</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>

            </div>
            <div class="card-content collapse show" style="">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-underline nav-justified" id="tab-bottom-line-drag">
                        @include('hrm::employee.partial.tab')


                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div class="tab-pane active show" role="tabpanel" id="general" aria-labelledby="general-tab"
                             aria-expanded="true">
                            {!! Form::model($employee, ['url' => ['/hrm/employee', $employee->id], 'method' =>'put' , 'files'=>'true', 'class'=>'form form-horizontal', 'novalidate']) !!}
                            @include('hrm::employee.create.general_info')
                            {!! Form::close() !!}
                        </div>


                        <div class="tab-pane " id="personal" role="tabpanel" aria-labelledby="personal-tab"
                             aria-expanded="false">
                            {{--{!! Form::open(['url' => 'hrm/employee/personal-info', 'class'=>'form', 'novalidate']) !!}--}}
                            {!! Form::model($employee->employeePersonalInfo, ['url' => ['/hrm/employee/update-personal-info', $employee->id], 'method' =>'put' , 'files'=>'true', 'class'=>'form form-horizontal', 'novalidate']) !!}

                            @include('hrm::employee.create.personal_info')
                            {!! Form::close() !!}
                        </div>

                        <div class="tab-pane" id="education" role="tabpanel" aria-labelledby="education-tab"
                             aria-expanded="false">
                            {!! Form::open( ['url' => ['/hrm/employee/update-education-info', $employee->id], 'method' =>'put' , 'files'=>'true', 'class'=>'form form-horizontal', 'novalidate']) !!}
                            @include('hrm::employee.edit.edit_education_info')
                            {!! Form::close() !!}
                        </div>


                        <div class="tab-pane" id="training" role="tabpanel" aria-labelledby="training-tab"
                             aria-expanded="false">
                            {!! Form::open( ['url' => ['/hrm/employee/update-training-info', $employee->id], 'method' =>'put' , 'files'=>'true', 'class'=>'form form-horizontal', 'novalidate']) !!}

                            @include('hrm::employee.edit.edit_training_info')
                            {!! Form::close() !!}
                        </div>


                        <div class="tab-pane" id="publication" role="tabpanel" aria-labelledby="publication-tab"
                             aria-expanded="false">

                            {!! Form::open( ['url' => ['hrm/employee/update-publication-info', $employee->id], 'method' =>'put' , 'files'=>'true', 'class'=>'form form-horizontal', 'novalidate']) !!}
                            @include('hrm::employee.edit.edit_publication_info')
                            {!! Form::close() !!}
                        </div>


                        <div class="tab-pane" id="research" role="tabpanel" aria-labelledby="research-tab"
                             aria-expanded="false">
                            {!! Form::open( ['url' => ['hrm/employee/update-research-info', $employee->id], 'method' =>'put' , 'files'=>'true', 'class'=>'form form-horizontal', 'novalidate']) !!}

                            @include('hrm::employee.edit.edit_research_info')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/photo-upload.css') }}">
@endpush
@push('page-js')
    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
    <script>
        var employee_id = "{{ $employee->id }}";
        let selectPlaceholder = '{!! trans('labels.select') !!}';

        $(document).ready(function () {
            $('.addMore').click(function () {
                $('.EmployeeId').val(employee_id);

                // $(".instituteSelection, .addDepartmentSection, .academicDegreeSelect").select2({width: '100%'});

                // $('input,select,textarea').jqBootstrapValidation('destroy');
                // $('input,select,textarea').jqBootstrapValidation();

            });


            var url = document.URL;
            var hash = url.substring(url.indexOf('#'));

            $(".nav-tabs").find("li a").each(function (key, val) {
                if (hash == $(val).attr('href')) {
                    $(val).click();
                }

                $(val).click(function (ky, vl) {
                    location.hash = $(this).attr('href');
                });
            });


        })
    </script>
@endpush