@extends('hm::layouts.master')
@section('title', trans('hm::hostel.menu_title'))

@push('page-css')
    <style type="text/css">
        .hostel-level {
            background-color: #fdfbff;
            color: black;
        }

        .rooms {
            font-weight: bold;
            cursor: pointer;
        }

        .available {
            background-color: #a3e279;
            color: black;
        }

        .unavailable {
            background-color: #ee843c;
            color: #fcfcfc;
        }

        .partially-available {
            background-color: purple;
            color: #fcfcfc;
        }
    </style>
@endpush
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

        @include('hm::dashboard.hostel-seat', ['hostels' => $hostels, 'roomDetails' => $roomDetails])
        @include('hm::dashboard.hostel-info', ['hostels' => $hostels])

    </div>
@stop

{{--<button onclick="addData()">Click me</button>--}}

@push('page-js')
    <script src="{{ asset('theme/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var pieSimpleChart;

        $(window).on("load", function(){

            //Get the context of the Chart canvas element we want to select
            var ctx = $("#hostel-pie-chart");

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
                    data: [
                        {{$allRoomsCountBasedOnStatus['booked']}},
                        {{$allRoomsCountBasedOnStatus['available']}},
                        {{$allRoomsCountBasedOnStatus['not_in_service']}}
                    ],
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