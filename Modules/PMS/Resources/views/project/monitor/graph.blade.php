@extends('pms::layouts.master')
@section('title', trans('pms::project.project_monitoring_tabular_view'))

@section('content')
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
                    <div class="card-body">
                        <h4 class="form-section"><i class="ft-bar-chart-2"></i> Attribute Chart Filters</h4>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="attribute_id">Attribute</label>

                                        {{ Form::select('attribute_id', $attributeSelectOptions, null, ['class' => 'form-control select2']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="chart_type">Chart Types</label>

                                        <div class="row">
                                            <div class="col">
                                                <div class="skin skin-flat">
                                                    {!! Form::radio('chart_type', 'line', 'line') !!}
                                                    <label>Line</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="skin skin-flat">
                                                    {!! Form::radio('chart_type', 'bar') !!}
                                                    <label>Bar</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="skin skin-flat">
                                                    {!! Form::radio('chart_type', 'horizontalBar') !!}
                                                    <label>Column</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="skin skin-flat">
                                                    {!! Form::radio('chart_type', 'polarArea') !!}
                                                    <label>Area</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body chartjs">
                            <canvas id="chart" height="500"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-css')
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/checkboxes-radios.css') }}">
@endpush

@push('page-js')
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/checkbox-radio.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            let uniqueMonthYear = JSON.parse('{!! json_encode($uniqueMonthYear) !!}');
            let attributeValueDetail = JSON.parse('{!! json_encode($attributeValueDetail) !!}');

            //Get the context of the Chart canvas element we want to select
            let ctx = $("#chart");

            // Chart Options
            let chartOptions = {
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
                        },
                        ticks: {
                            beginAtZero: true
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
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Attribute Values Line Chart'
                }
            };

            // Chart Data
            let chartData = {
                labels: uniqueMonthYear,
                datasets: [{
                    label: `${attributeValueDetail.name} - Planned`,
                    data: attributeValueDetail.monthly_planned_values,
                    fill: false,
                    borderDash: [5, 5],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }, {
                    label: `${attributeValueDetail.name} - Achieved`,
                    data: attributeValueDetail.monthly_achieved_values,
                    lineTension: 0,
                    fill: false,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            };

            let config = {
                type: 'line',
                // Chart Options
                options: chartOptions,
                data: chartData
            };

            // Create the chart
            let chart = new Chart(ctx, config);

            $('select[name=attribute_id]').on('change', function () {
                let attributeId = $(this).val();
                let attributeGraphUrl = '/pms/projects/{{ $projectProposal->id }}/monitors/graphs/' + attributeId;
                $.get(attributeGraphUrl).done(function (data) {
                    let serverChartDate = Object.assign({}, chartData);

                    serverChartDate.label = data.uniqueMonthYear;
                    serverChartDate.datasets[0].data = data.attributeValueDetail.monthly_planned_values;
                    serverChartDate.datasets[1].data = data.attributeValueDetail.monthly_achieved_values;

                    let newChartConfig = Object.assign({}, config);

                    chart.destroy();
                    chart = new Chart(ctx, newChartConfig);
                }).fail(function (error) {
                    alert(error);
                });
            });

            $('input[type=radio][name=chart_type]').on('ifChecked', function (event) {
                let chartType = $(this).val();

                let currentOptions = JSON.parse(JSON.stringify(chartOptions));

                config.type = chartType;
                if (chartType == 'polarArea') {
                    delete currentOptions['scales'];
                    config.options = currentOptions;
                } else {
                    config.options = currentOptions;
                }

                chart.destroy();
                chart = new Chart(ctx, config);
            });
        });
    </script>
@endpush

