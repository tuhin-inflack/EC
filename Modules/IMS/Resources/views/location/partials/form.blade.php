{{ Form::open(['route' =>  'location.store', 'class' => 'location-tab-steps wizard-circle']) }}
<h4 class="form-section"><i class="la la-building"></i> @lang('ims::location.new_location')</h4>
<div class="row">
    <div class="col-6">
        {!! Form::label('name', __('labels.name'), ['class' => 'form-label required']) !!}
        {!! Form::text('name', old('name') ,['class' => "form-control", "required ", "placeholder" => __('labels.name'), 'data-rule-maxlength' => 100, 'data-msg-maxlength'=>Lang::get('labels.At most 100 characters'),
        'data-msg-required' => Lang::get('labels.This field is required')]) !!}
        <div class="help-block"></div>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-6">
        {!! Form::label('department', __('ims::location.department'), ['class' => 'form-label required']) !!}
        {!! Form::select('department_id', $departments, null, ['class' => "form-control", "required ", "placeholder" => __('ims::location.department'),
        'data-msg-required' => Lang::get('labels.This field is required')]) !!}
        <div class="help-block"></div>
    </div>
</div>
<div class="row mt-lg-2">
    <div class="form-group col-md-6">
        {!! Form::label('type', __('ims::location.type'), ['class' => 'form-label required']) !!}
        <div class="skin skin-flat">
            {!! Form::radio('type', '1', old('type'), ['class' => 'required', 'data-msg-required' => trans('labels.This field is required')]) !!}
            <label>@lang('ims::location.store')</label>
        </div>
        <div class="skin skin-flat">
            {!! Form::radio('type', '2', old('type'), ['class' => 'required', 'data-msg-required' => trans('labels.This field is required')]) !!}
            <label>@lang('ims::location.general')</label>
        </div>
        <div class="row col-md-12 radio-error">
            @if ($errors->has('type'))
                <span class="small text-danger"><strong>{{ $errors->first('type') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="col-6">
        {!! Form::label('description', __('ims::location.description'), ['class' => 'form-label required']) !!}
        {!! Form::textarea('description', old('description'), ['class' => "form-control", "required ", "placeholder" => __('ims::location.description'), 'data-rule-maxlength' => 5000, 'data-msg-maxlength'=>Lang::get('labels.At most 5000 characters'),
        'data-msg-required' => Lang::get('labels.This field is required')]) !!}
        <div class="help-block"></div>
        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-actions mb-lg-3">
    <button type="submit" class="btn btn-primary pull-right">
        <i class="la la-check-square-o"></i> {{trans('labels.save')}}
    </button>
    <a class="btn btn-warning pull-right" role="button" href="{{ route('location.index') }}" style="margin-left: 2px;">
        <i class="la la-times"></i> {{trans('labels.cancel')}}
    </a>
</div>
{{ Form::close() }}