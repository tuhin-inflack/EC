<div class="card-content collapse show">
    <div class="card-body">
        <table class="table">
            <tbody>
            <tr>
                <th>{{ trans('pms::project_proposal.project_title') }}</th>
                <td>{{ $research->title }}</td>
            </tr>
            <tr>
                <th>{{ trans('pms::task.task_name') }}</th>
                <td>{{$task->name}}</td>
            </tr>
            <tr>
                <th>{{ trans('pms::task.expected_start_date') }}</th>
                <td>{{ \Carbon\Carbon::parse($task->expected_start_date)->format('d/m/Y h:i A') }}</td>
            </tr>
            <tr>
                <th>{{ trans('pms::task.expected_end_date') }}</th>
                <td>{{ \Carbon\Carbon::parse($task->expected_end_date)->format('d/m/Y h:i A') }}</td>
            </tr>
            <tr>
                <th>{{ trans('pms::task.start_date') }}</th>
                <td>{{ $task->actual_start_date ? \Carbon\Carbon::parse($task->actual_start_date)->format('d/m/Y h:i A') : '-' }}</td>
            </tr>
            <tr>
                <th>{{ trans('pms::task.end_date') }}</th>
                <td>{{ $task->actual_end_date ? \Carbon\Carbon::parse($task->actual_end_date)->format('d/m/Y h:i A') : '-' }}</td>
            </tr>
            <tr>
                <th>{{ trans('labels.description') }}</th>
                <td>{{ $task->description }}</td>
            </tr>
            <tr>
                <th>{{ trans('labels.attachments') }}</th>
                <td>
                    @if(count($task->attachments))
                        <ul class="list-inline">
                            @foreach($task->attachments as $attachment)
                                <li class="list-group-item">
                                    <a href="{{ route('file.download', [
                                        'filePath' => $attachment->path,
                                        'displayName' => $attachment->name.'.'.$attachment->ext
                                    ]) }}"
                                       class="badge bg-info white"
                                       title="{{ $attachment->name }}">
                                        {{ strlen($attachment->name) ? substr($attachment->name,0,10).'...': $attachment->name  }}</a><br><label class="label"><strong>{{$attachment->ext}}</strong> file</label></li>
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
            <a href="{{ route('rms-tasks.edit', [$research->id, $task->id]) }}" class="btn btn-primary"><i class="ft-edit-2"></i> {{ trans('labels.edit') }}</a>
            <a class="btn btn-warning mr-1" role="button" href="{{ URL::previous() }}">
                <i class="ft-x"></i> {{trans('labels.back_page')}}
            </a>
        </div>
    </div>
</div>
