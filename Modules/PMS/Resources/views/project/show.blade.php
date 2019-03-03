@extends('pms::layouts.master')
@section('title', trans('pms::project_proposal.project_details'))

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12">
            <div class="btn-group float-md-left" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <a class="btn btn-outline-info round" href="{{ route('project-budget.index', $project->id) }}">
                        <i class="ft-folder"></i> @lang('pms::project_budget.title') @lang('labels.details')
                    </a>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">

        </div>
    </div>
    <br>

    @if(Auth::user()->hasAnyRole('ROLE_PROJECT_DIRECTOR') || Auth::user()->hasAnyRole('ROLE_DIRECTOR_GENERAL') || Auth::user()->hasAnyRole('ROLE_DIRECTOR_PROJECT'))
        <!-- Basic tabs start -->
        <section>
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1"
                                           href="#tab1"
                                           aria-expanded="true">@lang('pms::project_proposal.organization_report')</a>
                                    </li>
                                    @if(Auth::user()->hasAnyRole('ROLE_PROJECT_DIRECTOR'))
                                        <li class="nav-item">
                                            <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2"
                                               href="#tab2"
                                               aria-expanded="false">@lang('pms::project_proposal.organization')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3"
                                               href="#tab3"
                                               aria-expanded="false">@lang('pms::project_proposal.planning')</a>
                                        </li>
                                    @endif
                                </ul>
                                <div class="tab-content px-1 pt-1">

                                    <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true"
                                         aria-labelledby="base-tab1">
                                        <section>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">@lang('attribute.attribute')</label>
                                                    {{ Form::select('attribute_id', $project->attributes->pluck('name', 'id'), null, ['class' => 'form-control']) }}
                                                    @include('../../../attribute.partials.graph')
                                                </div>
                                            </div>
                                        </section>

                                        <section>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header"><h4
                                                                    class="card-title">@lang('attribute.attribute_tabular_view')</h4>
                                                        </div>
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <div class="table-resposive">
                                                                    <table class="table table-bordered table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>@lang('labels.serial')</th>
                                                                            <th>@lang('attribute.attribute')</th>
                                                                            <th>@lang('attribute.planned_value')</th>
                                                                            <th>@lang('attribute.achieved_value')</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($project->attributes as $attribute)
                                                                            <tr>
                                                                                <td>{{ $loop->iteration }}</td>
                                                                                <td>{{ $attribute->name }}</td>
                                                                                <td>{{ $attribute->plannings->sum('planned_value') }}</td>
                                                                                <td>{{ $attribute->values->sum('achieved_value') }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab2" aria-expanded="true">
                                        @include('../../../organization.table', [
                                        'organizable' => $project,
                                        'url' => route('pms-organizations.create', $project->id),
                                        'organizationShowRoute' => function ($organizableId, $organizationId) {
                                            return route('pms-organizations.show', [$organizableId, $organizationId]);
                                        }
                                    ])
                                        <hr>
                                        <div class="table-responsive">
                                            <div class="pull-left">
                                                <h4 class="card-title">@lang('attribute.attribute_list')</h4>
                                            </div>
                                            <div class="pull-right">
                                                <a href="{{ route('attribute-plannings.create', $project->id) }}"
                                                   class="btn btn-sm btn-primary"><i
                                                            class="ft-plus"></i> @lang('pms::attribute_planning.enter_planning')
                                                </a>
                                                <a href="{{ route('attributes.create', $project->id) }}"
                                                   class="btn btn-sm btn-primary"><i
                                                            class="ft-plus"></i> @lang('attribute.create_attribute')</a>
                                            </div>
                                            <br><br>
                                            <table class="table table-bordered table-striped alt-pagination">
                                                <thead>
                                                <tr>
                                                    <th>@lang('labels.serial')</th>
                                                    <th>@lang('attribute.attribute')</th>
                                                    <th>@lang('attribute.current_balance')</th>
                                                    <th>@lang('labels.action')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($project->attributes as $attribute)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $attribute->name }}</td>
                                                        <td>{{ $attribute->values->sum('achieved_value') }}</td>
                                                        <td class="text-center">
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info btn-sm dropdown-toggle"><i
                                                        class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2"
                                                    class="dropdown-menu mt-1 dropdown-menu-right">
                                                  <a href="{{ route('attribute-plannings.index', [$project->id, $attribute->id]) }}"
                                                     class="dropdown-item"><i
                                                              class="la la-list"></i>@lang('pms::attribute_planning.planning')</a>
                                                  <a href="{{ route('attributes.show', [$project->id, $attribute->id]) }}"
                                                     class="dropdown-item"><i
                                                              class="la la-eye"></i>@lang('labels.details')</a>
                                                <a href="#"
                                                   class="dropdown-item"><i
                                                            class="ft-edit-2"></i> {{trans('labels.edit')}}</a>
                                              </span>
                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab3" aria-expanded="true">
                                        <section class="row">
                                            <div class="col-md-12">
                                                @include('../../../task.partials.table', [
                                                    'taskable' => $project,
                                                    'module' => 'pms'
                                                ])
                                            </div>
                                        </section>

                                        <div class="row match-height">
                                            <div class="col-md-12">
                                                @include('../../../task.partials.gantt-chart')
                                            </div>
                                        </div>

                                        <section class="row">
                                            <div class="col-md-12">
                                                @include('../../../monthly-update.partials.table', [
                                                    'monthlyUpdatable' => $project,
                                                    'module' => 'pms'
                                                ])
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic badge Input end -->
    @endif

    <section>
        <div class="row match-height">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('pms::project_proposal.project_details')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('labels.title')</dt>
                                    <dd class="col-sm-9">{{ $project->title }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('pms::project_proposal.submitted_by')</dt>
                                    <dd class="col-sm-9">{{ $project->projectSubmittedByUser->name }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('pms::project_proposal.submission_date')</dt>
                                    <dd class="col-sm-9">{{ date('d/m/Y,  h:iA', strtotime($project->created_at)) }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('labels.status')</dt>
                                    <dd class="col-sm-9">@lang('rms::research_proposal.' . $project->status)</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-css')
    <style>
        .card-body-min-height {
            min-height: 390px;
            height: auto;
        }
    </style>

    <link rel="stylesheet" type="text/css"
          href="{{ asset('theme/vendors/js/charts/dhtmlx-gantt/codebase/dhtmlxgantt-pro.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/plugins/dhtmlx-gantt/chart-pro.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/checkboxes-radios.css') }}">
@endpush

@push('page-js')
    @if(Auth::user()->hasAnyRole('ROLE_PROJECT_DIRECTOR'))
        <script>
            let nodeName = "GanttChartDIV";
            let chartData = {
                "data": JSON.parse('{!! json_encode($ganttChart) !!}')
            };
        </script>
    @endif

    <script src="{{ asset('theme/vendors/js/charts/dhtmlx-gantt/codebase/dhtmlxgantt-pro.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('theme/vendors/js/charts/dhtmlx-gantt/export/api.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/charts/dhtmlx-gantt/chart-pro.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/checkbox-radio.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <script>
        async function getAttributeValueDetailsByMonthYear(projectId, attributeId) {
            let attributeGraphUrl = `${projectId}/attributes/${attributeId}/graphs`;
            return await $.get(attributeGraphUrl);
        }

        function generateChart(monthYears, attributeValue, chartType) {
            function doesChartExist() {
                return chartObject !== undefined;
            }

            function destroyChart() {
                if (doesChartExist()) {
                    chartObject.destroy();
                }
            }

            let chartContext = $('#chart');
            let chartPersistentKey = "chart";
            let chartObject = chartContext.data(chartPersistentKey);
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
                            labelString: '{!! trans('month.month') !!}'
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
                            labelString: '{!! trans('attribute.value') !!}'
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: '{!! trans('attribute.attribute_values_line_chart') !!}'
                }
            };
            let chartData = {
                labels: monthYears,
                datasets: [{
                    label: `${attributeValue.name} - {!! trans('attribute.planned') !!}`,
                    data: attributeValue.monthly_planned_values,
                    fill: false,
                    borderDash: [5, 5],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }, {
                    label: `${attributeValue.name} - {!! trans('attribute.achieved') !!}`,
                    data: attributeValue.monthly_achieved_values,
                    lineTension: 0,
                    fill: false,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            };
            let chartConfig = {
                type: chartType,
                options: chartOptions,
                data: chartData
            };

            if (chartType == 'polarArea') {
                delete chartOptions['scales'];
            }

            destroyChart();
            chartContext.data(chartPersistentKey, new Chart(chartContext, chartConfig));
        }

        function initializeGraphVariables(attributeValuesByMonthYear) {
            let uniqueMonthYears = attributeValuesByMonthYear.map(attributeValue => {
                return attributeValue.monthYear;
            });
            let attributeValues = {};
            attributeValues.name = JSON.parse('{!! json_encode($attribute->name) !!}');
            attributeValues.monthly_achieved_values = attributeValuesByMonthYear.map(attributeValue => {
                return attributeValue.total_achieved_value;
            });
            attributeValues.monthly_planned_values = attributeValuesByMonthYear.map(attributeValue => {
                return attributeValue.total_planned_value;
            });
            return {uniqueMonthYears, attributeValues};
        }

        $(document).ready(function () {
            $('.task-table, .monthly-update-table, .organization-table').DataTable({
                "pageLength": 5
            });

            let projectId = JSON.parse('{!! json_encode($project->id) !!}');
            let attributeId = $('select[name=attribute_id]').val();
            let self = this;
            let uniqueMonthYear = [];
            let attributeValues = {};

            getAttributeValueDetailsByMonthYear(projectId, attributeId)
                .then((data) => {
                    let {uniqueMonthYears, attributeValues} = initializeGraphVariables(data);
                    self.uniqueMonthYears = uniqueMonthYears;
                    self.attributeValues = attributeValues;
                    let chartType = $('input[type=radio][name=chart_type]:checked').val();
                    generateChart(uniqueMonthYears, attributeValues, chartType);
                })
                .catch(error => {
                    // TODO: show lang error message
                    console.log(error)
                });

            $('select[name=attribute_id]').on('change', function () {
                let attriubteId = $(this).val();
                getAttributeValueDetailsByMonthYear(projectId, attributeId)
                    .then((data) => {
                        let {uniqueMonthYears, attributeValues} = initializeGraphVariables(data);
                        self.uniqueMonthYears = uniqueMonthYears;
                        self.attributeValues = attributeValues;
                        let chartType = $('input[type=radio][name=chart_type]:checked').val();
                        generateChart(uniqueMonthYears, attributeValues, chartType);
                    })
                    .catch(error => {
                        // TODO: show lang error message
                        console.log(error)
                    });
            });


            $('input[type=radio][name=chart_type]').on('ifChecked', function (event) {
                let chartType = $(this).val();
                generateChart(self.uniqueMonthYear, self.attributeValues, chartType);
            });
        });
    </script>
@endpush