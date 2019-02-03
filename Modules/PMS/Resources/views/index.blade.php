@extends('pms::layouts.master')
@section('title', trans('labels.PMS'))

@section('content')
    <section id="pending-tasks">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h1>{{trans('labels.PMS')}}</h1>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        @if(!empty($pendingTasks->dashboardItems))
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>{{__('labels.pending_items')}}</h3>
                                </div>
                            </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <th>{{__('labels.feature_name')}}</th>
                                <th>{{__('labels.message')}}</th>
                                <th>{{__('labels.details')}}</th>
                                <th>{{__('labels.check')}}</th>
                                </thead>
                                <tbody>
                                @foreach($pendingTasks->dashboardItems as $item)
                                    <tr>
                                        <td>{{$item->featureName}}</td>
                                        <td>{{$item->message}}</td>
                                        <td>
                                            <span class="label">Project Title</span>: {{$item->dynamicValues['project_title']}}
                                            <br>
                                            <span class="label">Requested By</span>: {{$item->dynamicValues['requested_by']}}
                                        </td>
                                        <td><a href="{{url($item->checkUrl)}}">View</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        @endif

                        @if(!empty($rejectedTasks->dashboardItems))
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>{{__('labels.rejected_items')}}</h3>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <th>{{__('labels.feature_name')}}</th>
                                        <th>{{__('labels.message')}}</th>
                                        <th>{{__('labels.details')}}</th>
                                        <th>{{__('labels.action')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($rejectedTasks->dashboardItems as $item)
                                            <tr>
                                                <td>{{$item->featureName}}</td>
                                                <td>{{$item->message}}</td>
                                                <td>
                                                    <span class="label">Project Title</span>: {{$item->dynamicValues['project_title']}}<br>
                                                    <span class="label">Requested By</span>: {{$item->dynamicValues['requested_by']}}
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="{{url($item->checkUrl)}}" >{{__('labels.resubmit')}}</a>
                                                    <a class="btn btn-danger btn-sm" href="{{route('project-proposal-submitted-close', $item->workFlowMasterId)}}" title="Close the item forever">{{__('labels.closed')}}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        @endif

                        @if(count($reviewedTasks))

                            <div class="row">
                                <div class="col-md-8">
                                    <h3>{{__('labels.ready_for_apc_approval')}}</h3>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <th>{{__('labels.serial')}}</th>
                                        <th>{{__('pms::project_proposal.project_title')}}</th>

                                        <th>{{__('labels.status')}}</th>
                                        <th>{{__('labels.action')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($reviewedTasks as $item)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->title}}</td>
                                                <td>{{__('labels.'.strtolower($item->status))}}</td>

                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="{{route('project-proposal-submitted-approve', $item->id)}}" >View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{--<section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('pms::project_proposal.project_proposal_status_graph')</h4>
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
                        <h4 class="card-title">@lang('pms::project_proposal.project_request_by_last_submission_date')</h4>
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
                                        <th scope="col">@lang('pms::project_proposal.last_sub_date')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invitations as $invitation)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td><a href="">{{ $invitation->title }}</a></td>
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
                        <h4 class="card-title">@lang('pms::project_proposal.menu_title')</h4>
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
                                        <th scope="col">@lang('pms::project_proposal.submission_date')</th>
                                        <th scope="col">@lang('pms::project_proposal.submitted_by')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proposals as $proposal)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td><a href="">{{ $proposal->title }}</a></td>
                                            <td>{{ date('d/m/y hi:a', strtotime($proposal->created_at)) }}</td>
                                            <td>{{ $proposal->ProposalSubmittedBy->name }}</td>
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
