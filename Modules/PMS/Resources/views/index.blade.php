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
                    <div class="row">
                        <div class="col-md-8">
                            <h3>{{__('labels.pending_items')}}</h3>
                        </div>
                    </div>
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
                                    <span class="label">Project Title</span>: {{$item->dynamicValues['project_title']}}<br>
                                    <span class="label">Requested By</span>: {{$item->dynamicValues['requested_by']}}
                                </td>
                                <td><a href="{{url($item->checkUrl)}}">View</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif

                @if(!empty($rejectedTasks->dashboardItems))
                    <div class="row">
                        <div class="col-md-8">
                            <h3>{{__('labels.rejected_items')}}</h3>
                        </div>
                    </div>
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
                @endif
            </div>
        </div>
    </section>
@stop
