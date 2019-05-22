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
                    "data-validation-required_message" => trans('validation.required', ['attribute' => trans('ims::inventory.inventory_request_title')])
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
                $page === 'create' ? null : $inventoryRequest->type,
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
            {!! Form::label('type', trans('ims::inventory.inventory_location'), ['class' => 'form-label required']) !!}
            {!! Form::select('type',
                trans('ims::inventory.inventory_request_types'),
                $page === 'create' ? null : $inventoryRequest->type,
                [
                    'class'=>'form-control select required'
                ])
            !!}

            <div class="help-block"></div>
            @if ($errors->has('type'))
                <span class="invalid-feedback">{{ $errors->first('type') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::label('from_location_id', trans('ims::inventory.inventory_request_type'), ['class' => 'form-label required']) !!}

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
            {!! Form::label('to_location_id', trans('ims::inventory.inventory_request_type'), ['class' => 'form-label required']) !!}

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
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th rowspan="2" width="4%"># SL</th>
                <th rowspan="2">@lang('ims::product.title')</th>
                <th colspan="2">@lang('labels.quantity')</th>
            </tr>
            </thead>
            <tbody id="category-table">
            @if($page === 'create')
                @for($i = 0; $i <= 4; $i++)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td><input type="text" name="fiscal_year[{{ $i }}]" class="form-control"></td>
                        <td><input type="number" name="monetary_amount[{{ $i }}]" min="0" class="form-control"></td>
                    </tr>
                @endfor
            @elseif($page === 'edit')
                @for($i = 0; $i <= 4; $i++)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>
                            <input type="text" name="fiscal_year[{{$i}}]" class="form-control"
                                   value="{{ isset($draftProposalBudget->budgetFiscalValue[$i]) ?
                                   $draftProposalBudget->budgetFiscalValue[$i]->fiscal_year : null}}">
                        </td>
                        <td>
                            <input type="number" name="monetary_amount[{{$i}}]" min="0" class="form-control" value="{{ isset($draftProposalBudget->budgetFiscalValue[$i]) ?
                                   $draftProposalBudget->budgetFiscalValue[$i]->monetary_amount : null }}">
                        </td>
                    </tr>
                @endfor
            @endif
            </tbody>
        </table>
        <input type="hidden" name="check_distributed_fiscalyear" value="0">
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