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
                @if(!empty($pendingTasks->dashboardItems))
                    <table class="table table-bordered">
                        <thead>
                        <th>Feature</th>
                        <th>Message</th>
                        <th>Details</th>
                        <th>Check</th>
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
                @else
                    <div class="card-body">
                        <span><i class="ft-info"></i> No Pending Items</span>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Column Chart</h4>
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
                    <div class="card-content collapse show">
                        <div class="card-body" >
                            <canvas id="myChart" height="400"></canvas>
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
