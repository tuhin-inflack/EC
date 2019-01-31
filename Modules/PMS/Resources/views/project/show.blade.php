@extends('pms::layouts.master')
@section('title', trans('pms::project_proposal.project_details'))

@section('content')
    <section class="row">
        <div class="col-md-12">
            @include('../../../organization.table', [
                'organizable' => $project,
                'url' => route('pms-organizations.create', $project->id),
                'organizationShowRoute' => function ($organizableId, $organizationId) { return route('pms-organizations.show', [$organizableId, $organizationId]); }
            ])
        </div>

        <!-- TODO: integration -->
        {{--<div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('task.task_list')</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body card-body-min-height">
                    <div class="table-responsive">
                        <table class="table task-table table-bordered table-striped">
                            <thead>
                            <th>@lang('labels.serial')</th>
                            <th>@lang('labels.name')</th>
                            </thead>
                            <tbody>
                            @foreach(range(0, 4) as $task)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>Task {{ $loop->iteration }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>--}}
    </section>

    <section class="row">
        <div class=" col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('pms::project_proposal.project_details')</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
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
                                <dt class="col-sm-3">@lang('rms::research_proposal.submitted_by')</dt>
                                <dd class="col-sm-9">{{ $project->projectSubmittedByUser->name }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">@lang('rms::research_proposal.submission_date')</dt>
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
    </section>
@endsection

{{-- TODO: Shall be used later --}}
{{--@push('page-css')
    <style>
        .card-body-min-height {
            min-height: 390px;
            height: auto;
        }
    </style>
@endpush--}}

@push('page-js')
    <script>
        $(document).ready(function () {
            $('.organization-table, .task-table').DataTable({
                "pageLength": 5
            })
        });
    </script>
@endpush
