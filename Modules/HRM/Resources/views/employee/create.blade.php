@extends('hrm::layouts.master')
@section('title', 'Add new employee ')
@section("employee_create", 'active')


@section("content")
    @if(isset($general_info))
        {{ dd($general_info) }}
    @else
        {{ 'try' }}
    @endif
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            @if(Session::has('message'))
                <div class="alert alert-success text-center">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="card-header">
                <h4 class="card-title">Add new employee </h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs nav-underline nav-justified" id="tab-bottom-line-drag">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general"
                           aria-controls="activeIcon12" aria-expanded="true"><i class="la la-info"></i> General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="personal-tab" data-toggle="tab" href="#personal"
                           aria-controls="linkIcon12" aria-expanded="false"><i class="la la-archive"></i> Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="education-tab" data-toggle="tab" href="#education"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-graduation-cap"></i> Education</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="training-tab" data-toggle="tab" href="#training"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-book"></i> Training</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" id="publication-tab" data-toggle="tab" href="#publication"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-paperclip"></i> Publication</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="research-tab" data-toggle="tab" href="#research"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-bookmark"></i> Research</a>
                    </li>


                </ul>
                <div class="tab-content px-1 pt-1">


                    <div role="tabpanel" class="tab-pane active show" id="general" aria-labelledby="general-tab"
                         aria-expanded="true">
                        {!! Form::open(['url' => 'hrm/employee/general-info', 'class'=>'form']) !!}
                        @include('hrm::employee.form.general-info')
                        {!! Form::close() !!}
                    </div>


                    <div class="tab-pane" id="personal" role="tabpanel" aria-labelledby="personal-tab"
                         aria-expanded="false">
                        {!! Form::open(['url' => 'hrm/employee/personal-info', 'class'=>'form']) !!}
                        @include('hrm::employee.form.personal-info')
                        {!! Form::close() !!}
                    </div>

                    <div class="tab-pane" id="education" role="tabpanel" aria-labelledby="education-tab"
                         aria-expanded="false">
                        {!! Form::open(['url' => 'hrm/employee/education-info', 'class'=>'form']) !!}
                        @include('hrm::employee.form.education-info')
                        {!! Form::close() !!}
                    </div>


                    <div class="tab-pane" id="training" role="tabpanel" aria-labelledby="training-tab"
                         aria-expanded="false">
                        {!! Form::open(['url' => 'hrm/employee/training-info', 'class'=>'form']) !!}
                        @include('hrm::employee.form.training-info')
                        {!! Form::close() !!}
                    </div>


                    <div class="tab-pane" id="publication" role="tabpanel" aria-labelledby="publication-tab"
                         aria-expanded="false">
                        {!! Form::open(['url' => 'hrm/employee/publication-info', 'class'=>'form']) !!}
                        @include('hrm::employee.form.publication-info')
                        {!! Form::close() !!}
                    </div>


                    <div class="tab-pane" id="research" role="tabpanel" aria-labelledby="research-tab"
                         aria-expanded="false">
                        {!! Form::open(['url' => 'hrm/employee/research-info', 'class'=>'form']) !!}
                        @include('hrm::employee.form.research-info')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection