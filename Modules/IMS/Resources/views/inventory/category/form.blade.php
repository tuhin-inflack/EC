{{ Form::open(['route' =>  'inventory-item-category.store', 'class' => 'inventory-tab-steps wizard-circle']) }}

<h4 class="form-section"><i class="la la-building"></i> @lang('ims::inventory.new_item_category')</h4>
<div class="row">
    <div class="col-6">
        {!! Form::label('name', __('labels.name'), ['class' => 'form-label required']) !!}
        {!! Form::text('name', old('name'),['class' => "form-control", "required ", "placeholder" => __('labels.name'), 'data-rule-maxlength' => 100, 'data-msg-maxlength'=>Lang::get('labels.At most 100 characters'),
        'data-msg-required' => Lang::get('labels.This field is required')]) !!}
        <div class="help-block"></div>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    {{--<div class="col-6">
        {!! Form::label('short_code', __('ims::inventory.short_code'), ['class' => 'form-label required']) !!}
        {!! Form::text('short_code', old('short_code'),['class' => "form-control", "required ", "placeholder" => __('ims::inventory.short_code'), 'data-rule-maxlength' => 100, 'data-msg-maxlength'=>Lang::get('labels.At most 100 characters'),
        'data-msg-required' => Lang::get('labels.This field is required')]) !!}
        <div class="help-block"></div>
        @if ($errors->has('short_code'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('short_code') }}</strong>
            </span>
        @endif
    </div>--}}
    <div class="form-group col-md-6">
        {!! Form::label('type', __('ims::inventory.type'), ['class' => 'form-label required']) !!}
        <div class="skin skin-flat">
            {!! Form::radio('type', '1', old('type'), ['class' => 'required', 'data-msg-required' => trans('labels.This field is required')]) !!}
            <label>@lang('ims::inventory.fixed_asset')</label>
        </div>
        <div class="skin skin-flat">
            {!! Form::radio('type', '2', old('type'), ['class' => 'required', 'data-msg-required' => trans('labels.This field is required')]) !!}
            <label>@lang('ims::inventory.stationery')</label>
        </div>
        <div class="row col-md-12 radio-error">
            @if ($errors->has('type'))
                <span class="small text-danger"><strong>{{ $errors->first('type') }}</strong></span>
            @endif
        </div>
    </div>
</div>
<div class="row mt-lg-2">
    <div class="col-6">
        {!! Form::label('unit', __('ims::inventory.unit'), ['class' => 'form-label required']) !!}
        {!! Form::text('unit', old('unit'),['class' => "form-control", "required ", "placeholder" => __('ims::inventory.unit'), 'data-rule-maxlength' => 100, 'data-msg-maxlength'=>Lang::get('labels.At most 100 characters'),
        'data-msg-required' => Lang::get('labels.This field is required')]) !!}
        <div class="help-block"></div>
        @if ($errors->has('unit'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('unit') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-actions mb-lg-3">
    <a class="btn btn-warning pull-right" role="button" href="{{ route('inventory.warehouse.list') }}" style="margin-left: 2px;">
        <i class="la la-times"></i> {{trans('labels.cancel')}}
    </a>
    <button type="submit" class="btn btn-primary pull-right">
        <i class="la la-check-square-o"></i> {{trans('labels.save')}}
    </button>
</div>
{{ Form::close() }}