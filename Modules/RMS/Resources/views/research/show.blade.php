@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.research_details'))

@section('content')
    <div class="row match-height">
        <div class="col-md-12">
            @include('../../../task.partials.ganttChart')
        </div>
    </div>

    <section class="row">
        <div class="col-md-6">
            @include('../../../organization.table', [
                'organizable' => $research,
                'url' => route('rms-organizations.create', $research->id),
                'organizationShowRoute' => function ($organizableId, $organizationId) { return route('rms-organizations.show', [$organizableId, $organizationId]); }
            ])
        </div>

        <div class="col-md-6">
            @include('../../../task.partials.table', [
                'taskable' => $research,
                'module' => 'rms'
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
            $('.organization-table, .task-table').DataTable({
                "pageLength": 5
            })
        });
    </script>
@endpush