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
            @include('../../../task.partials.gantt-chart')
        </div>
    </div>

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
                                       href="#tab1" aria-expanded="true">Organisation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2"
                                       href="#tab2"
                                       aria-expanded="false">Tab 2</a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">

                                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true"
                                     aria-labelledby="base-tab1">
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
                                            <a href="#"
                                               class="btn btn-sm btn-primary"><i
                                                        class="ft-plus"></i> @lang('attribute.create_attribute')</a>
                                        </div>
                                        <br><br>
                                        <table class="table table-bordered table-striped alt-pagination">
                                            <thead>
                                            <tr>
                                                <th>@lang('labels.serial')</th>
                                                <th>@lang('attribute.attribute')</th>
                                                <th>@lang('attribute.unit')</th>
                                                <th>@lang('labels.action')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($project->attributes as $attribute)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $attribute->name }}</td>
                                                    <td>{{ $attribute->unit }}</td>
                                                    <td class="text-center">
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info btn-sm dropdown-toggle"><i
                                                        class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2"
                                                    class="dropdown-menu mt-1 dropdown-menu-right">
                                                  <a href="#"
                                                     class="dropdown-item"><i
                                                              class="la la-list"></i>Plannings</a>
                                                  <a href="#"
                                                     class="dropdown-item"><i
                                                              class="la la-eye"></i>@lang('labels.details')</a>
                                                  <a href="#"
                                                     class="dropdown-item"><i
                                                              class="la la-keyboard-o"></i>@lang('attribute.enter_value')</a>
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
                                <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                    <p>Tab 2 content</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic badge Input end -->

    <section class="row">
        <div class="col-md-12">

        </div>
    </section>

    <section class="row">
        <div class="col-md-12">
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

    <link rel="stylesheet" type="text/css"
          href="{{ asset('theme/vendors/js/charts/dhtmlx-gantt/codebase/dhtmlxgantt-pro.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/plugins/dhtmlx-gantt/chart-pro.css') }}">

@endpush

@push('page-js')
    <script>
        let nodeName = "GanttChartDIV";
        let chartData = {
            "data": JSON.parse('{!! json_encode($ganttChart) !!}')
        };
    </script>

    <script src="{{ asset('theme/vendors/js/charts/dhtmlx-gantt/codebase/dhtmlxgantt-pro.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('theme/vendors/js/charts/dhtmlx-gantt/export/api.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/charts/dhtmlx-gantt/chart-pro.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.task-table, .monthly-update-table, .organization-table').DataTable({
                "pageLength": 5
            });
        });
    </script>
@endpush