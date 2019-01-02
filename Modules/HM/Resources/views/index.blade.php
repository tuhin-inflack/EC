@extends('hm::layouts.master')
@section('title', trans('hm::hostel.menu_title'))

@section('content')
    <h1>
        @lang('labels.dashboard')
        <span class="font-size-base">
            Module: {!! config('hm.name') !!}
        </span>
    </h1>

    <div class="container">

        <!-- Products sell and New Orders -->
        <div class="row match-height">
            <div class="col-xl-8 col-12" id="ecommerceChartView">
                <div class="card card-shadow">
                    <div class="card-header card-header-transparent py-20">
                        <h4 class="card-title">@lang('hm::hostel.menu_title')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                        <hr>
                        <ul class="nav nav-pills nav-pills-rounded chart-action float-left btn-group" role="group">
                            <li class="nav-item"><a class="active nav-link" data-toggle="tab" href="#hostel-1">Day</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#hostel-2">Week</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#hostel-3">Month</a></li>
                        </ul>
                    </div>
                    <div class="widget-content tab-content bg-white p-20">
                        <div class="tab-pane active scoreLineShadow" id="hostel-1">

                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>@lang('hm::hostel.menu_title')</th>
                                        <th>@lang('hm::hostel.total_rooms')</th>
                                        <th>@lang('hm::hostel.booked_rooms')</th>
                                        <th>@lang('hm::hostel.available_rooms')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="la la-building warning font-large-2"></i>
                                                </div>
                                                <div class="col-10">
                                                    <h1 class="">
                                                        <a href="{{ route('room.chart') }}"
                                                           class="text-capitalize">HOSTEL NAME</a>
                                                    </h1>
                                                    <span>number of floors 5</span>
                                                </div>
                                            </div>
                                        </th>
                                        <th><h2>25</h2></th>
                                        <th><h2>15</h2></th>
                                        <th><h2>10</h2></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="la la-building warning font-large-2"></i>
                                                </div>
                                                <div class="col-10">
                                                    <h1 class="">
                                                        <a href="{{ route('hostels.detail') }}"
                                                           class="text-capitalize">HOSTEL NAME</a>
                                                    </h1>
                                                    <span>number of floors 6</span>
                                                </div>
                                            </div>
                                        </th>
                                        <th><h2>67</h2></th>
                                        <th><h2>41</h2></th>
                                        <th><h2>26</h2></th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                        <div class="tab-pane scoreLineShadow" id="hostel-2">
                        </div>
                        <div class="tab-pane scoreLineShadow" id="hostel-3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Hostel @lang('labels.details')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--/ Products sell and New Orders -->

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">@lang('hm::hostel.menu_title')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>@lang('hm::hostel.menu_title')</th>
                                        <th>@lang('hm::hostel.total_rooms')</th>
                                        <th>@lang('hm::hostel.booked_rooms')</th>
                                        <th>@lang('hm::hostel.available_rooms')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="la la-building warning font-large-2"></i>
                                                </div>
                                                <div class="col-10">
                                                    <h1 class="">
                                                        <a href="{{ route('room.chart') }}"
                                                               class="text-capitalize">HOSTEL NAME</a>
                                                    </h1>
                                                    <span>number of floors 5</span>
                                                </div>
                                            </div>
                                        </th>
                                        <th><h2>25</h2></th>
                                        <th><h2>15</h2></th>
                                        <th><h2>10</h2></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="la la-building warning font-large-2"></i>
                                                </div>
                                                <div class="col-10">
                                                    <h1 class="">
                                                        <a href="{{ route('hostels.detail') }}"
                                                           class="text-capitalize">HOSTEL NAME</a>
                                                    </h1>
                                                    <span>number of floors 6</span>
                                                </div>
                                            </div>
                                        </th>
                                        <th><h2>67</h2></th>
                                        <th><h2>41</h2></th>
                                        <th><h2>26</h2></th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
