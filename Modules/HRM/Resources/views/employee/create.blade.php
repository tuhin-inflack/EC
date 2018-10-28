@extends('hrm::layouts.master')
@section('title', 'Add new employee ')
@section("employee_create", 'active')


@section("content")
    @php
        $tab_action = isset($employee_id) ? '' : 'disabled';
        $employee_id = isset($employee_id) ? $employee_id : '';
    @endphp
    <div class="col-xl-12 col-lg-12">
        <div class="card">

            {{--<div class="card-header">--}}
            {{--<h4 class="card-title">Add new employee </h4>--}}
            {{--</div>--}}
            <div class="col-md-10 col-md-offset-1">
                @if(Session::has('message'))
                    <div class="alert alert-success text-center">
                        {{Session::get('message')}}
                    </div>
                @endif
            </div>
            <div class="card-header">
                <h4 class="card-title" id="repeat-form">Add New Employee</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                <div class="heading-elements">
                    {{--<ul class="list-inline mb-0">--}}
                    {{--<li><a data-action="collapse"><i class="ft-minus"></i></a></li>--}}
                    {{--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>--}}
                    {{--<li><a data-action="expand"><i class="ft-maximize"></i></a></li>--}}
                    {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                    {{--</ul>--}}
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
                            <a class="nav-link {{ $tab_action }} " id="personal-tab" data-toggle="tab" href="#personal"
                               aria-controls="linkIcon12" aria-expanded="false"><i class="la la-archive"></i>
                                Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $tab_action }}" id="education-tab" data-toggle="tab" href="#education"
                               aria-controls="linkIcon12"
                               aria-expanded="false"><i class="la la-graduation-cap"></i> Education</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ $tab_action }}" id="training-tab" data-toggle="tab" href="#training"
                               aria-controls="linkIcon12"
                               aria-expanded="false"><i class="la la-book"></i> Training</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link {{ $tab_action }}" id="publication-tab" data-toggle="tab"
                               href="#publication"
                               aria-controls="linkIcon12"
                               aria-expanded="false"><i class="la la-paperclip"></i> Publication</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $tab_action }}" id="research-tab" data-toggle="tab" href="#research"
                               aria-controls="linkIcon12"
                               aria-expanded="false"><i class="la la-bookmark"></i> Research</a>
                        </li>


                    </ul>
                    <div class="tab-content px-1 pt-1">


                        <div role="tabpanel" class="tab-pane active show" id="general" aria-labelledby="general-tab"
                             aria-expanded="true">
                            {!! Form::open(['url' => 'hrm/employee/general-info', 'class'=>'form']) !!}
                            @include('hrm::employee.form.general_info')
                            {!! Form::close() !!}
                        </div>


                        <div class="tab-pane" id="personal" role="tabpanel" aria-labelledby="personal-tab"
                             aria-expanded="false">
                            {!! Form::open(['url' => 'hrm/employee/personal-info', 'class'=>'form']) !!}
                            @include('hrm::employee.form.personal_info')
                            {!! Form::close() !!}
                        </div>

                        <div class="tab-pane" id="education" role="tabpanel" aria-labelledby="education-tab"
                             aria-expanded="false">
                            {!! Form::open(['url' => 'hrm/employee/education_info', 'class'=>'form']) !!}
                            @include('hrm::employee.form.education_info')
                            {!! Form::close() !!}
                        </div>


                        <div class="tab-pane" id="training" role="tabpanel" aria-labelledby="training-tab"
                             aria-expanded="false">
                            {!! Form::open(['url' => 'hrm/employee/training_info', 'class'=>'form']) !!}
                            @include('hrm::employee.form.training_info')
                            {!! Form::close() !!}
                        </div>


                        <div class="tab-pane" id="publication" role="tabpanel" aria-labelledby="publication-tab"
                             aria-expanded="false">

                            {!! Form::open(['url' => 'hrm/employee/publication_info', 'class'=>'form']) !!}
                            @include('hrm::employee.form.publication_info')
                            {!! Form::close() !!}
                        </div>


                        <div class="tab-pane" id="research" role="tabpanel" aria-labelledby="research-tab"
                             aria-expanded="false">
                            {!! Form::open(['url' => 'hrm/employee/research_info', 'class'=>'form']) !!}
                            @include('hrm::employee.form.research_info')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>


    <script>
        var employee_id = "<?php echo $employee_id ?>";
        console.log(employee_id);
        $(document).ready(function () {
            $('.addMore').click(function () {
                $('.EmployeeId').val(employee_id);
            });
        })
    </script>
@endpush