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
                        {{__('pms::task.no_attachments')}}
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
