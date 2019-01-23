@extends('pms::layouts.master')
@section('title', trans('pms::project.project_monitoring_tabular_view'))

@section('content')
    <!-- Line Chart -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Project Monitoring Line Chart</h4>
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
                    <div class="card-body chartjs">
                        <canvas id="line-chart" height="500"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('theme/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            let uniqueMonthYear = JSON.parse('{!! json_encode($uniqueMonthYear) !!}');
            let attributeValueDetails = JSON.parse('{!! json_encode($attributeValueDetails) !!}');

            let plannedDatasets = attributeValueDetails.map((attributeValueDetail) => {
               return {
                   label: `${attributeValueDetail.name} - Planned`,
                   data: attributeValueDetail.monthly_planned_values,
                   fill: false,
                   borderDash: [5, 5],
                   borderColor: "#00A5A8",
                   pointBorderColor: "#00A5A8",
                   pointBackgroundColor: "#FFF",
                   pointBorderWidth: 2,
                   pointHoverBorderWidth: 2,
                   pointRadius: 4,
               };
            });

            let achievedDatasets = attributeValueDetails.map((attributeValueDetail) => {
               return {
                   label: `${attributeValueDetail.name} - Achieved`,
                   data: attributeValueDetail.monthly_achieved_values,
                   lineTension: 0,
                   fill: false,
                   borderColor: "#FF7D4D",
                   pointBorderColor: "#FF7D4D",
                   pointBackgroundColor: "#FFF",
                   pointBorderWidth: 2,
                   pointHoverBorderWidth: 2,
                   pointRadius: 4,
               };
            });

            let datasets = plannedDatasets.map((dataset, index) => {
                return [dataset, achievedDatasets[index]];
            }).flat();

            //Get the context of the Chart canvas element we want to select
            var ctx = $("#line-chart");

            // Chart Options
            var chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                },
                hover: {
                    mode: 'label'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            color: "#f3f3f3",
                            drawTicks: false,
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            color: "#f3f3f3",
                            drawTicks: false,
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Attribute Values Line Chart'
                }
            };

            // Chart Data
            var chartData = {
                labels: uniqueMonthYear,
                datasets: datasets
            };

            var config = {
                type: 'line',

                // Chart Options
                options : chartOptions,

                data : chartData
            };

            // Create the chart
            var lineChart = new Chart(ctx, config);
        });
    </script>
@endpush

