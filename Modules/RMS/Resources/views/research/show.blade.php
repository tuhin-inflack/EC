@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.research_details'))

@section('content')
    <section class="row">
        <div class="col-md-6">
            @include('../../../organization.table', [
                'organizable' => $research,
                'url' => route('rms-organizations.create', $research->id),
                'organizationShowRoute' => function ($organizableId, $organizationId) { return route('rms-organizations.show', [$organizableId, $organizationId]); }
            ])
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('task.task_list')</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a href="{{ route('rms-tasks.create', $research->id) }}"
                                   class="btn btn-sm btn-primary"><i
                                            class="ft ft-plus"></i> Add Task</a></li>
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
                            @foreach($research->tasks as $task)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('rms-tasks.show', [$research->id, $task->id]) }}">{{ $task->name }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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

