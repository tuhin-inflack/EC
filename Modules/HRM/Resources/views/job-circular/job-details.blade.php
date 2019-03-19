@extends('hrm::layouts.master')
@section('title', trans('hrm::employee.list_title'))
{{--@section("employee_create", 'active')--}}


@section('content')
    <section id="role-list">
        @if (!Auth::guest())
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">@lang('hrm::employee.list_title')</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            <div class="heading-elements">
                                <a href="{{url('/hrm/employee/create')}}" class="btn btn-primary btn-sm"><i
                                            class="ft-plus white"></i> @lang('labels.add')</a>

                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        @endif
    </section>

    <div class="row" style="">
        <div class="col-md-8">
            <div class="card border-top-blue border-blue-blue border-top-blue border-top-blue ">
                <div class="card-header">
                    <h2 class="card-title"><p class="text-success text-bold-700">
                            <a href="">Senior software engineer</a></p></h2>
                    <h4 class="card-title"><p style="color: black"> Brain Station 23 Ltd</p></h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <h5 class="text-bold-500">&nbsp;Vacancy</h5>
                        <p class="pl-2">01</p>
                        <h5 class="text-bold-500 pt-1">Job Responsibilities</h5>
                        <ul class="">
                            <li class="">First item</li>
                            <li class="">Second item</li>
                            <li class="">Third item</li>
                            <li> Good knowledge of ASP.NET MVC and Web API2 and/or ASP.NET Core.</li>
                            <li>Expertise in ASP.Net, C#, SQL Server 2008/2016 with SSMS.</li>
                            <li>Must know Entity Framework 6 and/or EF Core.</li>
                            <li>Good knowledge of JavaScript with ES6. Knowledge in Angular7, CKEditor, RxJs, Redux,
                                Backbone, and React will be added as an advantage.
                            </li>
                            <li>A clear understanding of OOP, design patterns, clean code, and coding standards.</li>
                            <li>Must have solid understanding of SOLID design principle.</li>
                            <li>Having practical experience on Third party library/framework (i.e. Webpack2,
                                IdentityServer4, ElasticSearch) will be added advantage.
                            </li>
                            <li>Good communication skills in English.</li>
                        </ul>
                        <h5 class="text-bold-500 pt-1">Employment Status</h5>
                        <p class="pl-2">Full-time</p>

                        <h5 class="text-bold-500 pt-1">Educational Requirements</h5>
                        <ul class="">
                            <li>Masters degree in any discipline</li>
                        </ul>
                        <h5 class="text-bold-500 pt-1">Experience Requirements</h5>
                        <ul class="">
                            <li>At least 8 year(s)</li>
                            <li>The applicants should have experienced in the following area(s): Software Development
                            </li>
                            <li>The applicants should have experienced in the following business area(s): Software
                                Industries
                            </li>
                        </ul>
                        <h5 class="text-bold-500 pt-1">Additional Requirement</h5>
                        <ul class="">
                            <li>Age at least 30 years</li>
                            <li>Only males are allowed to apply</li>
                            <li>B.Sc in Computer science will get preference</li>
                            <li>Energetic, Smart and leadership ability</li>
                            <li>Positive approach and decision making ability</li>
                            <li>Ability to work under pressure</li>
                        </ul>
                        <h5 class="text-bold-500 pt-1">Job Location</h5>
                        <p class="pl-2">Dhaka</p>
                        <h5 class="text-bold-500 pt-1">Salary</h5>
                        <p class="pl-2">Negotiable</p>
                        <h5 class="text-bold-500 pt-1">Compensation & Other Benefits</h5>
                        <ul>
                            <li>Very attractive salary for the deserving candidates.</li>
                            <li>Salary review twice in a year.</li>
                            <li>Provident fund facility.</li>
                            <li>Medical coverage.</li>
                            <li>Good opportunity for career progression.</li>
                            <li>Two festival bonuses.</li>
                            <li>Lunch and evening snacks facility.</li>
                            <li> Weekly two day offs.</li>
                            <li> Opportunity to work with foreign clients.</li>
                            <li> Very good and friendly working environment.</li>
                        </ul>
                        <h5 class="text-bold-500 pt-1">Job Source</h5>
                        <p class="pl-2">http://www.bard.gov.bd/</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-top-blue border-blue-blue border-top-blue border-top-blue ">
                <div class="card-header">
                    <h2 class="card-title"><p class="bg-dark text-white p-1">
                            <a>Job Summary</a></p></h2>
                    <div class="list-group">
                        <p><b>Published on:</b> Mar 17, 2019</p>
                        <p><b>Vacancy:</b> 01</p>
                        <p><b>Experience:</b> At least 8 year(s)</p>
                        <p><b>Gender:</b> Only males are allowed to apply</p>
                        <p><b>Age:</b> Age at least 30 years</p>
                        <p><b>Job Location:</b> Dhaka (Mohakhali)</p>
                        <p><b>Salary:</b> Negotiable</p>
                        <p><b>Application Deadline:</b> Apr 16, 2019</p>
                    </div>
                </div>
                {{--<div class="card-content collapse show">--}}
                {{--<div class="card-body">--}}

                {{--</div>--}}
                {{--</div>--}}
            </div>

        </div>
    </div>



@endsection
