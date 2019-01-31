@extends('rms::layouts.master')
@section('title', trans('labels.RMS'))

@section('content')
    <h1>Research Management System</h1>
    @if(!empty($pendingTasks->dashboardItems))
    <section id="pending-tasks">
        <div class="card">
            <div class="card-body">

                    <h2>Pending Items</h2>
                    <table class="table table-bordered">
                        <thead>
                        <th>Feature</th>
                        <th>Message</th>
                        <th>Details</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($pendingTasks->dashboardItems as $item)
                            <tr>
                                <td>{{$item->featureName}}</td>
                                <td>{{$item->message}}</td>
                                <td>
                                    Proposal Title : {{ $item->dynamicValues['proposal_title'] }}<br/>
                                    Research Title: {{ $item->dynamicValues['research_title'] }}<br/>
                                    Remarks: {{ $item->dynamicValues['remarks'] }}

                                </td>
                                <td><a href="{{url($item->checkUrl)}}">Details</a></td>
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

                    <h2>Rejected Items</h2>
                    <table class="table table-bordered">
                        <thead>
                        <th>Feature</th>
                        <th>Message</th>
                        <th>Details</th>
                        <th>Check</th>
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
                                    <a href="{{url($item->checkUrl. '/re-initiate')}}">Re-initiate</a> |
                                    <a href="{{ route('workflow-close', [$item->workFlowMasterId]) }}">Close</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </section>
    @endif
@stop
