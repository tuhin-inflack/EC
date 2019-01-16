<div class="form-body">
    <h4 class="form-section"><i class="ft-grid"></i> Organization add form </h4>
    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                {{--{{ dd($organizations->pluck('name', 'id')) }}--}}
                <div class="form-group {{ $errors->has('department_code') ? ' error' : '' }}">
                    {{ Form::label('organization_id', 'Add organization for ( ' .  $proposal->title ." )") }}
                    {{ Form::select('organization_id',  $organizations->pluck('name', 'id'), null,
                    ['class' => 'form-control addSelect2Class', 'placeholder' =>trans('labels.select'), 'data-validation-required-message'=>trans('labels.This field is required')]) }}

                    <div class="help-block"></div>
                    @if ($errors->has('department_code'))
                        <div class="help-block">  {{ $errors->first('department_code') }}</div>
                    @endif
                </div>
                {{ Form::hidden('type', $type) }}
                {{ Form::hidden('organization_for_id', $proposal->id) }}

            </div>
            <div class="form-actions col-md-12 ">
                <div class="pull-right">
                    {{ Form::button('<i class="la la-check-square-o"></i>'.trans('labels.save'), ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                    <a href="{{ route('project-proposal-submitted.index') }}">
                        <button type="button" class="btn btn-warning mr-1">
                            <i class="la la-times"></i> @lang('labels.cancel')
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>

</div>