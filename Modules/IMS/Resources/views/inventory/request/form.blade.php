@if($page === 'create')
{!! Form::open(['route' =>  ['inventory-request.store'], 'class' => 'form inventory-request-form']) !!}
@else
{!! Form::open(['route' =>  ['inventory-request.update', $inventoryRequest->id], 'class' => 'form inventory-request-form']) !!}
@method('put')
@endif

<h4 class="form-section"><i class="la la-tag"></i>@lang('ims::inventory.inventory_request')</h4>
<div class="row">
    <div class="col-md-7">
        <div class="form-group">
            {!! Form::label('title', trans('ims::inventory.inventory_request_title'), ['class' => 'form-label required']) !!}

            {!! Form::text('title', $page === 'create' ? old('title') : $inventoryRequest->title,
                [
                    'class' => 'form-control'. ($errors->has('title') ? ' is-invalid' : ''),
                    "required",
                    "placeholder" => trans('ims::inventory.inventory_request_title'),
                    'data-msg-required' => trans('validation.required', ['attribute' => trans('ims::inventory.inventory_request_title')]),
                    'data-rule-maxlength' => 100,
                    'data-msg-maxlength'=> trans('labels.At most 100 characters'),
                ])
            !!}
            <div class="help-block"></div>
            @if ($errors->has('title'))
                <span class="invalid-feedback">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::label('receiver_id', trans('labels.receiver'), ['class' => 'form-label required']) !!}
            {!! Form::select('receiver_id',
                ['' => trans('labels.select')] + $employeeOptions,
                $page === 'create' ? null : $inventoryRequest->receiver_id,
                [
                    'class'=>'form-control select required' . ($errors->has('employee_id') ? ' is-invalid' : ''),
                    'data-msg-required' => trans('validation.required', ['attribute' => trans('labels.receiver')]),
                ])
            !!}

            <div class="help-block"></div>
            @if ($errors->has('receiver_id'))
                <span class="invalid-feedback">{{ $errors->first('receiver_id') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('request_type', trans('ims::inventory.inventory_request_type'), ['class' => 'form-label required']) !!}
            {!! Form::select('request_type',
                ['' => trans('labels.select')] + trans('ims::inventory.inventory_request_types'),
                $page === 'create' ? $type : $inventoryRequest->type,
                [
                    'class'=>'form-control select required',
                    'data-msg-required' => trans('validation.required', ['attribute' => trans('ims::inventory.inventory_request_type')]),
                ])
            !!}

            <div class="help-block"></div>
            @if ($errors->has('request_type'))
                <span class="invalid-feedback">{{ $errors->first('request_type') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::label('from_location_id', trans('ims::location.from_location'), ['class' => 'form-label required']) !!}

            {!! Form::select('from_location_id',
                ['' => trans('labels.select')] + $fromLocations,
                $page === 'create' ? null : $inventoryRequest->from_location_id,
                [
                    'class'=>'form-control select required',
                    'data-msg-required' => trans('validation.required', ['attribute' => trans('ims::location.from_location')]),
                ])
            !!}

            <div class="help-block"></div>
            @if ($errors->has('from_location_id'))
                <span class="invalid-feedback">{{ $errors->first('from_location_id') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::label('to_location_id', trans('ims::location.to_location'), ['class' => 'form-label required']) !!}

            {!! Form::select('to_location_id',
                ['' => trans('labels.select')] + $toLocations,
                $page === 'create' ? null : $inventoryRequest->to_location_id,
                [
                    'class' => 'form-control select required',
                    'data-msg-required' => trans('validation.required', ['attribute' => trans('ims::location.to_location')]),
                ])
            !!}

            <div class="help-block"></div>
            @if ($errors->has('to_location_id'))
                <span class="invalid-feedback">{{ $errors->first('to_location_id') }}</span>
            @endif
        </div>
    </div>
</div>
@foreach($extra['loaded-views'] as $loadedView)
    @include('ims::inventory.request.partials.'. $loadedView)
@endforeach

<div class="form-actions text-center">
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i>@lang('labels.save')
    </button>
    <a class="btn btn-warning mr-1" role="button" href="{{url(route('inventory-request.index'))}}">
        <i class="ft-x"></i> @lang('labels.cancel')
    </a>
</div>
{!! Form::close() !!}