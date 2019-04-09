@extends('hrm::layouts.master')
@section('title', trans('hrm::employee.list_title'))
{{--@section("employee_create", 'active')--}}


@section('content')
    <section id="role-list">
        @if (!Auth::guest())
            <div class="col-xl-11 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List of jobs</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url('/hrm/job-circular/create')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> @lang('labels.add')</a>

                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        </div>
                    </div>

                </div>


        </div>
        @endif
        @for($i = 0 ; $i<10; $i++)
            <div class="col-md-11 col-sm-12">
                <div class="card border-top-blue border-blue-blue border-top-blue border-top-blue ">
                    <div class="card-header">
                        <h2 class="card-title"><p class="text-success text-bold-700">
                                <a href="{{ url('/hrm/job-circular', [3]) }}">Senior software engineer</a></p></h2>
                        <h4 class="card-title"><p style="color: black"> Brain Station 23 Ltd</p></h4>
                        <a>   <i class="la la-map-marker"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dhaka</a><br/>
                        <a>   <i class="la la-graduation-cap"></i>&nbsp;&nbsp;&nbsp;&nbsp;B.Sc in Computer Science</a><br/>
                        <a>   <i class="la la-briefcase"></i>&nbsp;&nbsp;&nbsp;&nbsp;NA</a><span class="pull-right">@lang('hrm::job_circular.application_deadline') : March 30, 2019</span><br/>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            {{--<p class="card-text">Use <code>border-left-*</code> and<code>border-right-*</code> class for border left and right color.</p>--}}

                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </section>


@endsection
