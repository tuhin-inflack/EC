<div class="form-body">
    <h4 class="form-section"><i class="ft-grid"></i> Department form </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group {{ $errors->has('name') ? ' error' : '' }}">
                    {{ Form::label('name', 'Department Name') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Human Resource', 'required' => 'required', 'data-validation-required-message'=>'Enter department name']) }}
                    <div class="help-block"></div>
                    @if ($errors->has('name'))
                        <div class="help-block">  {{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group ">
                    {{ Form::label('name', 'Department Code') }}
                    {{ Form::text('department_code', null, ['class' => 'form-control', 'placeholder' => 'HR']) }}
                </div>
            </div>
            <div class="form-actions col-md-12 ">
                <div class="pull-right">
                    {{ Form::button('<i class="la la-check-square-o"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                    <a href="{{ url('/hrm/department') }}">
                        <button type="button" class="btn btn-warning mr-1">
                            <i class="la la-times"></i> Cancel
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>

</div>