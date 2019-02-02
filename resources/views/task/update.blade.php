{!! Form::open(['url' =>  $action, 'class' => 'form', 'method' => 'PUT', 'files'=>'true']) !!}
{{ Form::hidden('redirect', URL::previous()) }}
<div class="form-body">
    <h4 class="form-section"><i class="ft-user"></i> {{trans('pms::task.edit_trainee_form_title')}}</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{ trans('pms::task.task_for') }}: <span class="badge bg-blue-grey">{{ $research->title }}</span></label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="task_id" class="form-label required">{{trans('pms::task.task_name')}}</label>
                {{ Form::text('name', $task->name, ['class' => 'form-control required' . ($errors->has('name') ? ' is-invalid' : '')]) }}

                <div class="help-block"></div>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="description"
                       class="form-label">{{trans('pms::task.task_description')}}</label>
                <textarea name="description" id="description" class="form-control">{{$task->description}}</textarea>
                <input type="hidden">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="expected_start_time"
                       class="form-label required">{{trans('pms::task.expected_start_date')}}</label>
                <input type="text" class="form-control required {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                       name="expected_start_time" placeholder="Pick Date" id="expected_start_time"
                       value="{{$task->expected_start_time}}" required
                       data-validation-required-message="{{trans('validation.required', ['attribute' => trans('pms::task.start_date')])}}">
                <div class="help-block"></div>
                @if($errors->has('expected_start_time'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('expected_start_time') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="training_end_date required"
                       class="form-label required">{{trans('pms::task.expected_end_date')}}</label>
                <input type='text'
                       class="form-control required {{ $errors->has('expected_end_time') ? ' is-invalid' : '' }}"
                       value="{{$task->expected_end_time}}"
                       placeholder="Pick a Date" id="expected_end_time" name="expected_end_time" required
                       data-validation-required-message="{{trans('validation.required', ['attribute' => trans('pms::task.expected_end_date')])}}">
                <div class="help-block"></div>
                @if ($errors->has('expected_end_time'))
                    <span class="invalid-feedback"
                          role="alert"><strong>{{ $errors->first('expected_end_time') }}</strong></span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="attachments" class="form-label required">{{trans('labels.attachments')}}</label>
                @if(count($task->attachments))
                    <ul class="list-inline">
                        @foreach($task->attachments as $attachment)
                            <li class="list-group-item" id="{{$attachment->id}}">
                                <a class="btn-close pull-right" title="Remove Attachment"
                                   onclick="deleteAttachment({{$attachment->id}}); style.display='none';"><i
                                            class="ft-x"></i></a> <br>
                                <span class="badge bg-info">{{$attachment->file_name}}</span><br>
                                <span class="label"><strong>{{$attachment->file_ext}}</strong> file</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
                <div id="repeat-attachments">
                    <input type="file" class="form-control {{ $errors->has('attachments') ? ' is-invalid' : '' }}"
                           name="attachments[]" id="attachments" value="{{old('attachments') }}">
                </div>

                <div class="pull-right"><br>
                    <button type="button" class="btn btn-primary" id="add"><i class="ft-plus"></i></button>
                </div>
                <div class="help-block"></div>
                @if ($errors->has('attachments'))
                    <span class="invalid-feedback"
                          role="alert"><strong>{{ $errors->first('attachments') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            </div>
        </div>
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn-primary">
        <i class="ft-check-square"></i> {{ trans('labels.save') }}
    </button>
    <a class="btn btn-warning" href="{{ URL::previous() }}">
        <i class="ft-x"></i> {{ trans('labels.cancel') }}
    </a>
</div>
{!! Form::close() !!}
