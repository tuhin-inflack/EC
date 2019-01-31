@extends('rms::layouts.master')
@section('title', trans('labels.RMS'))

@section('content')
    <h1>@lang('rms::research_proposal.rms')</h1>
    @if(!empty($pendingTasks->dashboardItems))
    <section id="pending-tasks">
        <div class="card">
            <div class="card-body">

                    <h2>@lang('labels.pending_items')</h2>
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
                                    Proposal Title : {{ $item->dynamicValues['proposal_title'] }}<br/>
                                    Research Title: {{ $item->dynamicValues['research_title'] }}<br/>
                                    Remarks: {{ $item->dynamicValues['remarks'] }}
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
                                    <a href="{{ route('workflow-close', [$item->workFlowMasterId]) }}" class="btn btn-danger btn-sm">@lang('labels.closed')</a>
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
