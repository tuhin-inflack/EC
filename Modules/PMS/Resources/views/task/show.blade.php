@extends('pms::layouts.master')
@section('title', __('pms::task.show_form_title'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">{{__('pms::task.show_form_title')}}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>{{trans('pms::project_proposal.project_title')}}</th>
                                <td>{{$task->project->title}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('pms::task.task_name')}}</th>
                                <td>{{$task->taskName->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('pms::task.expected_start_date')}}</th>
                                <td>{{(!empty($task->expected_start_time))? date('h:iA d-m-Y', strtotime($task->expected_start_time)):'-'}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('pms::task.expected_end_date')}}</th>
                                <td>{{(!empty($task->expected_start_time))? date('h:iA d-m-Y', strtotime($task->expected_end_time)) : '-'}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('pms::task.start_date')}}</th>
                                <td>{{(!empty($task->start_time))? date('h:iA d-m-Y', strtotime($task->start_time)): '-'}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('pms::task.end_date')}}</th>
                                <td>{{(!empty($task->end_time))? date('h:iA d-m-Y', strtotime($task->end_time)): '-'}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('labels.description')}}</th>
                                <td>{{$task->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('labels.attachments')}}</th>
                                <td>
                                    @if(count($task->attachments))
                                        <ul class="list-inline">
                                            @foreach($task->attachments as $attachment)
                                                <li class="list-group-item"><span class="badge bg-info">{{$attachment->file_name}}</span><br><label class="label"><strong>{{$attachment->file_ext}}</strong> file</label></li>
                                            @endforeach
                                        </ul>
                                    @else
                                        No Attachments
                                    @endif
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        <div class="form-actions">
                            <a href="{{route( 'task.edit', $task->id)}}" class="btn btn-primary"><i class="ft-edit-2"></i> {{trans('labels.edit')}}</a>
                            <a class="btn btn-warning mr-1" role="button" href="{{route('project-proposal-submitted.view', $task->project->id)}}">
                                <i class="ft-x"></i> {{trans('labels.back_page')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
