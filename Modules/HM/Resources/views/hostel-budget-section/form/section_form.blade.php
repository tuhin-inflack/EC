<div class="form-body">
    <h4 class="form-section"><i class="ft-grid"></i> Section form </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group {{ $errors->has('name') ? ' error' : '' }}">
                    {{ Form::label('name', 'Section Name') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'e.g. Maintenance ', 'required' => 'required', 'data-validation-required-message'=>'Enter Section name']) }}
                    <div class="help-block"></div>
                    @if ($errors->has('name'))
                        <div class="help-block">  {{ $errors->first('name') }}</div>
                    @endif
                </div>

                {{ Form::hidden('id', null) }}
            </div>
            <div class="form-actions col-md-12 ">
                <div class="pull-right">
                    {{ Form::button('<i class="la la-check-square-o"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                    <a href="{{ url('/hm/hostel-budget-section') }}">
                        <button type="button" class="btn btn-warning mr-1">
                            <i class="la la-times"></i> Cancel
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>

</div>