{!! Form::open(['url' => $action, 'class' => 'form', 'method' => 'post', 'files'=>'true']) !!}
<div class="form-body">
    <h4 class="form-section"><i class="ft-user"></i> {{trans('pms::task.create_form_title')}}</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{trans('pms::task.task_for')}}: <span
                            class="badge bg-blue-grey">{{ $research->title }}</span></label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="task_id" class="form-label required">{{trans('pms::task.task_name')}}</label>
                {{ Form::text('name', null, ['class' => 'form-control required' . ($errors->has('name') ? ' is-invalid' : '')]) }}

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
                <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" ></textarea>

                <div class="help-block"></div>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
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
                       value="{{ old('expected_start_time') }}" required
                       data-validation-required-message="{{trans('validation.required', ['attribute' => trans('pms::task.start_date')])}}">
                <div class="help-block"></div>
                @if ($errors->has('expected_start_time'))
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
                <input type='text' onchange="dateDifference()"
                       class="form-control required {{ $errors->has('expected_end_time') ? ' is-invalid' : '' }}"
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
                <label for="attachments"
                       class="form-label required">{{trans('labels.attachments')}}</label>
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
        <i class="ft-check-square"></i> {{trans('labels.save')}}
    </button>
    <button class="btn btn-warning" type="button" onclick="window.location = '{{( URL::previous() )}}'">
        <i class="ft-x"></i> {{trans('labels.cancel')}}
    </button>
</div>
{!!Form::close()!!}
