{!! Form::open(['route' =>  ['project-budget.store', $project->id], 'class' => 'form project-budget-form']) !!}

<h4 class="form-section"><i class="la la-tag"></i>@lang('pms::project_budget.title')</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('code', trans('labels.code'), ['class' => 'form-label']) !!} <span class="danger">*</span>
            {!! Form::number('code', old('code'), ['class' => 'form-control'.($errors->has('code') ? ' is-invalid' : ''), 'required',
            "placeholder" => "e.g 1152154", 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('labels.code')])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('code'))
                <span class="invalid-feedback">{{ $errors->first('code') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('english_name', trans('labels.name') .' (English)', ['class' => 'form-label required']) !!} <span class="danger">*</span>
            {!! Form::text('english_name', old('english_name'), ['class' => 'form-control'.($errors->has('english_name') ? ' is-invalid' : ''), 'required',
            "placeholder" => "e.g Assets", 'data-validation-required-message'=>trans('validation.required', ['attribute' => trans('labels.name')])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('english_name'))
                <span class="invalid-feedback">{{ $errors->first('english_name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', trans('labels.name') .' (বাংলা)', ['class' => 'form-label required']) !!} <span class="danger">*</span>
            {!! Form::text('bangla_name', old('bangla_name'), ['class' => 'form-control'.($errors->has('bangla_name') ? ' is-invalid' : ''), 'required',
            "placeholder" => "e.g Assets", 'data-validation-required-message'=>trans('validation.required', ['attribute' => trans('labels.name')])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('bangla_name'))
                <span class="invalid-feedback">{{ $errors->first('bangla_name') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('description', trans('labels.description'), ['class' => 'form-label required']) !!}
            {!! Form::textarea('description', old('description'), ['rows' => '2', 'class' => 'form-control'.($errors->has('description') ? ' is-invalid' : ''),
            "placeholder" => trans('labels.description')]) !!}
            <div class="help-block"></div>
            @if ($errors->has('description'))
                <span class="invalid-feedback">{{ $errors->first('description') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="form-actions text-center">
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i>@lang('labels.save')
    </button>
    <a class="btn btn-warning mr-1" role="button" href="{{url(route('project-budget', $project->id))}}">
        <i class="ft-x"></i> @lang('labels.cancel')
    </a>
</div>
{!! Form::close() !!}
