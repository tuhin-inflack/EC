@extends('rms::layouts.master')
@section('title', trans('labels.RMS'))

@section('content')
    {{--<h1>@lang('rms::research_proposal.rms')</h1>--}}

    @if(!is_null($shareConversations))
        <section id="shareConversation">
            <div class="card">
                <div class="card-body">

                    <h2>Share Conversation</h2>
                    <table class="table table-bordered">
                        <thead>
                        <th>@lang('labels.message')</th>
                        <th>@lang('labels.details')</th>
                        <th>@lang('labels.action')</th>
                        </thead>
                        <tbody>
                        @foreach($shareConversations as $shareConversation)
                            <tr>
                                <td>{{ $shareConversation->feature->name }}</td>
                                <td>{{$shareConversation->message}}</td>
                                <td>
                                    Research proposal: {{ $shareConversation->researchProposal->title }}<br/>
                                </td>

                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('research-proposal-submission.review', [$shareConversation->ref_table_id, $shareConversation->workflowDetails->workflow_master_id, $shareConversation->id]) }}">Details</a>

                                    {{--<a href="{{ route('research-workflow-close-reviewer', [$item->workFlowMasterId, $item->dynamicValues['id']]) }}"--}}
                                       {{--class="btn btn-danger btn-sm">@lang('labels.closed')</a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    @endif
    @if(!empty($researchRejectedItems->dashboardItems))
        <section id="pending-tasks">
            <div class="card">
                <div class="card-body">

                    <h2>Research reviewed by Research director</h2>
                    <table class="table table-bordered">
                        <thead>
                        <th>@lang('labels.feature')</th>
                        <th>@lang('labels.message')</th>
                        <th>@lang('labels.details')</th>
                        <th>@lang('labels.action')</th>
                        </thead>
                        <tbody>
                        @foreach($researchRejectedItems->dashboardItems as $item)
                            <tr>
                                <td>{{$item->featureName}}</td>
                                <td>{{$item->message}}</td>
                                <td>
                                    Research Title: {{ $item->dynamicValues['research_title'] }}<br/>
                                </td>

                                <td>
                                    <a href="{{url($item->checkUrl)}}"
                                       class="btn btn-primary btn-sm">@lang('labels.resubmit')</a>
                                    <a href="{{ route('research-workflow-close-reviewer', [$item->workFlowMasterId, $item->dynamicValues['id']]) }}"
                                       class="btn btn-danger btn-sm">@lang('labels.closed')</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    @endif
    @if(!empty($researchPendingTasks->dashboardItems))
        <section id="pending-tasks">
            <div class="card">
                <div class="card-body">
                    <h4>@lang('rms::research.research_pending_items')</h4>
                    <table class="table table-bordered">
                        <thead>
                        <th>@lang('labels.feature')</th>
                        <th>@lang('labels.message')</th>
                        <th>@lang('labels.details')</th>
                        <th>@lang('labels.action')</th>
                        </thead>
                        <tbody>
                        @foreach($researchPendingTasks->dashboardItems as $item)

                            <tr>
                                <td>{{$item->featureName}}</td>
                                <td>{{ $item->message }}</td>

                                <td>
                                    Research Title: {{ $item->dynamicValues['research_title'] }}<br/>
                                </td>
                                <td><a href="{{url($item->checkUrl)}}"
                                       class="btn btn-primary btn-sm"> @lang('labels.details')</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    @endif
    @if(!empty($pendingTasks->dashboardItems))
        <section id="pending-tasks">
            <div class="card">
                <div class="card-body">
                    <h4>@lang('rms::research.research_proposal_pending_items')</h4>
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
                                <td><a href="{{url($item->checkUrl)}}"
                                       class="btn btn-primary btn-sm"> @lang('labels.details')</a></td>
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
                                    <a href="{{url($item->checkUrl)}}"
                                       class="btn btn-primary btn-sm">@lang('labels.resubmit')</a>
                                    <a href="{{ route('workflow-close', [$item->workFlowMasterId, $item->dynamicValues['id']]) }}"
                                       class="btn btn-danger btn-sm">@lang('labels.closed')</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    @endif

    @if(Auth::user()->hasAnyRole('ROLE_DIRECTOR_GENERAL') || Auth::user()->hasAnyRole('ROLE_RESEARCH_DIRECTOR'))
    <section>
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
        <div class="row">
            <div class="col-12">
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
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('labels.serial')</th>
                                        <th scope="col">@lang('task.task')</th>
                                        <th scope="col">@lang('rms::research.title')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--@foreach($tasks as $task)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $task->name }}</td>
                                            <td>{{ $task->researches->title }}</td>
                                        </tr>
                                    @endforeach--}}
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ __('rms::research.review_of_literature') }}</td>
                                        <td>River Bank Erosion and its Effects on Rural Society in Bangladesh</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>{{ __('rms::research.proposal_writing') }}</td>
                                        <td>Micro Credit Operation by the Public Sector in BD: Origin, Performance and Replication</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>{{ __('rms::research.questionnaire_preparation') }}</td>
                                        <td>Value Chain Analysis of Poultry and Pineapple: Selected Cases of Bangladesh</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>{{ __('rms::research.questionnaire_pretesting') }}</td>
                                        <td>River Bank Erosion and its Effects on Rural Society in Bangladesh</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>{{ __('rms::research.data_collection') }}</td>
                                        <td>Micro Credit Operation by the Public Sector in BD: Origin, Performance and Replication</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>{{ __('rms::research.data_tabulation') }}</td>
                                        <td>Value Chain Analysis of Poultry and Pineapple: Selected Cases of Bangladesh</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>{{ __('rms::research.report_writing') }}</td>
                                        <td>River Bank Erosion and its Effects on Rural Society in Bangladesh</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>{{ __('rms::research.draft_report_submission') }}</td>
                                        <td>Value Chain Analysis of Poultry and Pineapple: Selected Cases of Bangladesh</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>{{ __('rms::research.incorporating_research_division_comments') }}</td>
                                        <td>Micro Credit Operation by the Public Sector in BD: Origin, Performance and Replication</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td>{{ __('rms::research.first_final_report_submission') }}</td>
                                        <td>River Bank Erosion and its Effects on Rural Society in Bangladesh</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">11</th>
                                        <td>{{ __('rms::research.received_final_report') }}</td>
                                        <td>Micro Credit Operation by the Public Sector in BD: Origin, Performance and Replication</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">12</th>
                                        <td>{{ __('rms::research.sending_external_reviewer') }}</td>
                                        <td>Value Chain Analysis of Poultry and Pineapple: Selected Cases of Bangladesh</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">13</th>
                                        <td>{{ __('rms::research.comments_from_external_reviewer') }}</td>
                                        <td>River Bank Erosion and its Effects on Rural Society in Bangladesh</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">14</th>
                                        <td>{{ __('rms::research.send_to_respective_researcher') }}</td>
                                        <td>Value Chain Analysis of Poultry and Pineapple: Selected Cases of Bangladesh</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">15</th>
                                        <td>{{ __('rms::research.accepted_final_report') }}</td>
                                        <td>Micro Credit Operation by the Public Sector in BD: Origin, Performance and Replication</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">16</th>
                                        <td>{{ __('rms::research.send_for_publication') }}</td>
                                        <td>River Bank Erosion and its Effects on Rural Society in Bangladesh</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

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
                        <div class="card-body">
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
                                            <td><a href=""><a
                                                            href="{{ route('research-request.show', $invitation->id) }}">{{ $invitation->title }}</a></a>
                                            </td>
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
                        <div class="card-body">
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
                                                <a href="{{ route('research-proposal-submission.show', [$proposal->id]) }}">{{ $proposal->title }}</a>
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
                labels: [
                    "{{ __('rms::research.review_of_literature') }}",
                    "{{ __('rms::research.proposal_writing') }}",
                    "{{ __('rms::research.questionnaire_preparation') }}",
                    "{{ __('rms::research.questionnaire_pretesting') }}",
                    "{{ __('rms::research.data_collection') }}",
                    "{{ __('rms::research.data_tabulation') }}",
                    "{{ __('rms::research.report_writing') }}",
                    "{{ __('rms::research.draft_report_submission') }}",
                    "{{ __('rms::research.incorporating_research_division_comments') }}",
                    "{{ __('rms::research.first_final_report_submission') }}",
                    "{{ __('rms::research.received_final_report') }}",
                    "{{ __('rms::research.sending_external_reviewer') }}",
                    "{{ __('rms::research.comments_from_external_reviewer') }}",
                    "{{ __('rms::research.send_to_respective_researcher') }}",
                    "{{ __('rms::research.accepted_final_report') }}",
                    "{{ __('rms::research.send_for_publication') }}"
                ],
                
                datasets: [{
                    data: [10, 14, 7, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 9, 3, 5],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },{
                    data: [6, 9, 11, 8, 14, 7, 2, 9, 13, 15, 12, 13, 2, 19, 13, 15],
                    backgroundColor:'rgba(54, 162, 235, 0.2)',
                    borderColor:'rgba(255,99,132,1)',
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
                    }],
                    xAxes: [{
                        beginAtZero: true,
                        ticks: {
                            autoSkip: false
                        }
                    }]
                }
            }
        });
    </script>
@endpush
