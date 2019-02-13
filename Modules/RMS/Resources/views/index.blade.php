@extends('rms::layouts.master')
@section('title', trans('labels.RMS'))

@section('content')
    {{--<h1>@lang('rms::research_proposal.rms')</h1>--}}

    @if(!empty($pendingTasks->dashboardItems))
    <section id="pending-tasks">
        <div class="card">
            <div class="card-body">
                    <h4>@lang('labels.pending_items')</h4>
                    <table class="table table-bordered">
                        <thead>
                        <th>@lang('labels.feature')</th>
                        <th>@lang('labels.message')</th>
                        <th>@lang('labels.details')</th>
                        <th>@lang('labels.action')</th>
                        </thead>
                        <tbody>
                        @foreach($pendingTasks->dashboardItems as $item)
                            <tr>
                                <td>{{$item->featureName}}</td>
                                <td>{{$item->message}}</td>
                                <td>
                                    <!-- TODO: Fix research title and proposal title -->
                                    <!-- TODO: Title interchanged -->
                                    Proposal Title : {{ $item->dynamicValues['research_title'] }}<br/>
                                    Research Title: {{ $item->dynamicValues['proposal_title'] }}<br/>
                                </td>
                                <td><a href="{{url($item->checkUrl)}}" class="btn btn-primary btn-sm"> @lang('labels.details')</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </section>
    @endif
    @if(!empty(count($reviewedProposals)))

        <section id="pending-tasks">
            <div class="card">
                <div class="card-body">

                    <h4>@lang('labels.ready_for_apc_approval')</h4>
                    <table class="table table-bordered">
                        <thead>
                        <th>@lang('labels.serial')</th>
                        <th>@lang('labels.title')</th>
                        <th>Submitted By : </th>
                        <th>Created Date : </th>
                        <th>@lang('labels.action')</th>
                        </thead>
                        <tbody>
                        @foreach($reviewedProposals as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->title}}</td>
                                <td>{{ $item->submittedBy->name }}</td>
                                <td>{{ date("j F, Y, g:i a",strtotime($item->created_at)) }}</td>
                                <td><a href="{{route('apc-review', [$item->id])}}" class="btn btn-primary btn-sm"> @lang('labels.details')</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    @endif
    @if(!empty($rejectedItems->dashboardItems))
    <section id="pending-tasks">
        <div class="card">
            <div class="card-body">

                    <h2>@lang('labels.rejected_items')</h2>
                    <table class="table table-bordered">
                        <thead>
                        <th>@lang('labels.feature')</th>
                        <th>@lang('labels.message')</th>
                        <th>@lang('labels.details')</th>
                        <th>@lang('labels.action')</th>
                        </thead>
                        <tbody>
                        @foreach($rejectedItems->dashboardItems as $item)

                            <tr>
                                <td>{{$item->featureName}}</td>
                                <td>{{$item->message}}</td>
                                <td>
                                    Proposal Title : {{ $item->dynamicValues['proposal_title'] }}<br/>
                                    Research Title: {{ $item->dynamicValues['research_title'] }}<br/>
                                    Remarks: {{ $item->dynamicValues['remarks'] }}

                                </td>

                                <td>
                                    <a href="{{url($item->checkUrl)}}" class="btn btn-primary btn-sm">@lang('labels.resubmit')</a>
                                    <a href="{{ route('workflow-close', [$item->workFlowMasterId, $item->dynamicValues['id']]) }}" class="btn btn-danger btn-sm">@lang('labels.closed')</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </section>
    @endif
    {{--<section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('rms::research_proposal.research_proposal_status_graph')</h4>
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
                        <div class="card-body" >
                            <canvas id="myChart" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <section>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('rms::research_proposal.research_request_by_last_submission_date')</h4>
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
                        <div class="card-body" >
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('labels.serial')</th>
                                        <th scope="col">@lang('labels.title')</th>
                                        <th scope="col">@lang('rms::research_proposal.last_sub_date')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invitations as $invitation)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td><a href=""><a href="{{ route('research-request.show', $invitation->id) }}">{{ $invitation->title }}</a></a></td>
                                            <td>{{ $invitation->end_date }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('rms::research_proposal.research_proposal_by_submitted_date')</h4>
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
                        <div class="card-body" >
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('labels.serial')</th>
                                        <th scope="col">@lang('labels.title')</th>
                                        <th scope="col">@lang('rms::research_proposal.submission_date')</th>
                                        <th scope="col">@lang('rms::research_proposal.submitted_by')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proposals as $proposal)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            @php
                                                $wfMasterId = $proposal->workflowMasters->first()->id;
                                                $wfConvId = $proposal->workflowMasters->first()->workflowConversations->first()->id;
                                                // $featureName = $proposal->workflowMasters[1]->feature->name;
                                                $featureName = 'Research Proposal';
                                            @endphp
                                            <td>
                                                <a href="{{ route('research-proposal-submission-review', [$proposal->id, $featureName, $wfMasterId, $wfConvId]) }}">{{ $proposal->title }}</a>
                                            </td>
                                            <td>{{ date('d/m/y hi:a', strtotime($proposal->created_at)) }}</td>
                                            <td>{{ $proposal->submittedBy->name }}</td>
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
@stop

@push('page-js')
    <script type="text/javascript" src="{{ asset('theme/vendors/js/charts/chart.min.js') }}"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["{{ __('pms::project_proposal.pending') }}", "{{ __('pms::project_proposal.in_progress') }}", "{{ __('pms::project_proposal.reviewed') }}"],
                datasets: [{
                    label: 'Pending',
                    data: {!! json_encode($chartData) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1,
                        }
                    }]
                }
            }
        });
    </script>
@endpush
