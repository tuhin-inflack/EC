@extends('hrm::layouts.master')
@section('title', 'Add new employee ')

@section("content")
    @php

        /* $tab_action = isset($employee_id) ? '' : 'disabled';
         $employee_id = isset($employee_id) ? $employee_id : ''; */
    @endphp
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="repeat-form">Add New Employee</h4>
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
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general"
                               aria-controls="activeIcon12" aria-expanded="true"><i class="la la-info"></i> General</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " id="personal-tab" data-toggle="tab" href="#personal"
                               aria-controls="linkIcon12" aria-expanded="false"><i class="la la-archive"></i>
                                Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="education-tab" data-toggle="tab" href="#education"
                               aria-controls="linkIcon12"
                               aria-expanded="false"><i class="la la-graduation-cap"></i> Education</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " id="training-tab" data-toggle="tab" href="#training"
                               aria-controls="linkIcon12" aria-expanded="false"><i class="la la-book"></i> Training</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " id="publication-tab" data-toggle="tab"
                               href="#publication"
                               aria-controls="linkIcon12"
                               aria-expanded="false"><i class="la la-paperclip"></i> Publication</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="research-tab" data-toggle="tab" href="#research"
                               aria-controls="linkIcon12"
                               aria-expanded="false"><i class="la la-bookmark"></i> Research</a>
                        </li>


                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div class="tab-pane active show" role="tabpanel" id="general" aria-labelledby="general-tab"
                             aria-expanded="true">
                            {!! Form::open(['url' => 'hrm/employee/general-info', 'class'=>'form form-horizontal', 'novalidate', 'files'=> true]) !!}
                            @include('hrm::employee.create.general_info')
                            {!! Form::close() !!}
                        </div>


                        <div class="tab-pane " id="personal" role="tabpanel" aria-labelledby="personal-tab"
                             aria-expanded="false">
                            {!! Form::open(['url' => 'hrm/employee/personal-info', 'class'=>'form', 'novalidate']) !!}
                            @include('hrm::employee.create.personal_info')
                            {!! Form::close() !!}
                        </div>

                        <div class="tab-pane" id="education" role="tabpanel" aria-labelledby="education-tab"
                             aria-expanded="false">
                            {!! Form::open(['url' => 'hrm/employee/education-info', 'class'=>'form', ]) !!}
                            @include('hrm::employee.create.education_info')
                            {!! Form::close() !!}
                        </div>


                        <div class="tab-pane" id="training" role="tabpanel" aria-labelledby="training-tab"
                             aria-expanded="false">
                            {!! Form::open(['url' => 'hrm/employee/training-info', 'class'=>'form', ]) !!}
                            @include('hrm::employee.create.training_info')
                            {!! Form::close() !!}
                        </div>


                        <div class="tab-pane" id="publication" role="tabpanel" aria-labelledby="publication-tab"
                             aria-expanded="false">

                            {!! Form::open(['url' => 'hrm/employee/publication-info', 'class'=>'form']) !!}
                            @include('hrm::employee.create.publication_info')
                            {!! Form::close() !!}
                        </div>


                        <div class="tab-pane" id="research" role="tabpanel" aria-labelledby="research-tab"
                             aria-expanded="false">
                            {!! Form::open(['url' => 'hrm/employee/research-info', 'class'=>'form']) !!}
                            @include('hrm::employee.create.research_info')
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
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <style>
        .required_start:after {
            content: '*';
            color: red;
            padding-left: 5px;
        }


    </style>
@endpush
@push('page-js')
    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>


    <script>
        var employee_id = "<?php echo $employee_id ?>";
        $(document).ready(function () {
//            $(".instituteSelection").select2({
//                placeholder: "Select a institute",
//                allowClear: true
//            });

            $('.addMore').click(function () {
//                setTimeout(function(){
//
//                    $(".instituteSelection").select2({
//                        placeholder: "Select a institute",
//                        allowClear: true
//                    });
//
//                }, 100);

                $('.EmployeeId').val(employee_id);
                $(".instituteSelection, .addDepartmentSection, .academicDegreeSelect").select2({width: '100%'});

                $.getScript('{{ asset('theme/vendors/js/ui/jquery.sticky.js') }}');
                $.getScript('{{ asset('theme/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}');
                $.getScript('{{ asset('theme/vendors/js/forms/validation/jqBootstrapValidation.js') }}');
                $.getScript('{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}');
                $.getScript('{{ asset('theme/vendors/js/forms/toggle/bootstrap-switch.min.js') }}');
                $.getScript('{{ asset('theme/js/scripts/forms/validation/form-validation.js') }}');


            });

            //        url active based on hash tag url
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
