@if($page === 'create')
{!! Form::open(['route' =>  ['inventory-request.store'], 'class' => 'form inventory-request-form']) !!}
@else
{!! Form::open(['route' =>  ['inventory-request.update', $inventoryRequest->id], 'class' => 'form inventory-request-form']) !!}
@method('put')
@endif

<h4 class="form-section"><i class="la la-tag"></i>@lang('ims::inventory.inventory_request')</h4>
<div class="row">
    <div class="col-md-6">
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
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('type', trans('ims::inventory.inventory_request') .' '. trans('labels.type'), ['class' => 'form-label required']) !!}
            {!! Form::select('type',
                trans('ims::inventory.inventory_request_types'),
                $page === 'create' ? null : $inventoryRequest->type,
                [
                    'class'=>'form-control required'
                ])
            !!}

            <div class="help-block"></div>
            @if ($errors->has('type'))
                <span class="invalid-feedback">{{ $errors->first('type') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('unit', trans('labels.unit'), ['class' => 'form-label required']) !!}
            {!! Form::text('unit', $page === 'create' ? old('unit') : $draftProposalBudget->unit, ['class' => 'form-control'.($errors->has('unit') ? ' is-invalid' : ''), 'required',
            'data-validation-required-message'=>trans('validation.required', ['attribute' => trans('labels.unit')])]) !!}

            <div class="help-block"></div>
            @if ($errors->has('unit'))
                <span class="invalid-feedback">{{ $errors->first('unit') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('unit_rate', trans('labels.unit_rate'), ['class' => 'form-label required']) !!}
            {!! Form::number('unit_rate', $page === 'create' ? old('unit_rate') : $draftProposalBudget->unit_rate, ['class' => 'form-control'.($errors->has('unit_rate') ? ' is-invalid' : ''), 'required',
            'data-validation-required-message'=>trans('validation.required', ['attribute' => trans('labels.unit_rate')])]) !!}

            <div class="help-block"></div>
            @if ($errors->has('unit_rate'))
                <span class="invalid-feedback">{{ $errors->first('unit_rate') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group toggle-content-form">
            {!! Form::label('quantity', trans('labels.quantity'), ['class' => 'form-label required']) !!}
            {!! Form::number('quantity', $page === 'create' ? old('quantity') : $draftProposalBudget->quantity, ['class' => 'form-control'.($errors->has('quantity') ? ' is-invalid' : ''), 'required',
            'data-validation-required-message'=>trans('validation.required', ['attribute' => trans('labels.quantity')])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('quantity'))
                <span class="invalid-feedback">{{ $errors->first('quantity') }}</span>
            @endif
        </div>
        <div class="form-group toggle-content-text" style="display: none">
            <label class="form-label">@lang('labels.total') @lang('draft-proposal-budget.revenue') @lang('labels.and') @lang('draft-proposal-budget.capital')</label>
            <br>
            <label class="form-control total-capital-revenue"></label>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group toggle-content-form">
            {!! Form::label('total_expense', trans('labels.total').' '.trans('labels.expense'), ['class' => 'form-label required']) !!}
            {!! Form::number('total_expense', $page === 'create' ? old('total_expense') : $draftProposalBudget->total_expense, ['class' => 'form-control'.($errors->has('total_expense') ? ' is-invalid' : ''),
            'readonly', 'data-validation-required-message'=>trans('validation.required', ['attribute' => trans('labels.total').' '.trans('labels.expense')])]) !!}

            <div class="help-block"></div>
            @if ($errors->has('total_expense'))
                <span class="invalid-feedback">{{ $errors->first('total_expense') }}</span>
            @endif
        </div>
        <div class="form-group toggle-content-text" style="display: none">
            <label class="form-label">@lang('labels.total') @lang('labels.amount')</label>
            <br>
            <label class="form-control total-expense-based-percentage">0</label>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('total_expense_percentage', trans('labels.total').' '.trans('labels.expense').' '.trans('draft-proposal-budget.percentage'), ['class' => 'form-label required']) !!}
            {!! Form::number('total_expense_percentage', $page === 'create' ? old('total_expense_percentage') : $draftProposalBudget->total_expense_percentage, ['class' => 'form-control'.($errors->has('total_expense_percentage') ? ' is-invalid' : ''),
            'disabled']) !!}

            <div class="help-block"></div>
            @if ($errors->has('total_expense_percentage'))
                <span class="invalid-feedback">{{ $errors->first('total_expense_percentage') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th rowspan="2" width="4%"># SL</th>
                <th rowspan="2">@lang('accounts::fiscal-year.title')</th>
                <th colspan="2">@lang('draft-proposal-budget.monetary_amount')</th>

            </tr>
            <tr>
                <th>(@lang('draft-proposal-budget.lac_bdt'))</th>
                <th>(@lang('draft-proposal-budget.percentage')) %</th>
            </tr>
            </thead>
            <tbody id="fiscal-values">
            @if($page === 'create')
                @for($i = 0; $i <= 4; $i++)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td><input type="text" name="fiscal_year[{{ $i }}]" class="form-control"></td>
                        <td><input type="number" name="monetary_amount[{{ $i }}]" min="0" class="form-control"></td>
                        <td><input type="number" name="monetary_percentage[{{ $i }}]" min="0" class="form-control"></td>
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
                        <td>
                            <input type="number" name="monetary_percentage[{{$i}}]" min="0" class="form-control" value="{{ isset($draftProposalBudget->budgetFiscalValue[$i]) ?
                                   $draftProposalBudget->budgetFiscalValue[$i]->monetary_percentage : null }}">
                        </td>
                    </tr>
                @endfor
            @endif
            </tbody>
        </table>
        <input type="hidden" name="check_distributed_fiscalyear" value="0">
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('gov_source', trans('draft-proposal-budget.gov').' ('.trans('draft-proposal-budget.foreign_currency').')', ['class' => 'form-label required']) !!}
            {!! Form::number('gov_source', $page === 'create' ? old('gov_source') : $draftProposalBudget->gov_source, ['class' => 'form-control'.($errors->has('gov_source') ? ' is-invalid' : ''), 'required',
            'min'=> '0', 'data-validation-required-message'=> trans('validation.required', ['attribute' => trans('draft-proposal-budget.gov')])]) !!}

            <div class="help-block"></div>
            @if ($errors->has('gov_source'))
                <span class="invalid-feedback">{{ $errors->first('gov_source') }}</span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('own_financing_source', trans('draft-proposal-budget.own_financing').' ('.trans('draft-proposal-budget.foreign_currency').')', ['class' => 'form-label required']) !!}
            {!! Form::number('own_financing_source', $page === 'create' ? old('own_financing_source') : $draftProposalBudget->own_financing_source, ['class' => 'form-control'.($errors->has('own_financing_source') ? ' is-invalid' : ''), 'required',
            'min'=> '0', 'data-validation-required-message'=> trans('validation.required', ['attribute' => trans('draft-proposal-budget.own_financing')])]) !!}

            <div class="help-block"></div>
            @if ($errors->has('own_financing_source'))
                <span class="invalid-feedback">{{ $errors->first('own_financing_source') }}</span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('other_source', trans('draft-proposal-budget.other'), ['class' => 'form-label required']) !!}
            {!! Form::number('other_source', $page === 'create' ? old('other_source') : $draftProposalBudget->other_source, ['class' => 'form-control'.($errors->has('other_source') ? ' is-invalid' : ''), 'required',
            'min'=> '0', 'data-validation-required-message'=>trans('validation.required', ['attribute' => trans('draft-proposal-budget.other')])]) !!}

            <div class="help-block"></div>
            @if ($errors->has('other_source'))
                <span class="invalid-feedback">{{ $errors->first('other_source') }}</span>
            @endif
        </div>
        <input type="hidden" name="check_distributed_collection" value="0">
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