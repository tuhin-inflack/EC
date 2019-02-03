@extends('pms::layouts.master')
@section('title', trans('pms::project_proposal.project_details'))

@section('content')
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
@endpush

@push('page-js')
    <script>
        $(document).ready(function () {
            $('.organization-table, .task-table').DataTable({
                "pageLength": 5
            })
        });
    </script>
@endpush
