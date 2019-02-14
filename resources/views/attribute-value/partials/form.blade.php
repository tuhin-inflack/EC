<div class="form-body">
    <h4 class="form-section"><i
                class="ft-at-sign"></i>@lang('attribute.attribute_value_input_form')
    </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="attribute"
                       class="form-label required">@lang('attribute.attribute_name')</label>
                {!! Form::text('attribute', $attribute->name, ['class' => 'form-control' . ($errors->has('attribute_id') ? ' is-invalid' : ''), 'disabled']) !!}
                {!! Form::hidden('attribute_id', $attribute->id) !!}

                @if ($errors->has('attribute_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('attribute_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="date"
                       class="form-label required">@lang('labels.date')</label>
                {!! Form::text('date', $pageType == 'create' ? null : \Carbon\Carbon::parse($attributeValue->date)->format('F Y'), [
                    'class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''),
                    'required', $pageType == 'edit' ? 'disabled' : '',
                    'autocomplete' => 'off'
                ]) !!}

                @if ($errors->has('date'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="value"
                       class="form-label required">@lang('attribute.planned_value')
                    <i>( {{ $attribute->unit }} )</i></label>
                {!! Form::number('planned_value', $pageType == 'create' ? null : $attributeValue->planned_value, ['class' => 'form-control' . ($errors->has('planned_value') ? ' is-invalid' : ''), 'required', 'min' => 0]) !!}

                @if ($errors->has('planned_value'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('planned_value') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="value"
                       class="form-label required">@lang('attribute.achieved_value')
                    <i>( {{ $attribute->unit }} )</i></label>
                {!! Form::number('achieved_value', $pageType == 'create' ? null : $attributeValue->achieved_value, ['class' => 'form-control' . ($errors->has('achieved_value') ? ' is-invalid' : ''), 'required', 'min' => 0]) !!}

                @if ($errors->has('achieved_value'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('achieved_value') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
            <i class="la la-check-square-o"></i> {{trans('labels.save')}}
        </button>
        <a class="btn btn-warning mr-1" role="button"
           href="{{ URL::previous() }}">
            <i class="ft-x"></i> {{trans('labels.cancel')}}
        </a>
    </div>
</div>