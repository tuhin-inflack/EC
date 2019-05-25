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
                    "data-validation-required-message" => trans('validation.required', ['attribute' => trans('ims::inventory.inventory_request_title')])
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
                $employeeOptions,
                $page === 'create' ? null : $inventoryRequest->receiver_id,
                [
                    'class'=>'form-control select required' . ($errors->has('employee_id') ? ' is-invalid' : ''),
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
                trans('ims::inventory.inventory_request_types'),
                $page === 'create' ? null : $inventoryRequest->type,
                [
                    'class'=>'form-control select required'
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
                $fromLocations,
                $page === 'create' ? null : $inventoryRequest->from_location_id,
                [
                    'class'=>'form-control select required'
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
                $toLocations,
                $page === 'create' ? null : $inventoryRequest->to_location_id,
                [
                    'class' => 'form-control select required'
                ])
            !!}

            <div class="help-block"></div>
            @if ($errors->has('to_location_id'))
                <span class="invalid-feedback">{{ $errors->first('to_location_id') }}</span>
            @endif
        </div>
    </div>
</div>
<h4 class="form-section"><i class="la la-tag"></i>@lang('ims::inventory.inventory_request')</h4>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered repeater-category-request">
                <thead>
                    <tr>
                        <th width="60%">@lang('ims::product.title')</th>
                        <th>@lang('labels.quantity')</th>
                        <th width="1%"><i data-repeater-create class="la la-plus-circle text-info" style="cursor: pointer"></i></th>
                    </tr>
                </thead>
                <tbody data-repeater-list="category">
                    <tr data-repeater-item>
                        <td>
                            {!! Form::select('category_id',
                                    $itemCategories,
                                    null,
                                    ['class' => 'form-control required']
                                )
                            !!}
                        </td>
                        <td>
                            {{ Form::number('quantity', null, [
                                'class' => 'form-control',
                                'min' => 1
                            ]) }}
                        </td>
                        <td><i data-repeater-delete class="la la-trash-o text-danger" style="cursor: pointer"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="toggle-category-entry">
<h4 class="form-section"><i class="la la-tag"></i> @lang('labels.new') @lang('ims::inventory.inventory_request')</h4>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered repeater-new-category-request">
                <thead>
                    <tr>
                        <th>@lang('ims::product.title') @lang('labels.name')</th>
                        <th>@lang('ims::inventory.unit')</th>
                        <th>@lang('ims::inventory.type')</th>
                        <th>@lang('labels.quantity')</th>
                        <th width="1%"><i data-repeater-create class="la la-plus-circle text-info" style="cursor: pointer"></i></th>
                    </tr>
                </thead>
                <tbody data-repeater-list="new-category">
                    <tr data-repeater-item>
                        <td>
                            {{ Form::text('name',
                                    null,
                                    ['class' => 'form-control']
                                )
                            }}
                        </td>
                        <td>
                            {{ Form::text('unit',
                                    null,
                                    ['class' => 'form-control']
                                )
                            }}
                        </td>
                        <td>
                            {!! Form::select('type',
                                    [
                                        '1' => trans('ims::inventory.fixed_asset'),
                                        '2' => trans('ims::inventory.stationery'),
                                    ],
                                    null,
                                    ['class' => 'form-control required']
                                )
                            !!}
                        </td>
                        <td>
                            {{ Form::number('quantity',
                                    null,
                                    ['class' => 'form-control', 'min' => 1]
                                )
                            }}
                        </td>
                        <td><i data-repeater-delete class="la la-trash-o text-danger" style="cursor: pointer"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<h4 class="form-section"><i class="la la-tag"></i>@lang('ims::inventory.inventory_request')</h4>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive form-group">
            <table class="table table-bordered repeater-bought-category-request">
                <thead>
                    <tr>
                        <th width="60%">@lang('ims::product.title')</th>
                        <th>@lang('labels.quantity')</th>
                        <th width="1%"><i data-repeater-create class="la la-plus-circle text-info" style="cursor: pointer"></i></th>
                    </tr>
                </thead>
                <tbody data-repeater-list="bought-category">
                    <tr data-repeater-item>
                        <td>
                            {!! Form::select('category_id',
                                    $itemCategories,
                                    null,
                                    ['class' => 'form-control']
                                )
                            !!}
                        </td>
                        <td>
                            {{ Form::number('quantity', null, [
                                'class' => 'form-control',
                                'min' => 1
                            ]) }}
                        </td>
                        <td><i data-repeater-delete class="la la-trash-o text-danger" style="cursor: pointer"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<div class="form-actions text-center">
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i>@lang('labels.save')
    </button>
    <a class="btn btn-warning mr-1" role="button" href="{{url(route('inventory-request.index'))}}">
        <i class="ft-x"></i> @lang('labels.cancel')
    </a>
</div>
{!! Form::close() !!}