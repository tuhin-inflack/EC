<div class="form-body">
    <h4 class="form-section"><i class="ft-grid"></i> {{ trans('hm::hostel_budget.section_form') }}</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group {{ $errors->has('name') ? ' error' : '' }}">
                    {{ Form::label('name', trans('hm::hostel_budget.section'), ['class' => 'required']) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'e.g. Maintenance ', 'required' => 'required', 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('labels.name')])]) }}
                    <div class="help-block"></div>
                    @if ($errors->has('name'))
                        <div class="help-block">  {{ $errors->first('name') }}</div>
                    @endif
                </div>

                {{ Form::hidden('id', null) }}
            </div>
            <div class="form-actions col-md-12 ">
                <div class="pull-right">
                    {{ Form::button('<i class="la la-check-square-o"></i> '. trans('labels.save'), ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                    <a href="{{ url('/hm/hostel-budget-section') }}">
                        <button type="button" class="btn btn-warning mr-1">
                            <i class="la la-times"></i> {{ trans('labels.cancel') }}
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>

</div>