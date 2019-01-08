@extends('hrm::layouts.master')
@section('title', trans('hrm::employee.employee_details'))


@section('content')
    {{--{{ dd($employee) }}--}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">@lang('hrm::employee.employee_details')</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                </ul>
            </div>
        </div>
        <div class="card-content collapse show" style="">
            <div class="card-body">
                <ul class="nav nav-tabs nav-underline nav-justified" id="tab-bottom-line-drag">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general"
                           aria-controls="activeIcon12" aria-expanded="true"><i class="la la-info"></i> @lang('hrm::employee_general_info.general_tab_name')</a>
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
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-book"></i> Training</a>
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
                <div class="tab-content ">
                    {{--employee general information--}}
                    <div class="tab-pane active show" role="tabpanel" id="general" aria-labelledby="general-tab"
                         aria-expanded="true">
                        @include('hrm::employee.view.general_info_details')
                    </div>

                    {{--Employee Personal Info--}}
                    <div class="tab-pane " id="personal" role="tabpanel" aria-labelledby="personal-tab"
                         aria-expanded="false">
                        @if(!is_null($employee->employeePersonalInfo))
                            @include('hrm::employee.view.personal_info_details')
                        @else
                            <h3 class="text-center">Personal info does not exist</h3>
                            <a class="btn btn-small btn-info" href="{{ url('/hrm/employee/' . $employee->id . '/edit#personal') }}">Add </a>
                        @endif

                    </div>

                    {{--Employee Education info--}}
                    <div class="tab-pane" id="education" role="tabpanel" aria-labelledby="education-tab"
                         aria-expanded="false">
                        @if(count($employee->employeeEducationInfo)>0)
                            @include('hrm::employee.view.education_info_details')
                        @else
                            <h3 class="text-center">Education info does not exist</h3>
                            <a class="btn btn-small btn-info" href="{{ url('/hrm/employee/' . $employee->id . '/edit#education') }}">Add </a>

                        @endif
                    </div>

                    {{--Employee Training information--}}
                    <div class="tab-pane" id="training" role="tabpanel" aria-labelledby="training-tab"
                         aria-expanded="false">
                        @if(count($employee->employeeTrainingInfo)>0)
                            @include('hrm::employee.view.training_info_details')
                        @else
                            <h3 class="text-center">Training info does not exist</h3>
                            <a class="btn btn-small btn-info" href="{{ url('/hrm/employee/' . $employee->id . '/edit#training') }}">Add </a>
                        @endif
                    </div>

                    {{--Employee Publication --}}
                    <div class="tab-pane" id="publication" role="tabpanel" aria-labelledby="publication-tab"
                         aria-expanded="false">
                        @if(count($employee->employeePublicationInfo)>0)
                            @include('hrm::employee.view.publication_details')
                        @else
                            <h3 class="text-center">Publication info does not exist</h3>
                            <a class="btn btn-small btn-info" href="{{ url('/hrm/employee/' . $employee->id . '/edit#publication') }}">Add </a>

                        @endif

                    </div>

                    {{--Employee Research information--}}
                    <div class="tab-pane" id="research" role="tabpanel" aria-labelledby="research-tab"
                         aria-expanded="false">
                        @if(count($employee->employeeResearchInfo)>0)
                            @include('hrm::employee.view.research_details')
                        @else
                            <h3 class="text-center">Research info does not exist</h3>
                            <a class="btn btn-small btn-info" href="{{ url('/hrm/employee/' . $employee->id . '/edit#research') }}">Add </a>

                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">


            </div>
        </div>
    </div>

@endsection

@push('page-js')
<script>
    $(document).ready(function () {
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