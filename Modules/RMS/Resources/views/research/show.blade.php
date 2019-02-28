@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.research_details'))

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12">
            <div class="btn-group float-md-left" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <a class="btn btn-outline-info round" href="{{  route('research-budget.index', $research->id) }}">
                        <i class="ft-folder"></i> @lang('rms::research_budget.title') @lang('labels.details')
                    </a>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12"></div>
    </div>
    <br>

    @if(Auth::user()->hasAnyRole('ROLE_DIRECTOR_GENERAL') || Auth::user()->hasAnyRole('ROLE_DIRECTOR_RESEARCH'))
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
                                       aria-expanded="true">@lang('task.task_gantt_chart')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2"
                                       href="#tab2"
                                       aria-expanded="false">@lang('task.task_list')</a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true"
                                     aria-labelledby="base-tab1">
                                    <div class="row match-height">
                                        <div class="col-md-12">
                                            @include('../../../task.partials.gantt-chart')
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                    <div class="col-md-12">
                                        @include('../../../task.partials.table', [
                                            'taskable' => $research,
                                            'module' => 'rms'
                                        ])
                                    </div>
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


    <section class="row">
        <div class="col-md-12">
            @include('../../../monthly-update.partials.table', [
                'monthlyUpdatable' => $research,
                'module' => 'rms'
            ])
        </div>
    </section>



    <section class="row">
        <div class="col-md-6">
            @include('../../../organization.table', [
                'organizable' => $research,
                'url' => route('rms-organizations.create', $research->id),
                'organizationShowRoute' => function ($organizableId, $organizationId) { return route('rms-organizations.show', [$organizableId, $organizationId]); }
            ])
        </div>

    </section>



    <section>
        <div class="row match-height">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ trans('rms::research_proposal.research_details') }}</h4>
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
                                    <dd class="col-sm-9">{{ $research->title }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('rms::research_proposal.submitted_by')</dt>
                                    <dd class="col-sm-9">{{ $research->researchSubmittedByUser->name }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('rms::research_proposal.submission_date')</dt>
                                    <dd class="col-sm-9">{{ date('d/m/Y,  h:mA', strtotime($research->created_at)) }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('labels.status')</dt>
                                    <dd class="col-sm-9">@lang('rms::research_proposal.' . $research->status)</dd>
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

    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/js/charts/dhtmlx-gantt/codebase/dhtmlxgantt-pro.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/plugins/dhtmlx-gantt/chart-pro.css') }}">

@endpush

@push('page-js')
    @if(Auth::user()->hasAnyRole('ROLE_DIRECTOR_GENERAL') || Auth::user()->hasAnyRole('ROLE_DIRECTOR_RESEARCH'))
    <script>
        let nodeName = "GanttChartDIV";
        let chartData = {
            "data": JSON.parse('{!! json_encode($ganttChart) !!}')
        };
    </script>
    @endif

    <script src="{{ asset('theme/vendors/js/charts/dhtmlx-gantt/codebase/dhtmlxgantt-pro.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/vendors/js/charts/dhtmlx-gantt/export/api.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/charts/dhtmlx-gantt/chart-pro.js') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            $('.organization-table, .task-table, .monthly-update-table').DataTable({
                "pageLength": 5
            })
        });
    </script>
@endpush