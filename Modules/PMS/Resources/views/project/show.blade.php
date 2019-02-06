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

    <section class="row">
        <div class="col-md-12">
            @include('../../../monthly-update.partials.table', [
                'monthlyUpdatable' => $project,
                'module' => 'pms'
            ])
        </div>
    </section>

    <div class="row match-height">
        <div class="col-md-12">
            @include('../../../task.partials.ganttChart')
        </div>
    </div>

    <section class="row">
        <div class="col-md-6">
            @include('../../../organization.table', [
                'organizable' => $project,
                'url' => route('pms-organizations.create', $project->id),
                'organizationShowRoute' => function ($organizableId, $organizationId) { return route('pms-organizations.show', [$organizableId, $organizationId]); }
            ])
        </div>

        <div class="col-md-6">
            @include('../../../task.partials.table', [
                'taskable' => $project,
                'module' => 'pms'
            ])
        </div>
    </section>

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
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/js/charts/jsgantt-improved/docs/jsgantt.css') }}">
@endpush

@push('page-js')
    <script>
        let mountElement = document.getElementById('GanttChartDIV');
        let presentedFormat = "week";
        let jsonData = JSON.parse('{!! json_encode($ganttChart) !!}');
    </script>
    <script src="{{ asset('theme/vendors/js/charts/jsgantt-improved/docs/jsgantt.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/charts/jsgantt-improved/gantt-chart.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.organization-table, .task-table, .monthly-update-table').DataTable({
                "pageLength": 5
            })
        });
    </script>
@endpush
