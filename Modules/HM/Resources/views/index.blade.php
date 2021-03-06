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
            background-color: #28D094;
            color: black;
            text-shadow: 0px 0px 11px #c0ecc4;
        }

        .partially-available {
            background-color: #00A5A8;
            color: #fcfcfc;
            text-shadow: 0px 0px 11px #8a8a8a;
        }

        .unavailable {
            background-color: #ffd162;
            color: #fcfcfc;
            text-shadow: 0px 0px 11px #8a8a8a;
        }

        .not-in-service {
            background-color: #FF4558;
            color: #fcfcfc;
            text-shadow: 0px 0px 11px #8a8a8a;
        }
    </style>
@endpush
@section('content')
    <div class="container">

        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12">

            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group" role="group">
                        <a class="btn btn-outline-info round" href="{{ route('booking-requests.create') }}">
                            <i class="ft-book"></i> @lang('hm::booking-request.booking_request')
                        </a>
                        <a class="btn btn-outline-warning round" href="{{ route('check-in.create-options') }}">
                            <i class="ft-bookmark"></i> @lang('hm::booking-request.check_in')
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>

        @include('hm::dashboard.hostel-info', ['hostels' => $hostels])
        @include('hm::dashboard.hostel-seat', ['hostels' => $hostels, 'roomDetails' => $roomDetails])

    </div>
@stop

{{--<button onclick="addData()">Click me</button>--}}

@push('page-js')
    <script src="{{ asset('theme/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        // Label localization
        let available = "{{ trans('hm::hostel.available') }}";
        let partiallyAvailable = "{{ trans('hm::hostel.partially_available') }}";
        let booked = "{{ trans('hm::hostel.booked') }}";

        let chartDatasetData = [
            {{$allRoomsCountBasedOnStatus['available']}}, // '#28D094'
            //  {{-- $allRoomsCountBasedOnStatus['partially_available'] --}}, // '#00A5A8'
            {{$allRoomsCountBasedOnStatus['booked']}}, // '#ffd162'
            {{--{{$allRoomsCountBasedOnStatus['not_in_service']}}--}} // '#FF4558'
        ];

        var pieSimpleChart; // Pie Chart orbject

        /* # Pie Chart on Dom load
         ======================================= */

        $(window).on("load", function(){

            //Get the context of the Chart canvas element we want to select
            var ctx = $("#hostel-pie-chart");

            var chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                responsiveAnimationDuration:800,
            };

            // Chart Data
            var chartData = {
                labels: [ available, booked],
                datasets: [{
                    label: "Hostel",
                    data: chartDatasetData,
                    backgroundColor: ['#28D094', '#ffd162']
                }]
            };

            var config = {
                type: 'pie',
                options : chartOptions,
                data : chartData
            };

            // Create the chart
            pieSimpleChart = new Chart(ctx, config);

        });

        /* Rerender Pie Chart for new datasets
        ====================================== */
        function addData() {
            pieSimpleChart.data.datasets.forEach((dataset) => {
                dataset.data = [5, 1, 5];
            });
            pieSimpleChart.update();
        }
    </script>
@endpush