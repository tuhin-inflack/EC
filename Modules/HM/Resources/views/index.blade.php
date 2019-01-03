@extends('hm::layouts.master')
@section('title', trans('hm::hostel.menu_title'))

@section('content')
    <div class="container">

        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12">
                <h1 class="content-header-title">{{trans('labels.dashboard')}}</h1>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group" role="group">
                        <a class="btn btn-outline-info round" href="{{ route('booking-requests.create') }}">
                            <i class="ft-book"></i> Booking Request
                        </a>
                        <a class="btn btn-outline-warning round" href="{{ route('check-in.create') }}">
                            <i class="ft-bookmark"></i> Check In
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>

        @include('hm::dashboard.hostel-info', ['table' => ''])

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills nav-pills-rounded chart-action float-left btn-group" role="group">
                            @foreach($hostels as $hostel)
                                <li class="nav-item">
                                    <a class="{{ $loop->iteration == 1 ? 'active' : '' }} nav-link" data-toggle="tab" href=".hostel-{{ $hostel['hostelDetails']['id'] }}">{{ $hostel['hostelDetails']['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="widget-content tab-content bg-white p-20">
                                @foreach($hostels as $hostel => $data)
                                    <div class="{{ $loop->iteration == 1 ? 'active' : '' }} tab-pane hostel-{{-- $hostel['hostelDetails']['id'] --}}">
                                        <pre>
                                        {{--@php print_r($hostel); @endphp--}}
                                            {{--@php print_r($data->hostelDetails); @endphp--}}
                                            {{--@php print_r($data->roomDetails); @endphp--}}
                                            @php //print_r($hostel['roomDetails']->toArray()); @endphp
                                        </pre>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

{{--<button onclick="addData()">Click me</button>--}}

@push('page-js')
    <script src="{{ asset('theme/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var pieSimpleChart;

        $(window).on("load", function(){

            //Get the context of the Chart canvas element we want to select
            var ctx = $("#simple-pie-chart");

            // Chart Options
            var chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                responsiveAnimationDuration:800,
            };

            // Chart Data
            var chartData = {
                labels: ["Booked", "Available", "Not for Service"],
                datasets: [{
                    label: "Hostel",
                    data: [10, 15, 1],
                    backgroundColor: ['#00A5A8', '#28D094', '#FF4558'],
                }]
            };

            var config = {
                type: 'pie',
                // Chart Options
                options : chartOptions,
                data : chartData
            };

            // Create the chart
            pieSimpleChart = new Chart(ctx, config);

        });

        function addData() {
            pieSimpleChart.data.datasets.forEach((dataset) => {
                dataset.data = [5, 1, 5];
            });
            pieSimpleChart.update();
        }
    </script>
@endpush