<div class="form-body">
    <h4 class="form-section"><i class="ft-at-sign"></i>{{ $formTitle }}</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="organization_id" class="form-label required">@lang('attribute.organization')</label>
                {!! Form::select('organization_id', $organizations, isset($attribute) ? $attribute->organization_id : null, ['class' => 'form-control select2' . ($errors->has('organization_id') ? ' is-invalid' : ''), 'placeholder' => trans('labels.select'), 'required']) !!}

                @if ($errors->has('organization_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('organization_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="form-label required">@lang('labels.name')</label>
                {!! Form::text('name', isset($attribute) ? $attribute->name : null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="unit" class="form-label required">@lang('attribute.unit')</label>
                {!! Form::text('unit', isset($attribute) ? $attribute->unit : null, ['class' => 'form-control' . ($errors->has('unit') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('unit'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('unit') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
            <i class="la la-check-square-o"></i> {{trans('labels.save')}}
        </button>
        <a class="btn btn-warning mr-1" role="button" href="{{ URL::previous() }}">
            <i class="ft-x"></i> {{trans('labels.cancel')}}
        </a>
    </div>
</div>
