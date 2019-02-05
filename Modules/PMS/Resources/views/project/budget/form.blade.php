{!! Form::open(['route' =>  ['project-budget.store', $project->id], 'class' => 'form project-budget-form']) !!}

{!! Form::hidden('project_id',$project->id) !!}
<h4 class="form-section"><i class="la la-tag"></i>@lang('pms::project_budget.title')</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('economy_code_id', trans('accounts::economy-code.title'), ['class' => 'form-label']) !!} <span class="danger">*</span>
            {!! Form::select('economy_code_id',$economyCodeOptions, null, ['class'=>'form-control economy-code-select required']) !!}
            <div class="help-block"></div>
            @if ($errors->has('economy_code_id'))
                <span class="invalid-feedback">{{ $errors->first('economy_code_id') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('section_type', trans('pms::project_budget.section_type') , ['class' => 'form-label']) !!} <span class="danger">*</span>
            {!! Form::select('section_type',$sectionTypes, null, ['class'=>'form-control section-type-select required']) !!}

            <div class="help-block"></div>
            @if ($errors->has('english_name'))
                <span class="invalid-feedback">{{ $errors->first('english_name') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('unit', trans('labels.unit'), ['class' => 'form-label required']) !!} <span class="danger">*</span>
            {!! Form::text('unit', old('unit'), ['class' => 'form-control'.($errors->has('unit') ? ' is-invalid' : ''), 'required',
            'data-validation-required-message'=>trans('validation.required', ['attribute' => trans('labels.unit')])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('unit'))
                <span class="invalid-feedback">{{ $errors->first('unit') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('unit_rate', trans('labels.unit_rate'), ['class' => 'form-label required']) !!} <span class="danger">*</span>
            {!! Form::number('unit_rate', old('unit_rate'), ['class' => 'form-control'.($errors->has('unit_rate') ? ' is-invalid' : ''), 'required',
            'data-validation-required-message'=>trans('validation.required', ['attribute' => trans('labels.unit_rate')])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('unit_rate'))
                <span class="invalid-feedback">{{ $errors->first('unit_rate') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('quantity', trans('labels.quantity'), ['class' => 'form-label required']) !!} <span class="danger">*</span>
            {!! Form::number('quantity', old('quantity'), ['class' => 'form-control'.($errors->has('quantity') ? ' is-invalid' : ''), 'required',
            'data-validation-required-message'=>trans('validation.required', ['attribute' => trans('labels.quantity')])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('quantity'))
                <span class="invalid-feedback">{{ $errors->first('quantity') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('total_expense', trans('labels.total').' '.trans('labels.expense'), ['class' => 'form-label required']) !!} <span class="danger">*</span>
            {!! Form::number('total_expense', old('total_expense'), ['class' => 'form-control'.($errors->has('total_expense') ? ' is-invalid' : ''), 'required',
            'readonly', 'data-validation-required-message'=>trans('validation.required', ['attribute' => trans('labels.total_expense')])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('total_expense'))
                <span class="invalid-feedback">{{ $errors->first('total_expense') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="4%"># SL</th>
                    <th>Fiscal Year</th>
                    <th>@lang('pms::project_budget.monetary_amount') (@lang('pms::project_budget.lac_bdt'))</th>
                    <th>@lang('pms::project_budget.body_percentage')</th>
                    <th>@lang('pms::project_budget.project_percentage')</th>
                    {{--<th width="4%"><i class="la la-plus-circle text-primary add-fiscal-value-row"></i></th>--}}
                </tr>
            </thead>
            <tbody id="fiscal-values">
                @for($i = 1; $i <= 5; $i++)
                    <tr>
                        <td>{{$i}}</td>
                        <td><input type="text" name="fiscal_year[]" class="form-control"></td>
                        <td><input type="number" name="monetary_amount[]" min="1" class="form-control"></td>
                        <td><input type="number" name="body_percentage[]" min="1"class="form-control"></td>
                        <td><input type="number" name="project_percentage[]" min="1" class="form-control"></td>
                        {{--<td><i class="la la-trash-o text-danger remove-item"></i></td>--}}
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
<div class="form-actions text-center">
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i>@lang('labels.save')
    </button>
    <a class="btn btn-warning mr-1" role="button" href="{{url(route('project-budget.index', $project->id))}}">
        <i class="ft-x"></i> @lang('labels.cancel')
    </a>
</div>
{!! Form::close() !!}
