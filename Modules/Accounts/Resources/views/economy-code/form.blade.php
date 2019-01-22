@if($page == 'create')
    {!! Form::open(['route' =>  'economy-code.store', 'class' => 'form', 'novalidate']) !!}
@else
    {!! Form::open(['route' => [ 'economy-code.update', $economyCode->id]]) !!}
    @method('PUT')
@endif
<h4 class="form-section"><i class="la la-tag"></i>@lang('accounts::economy-code.title')</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('code', trans('labels.name'), ['class' => 'form-label required']) !!}
            {!! Form::text('code', $page == 'create' ? old('code') : $economyCode->code, ['class' => 'form-control'.($errors->has('code') ? ' is-invalid' : ''), 'required',
            "placeholder" => "e.g AC Single", 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('labels.code')])]) !!}
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
            {!! Form::label('english_name', __('labels.name'), ['class' => 'form-label required']) !!}
            {!! Form::text('english_name', $page == 'create' ? old('english_name') : $economyCode->english_name, ['class' => 'form-control'.($errors->has('english_name') ? ' is-invalid' : ''), 'required',
            "placeholder" => "e.g AC Single", 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('labels.name')])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('english_name'))
                <span class="invalid-feedback">{{ $errors->first('english_name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', __('labels.name'), ['class' => 'form-label required']) !!}
            {!! Form::text('bangla_name', $page == 'create' ? old('bangla_name') : $economyCode->bangla_name, ['class' => 'form-control'.($errors->has('bangla_name') ? ' is-invalid' : ''), 'required',
            "placeholder" => "e.g AC Single", 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('labels.name')])]) !!}
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
            {!! Form::label('description', __('labels.name'), ['class' => 'form-label required']) !!}
            {!! Form::textarea('description', $page == 'create' ? old('description') : $economyCode->description, ['class' => 'form-control'.($errors->has('description') ? ' is-invalid' : ''), 'required',
            "placeholder" => "e.g AC Single", 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('labels.name')])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('description'))
                <span class="invalid-feedback">{{ $errors->first('description') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="form-actions text-center">
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i>{{$page == 'create' ? __('labels.save') : __('labels.update')}}
    </button>
    <a class="btn btn-warning mr-1" role="button" href="{{url(route('economy-code.index'))}}">
        <i class="ft-x"></i> @lang('labels.cancel')
    </a>
</div>
{!! Form::close() !!}
