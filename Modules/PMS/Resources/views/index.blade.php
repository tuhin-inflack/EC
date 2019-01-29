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
                                    <span class="label">Project Title</span>: {{$item->dynamicValues['project_title']}}<br>
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
@stop
