{!! Form::open(['route' =>  'project.store', 'class' => 'project-submission-tab-steps wizard-circle']) !!}

<div class="form-body">
    <h4 class="form-section"><i
                class="la la-briefcase"></i> {{trans('pms::project_proposal.project_create_form')}}</h4>

    <div class="row">
        <div class="col-md-8 offset-2">
            <fieldset>
                <div class="form row">
                    {!! Form::hidden('submitted_by', $auth_user_id) !!}
                    <div class="form-group mb-1 col-sm-12 col-md-12">
                        <label class="required">@lang('pms::project_proposal.project_name')</label>
                        <br>
                        {!! Form::text('title', old('title'), ['class' => 'form-control required' . ($errors->has('title') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => Lang::get('pms::project_proposal.project_name'), 'data-rule-maxlength' => 100, 'data-msg-maxlength'=>Lang::get('labels.At most 100 characters')]) !!}

                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                        <br>
                        <!-- Budget-->
                        <label class="required">@lang('pms::project_proposal.project_budget')</label>
                        <br>
                        {!! Form::number('budget', old('budget'), ['class' => 'form-control required' . ($errors->has('budget') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => Lang::get('pms::project_proposal.project_budget'),  'min="1"']) !!}

                        @if ($errors->has('budget'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('budget') }}</strong>
                        </span>
                        @endif
                        <br>

                        <!-- Duration-->
                        <label class="required">@lang('pms::project_proposal.project_duration')</label>
                        <br>
                        {!! Form::number('duration', old('duration'), ['class' => 'form-control required' . ($errors->has('duration') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => Lang::get('pms::project_proposal.project_duration'),  'min="1"' ]) !!}

                        @if ($errors->has('duration'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('duration') }}</strong>
                        </span>
                        @endif


                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<div class="form-actions text-center">
    {!! Form::button('<i class="la la-check-square-o"></i> '.trans('labels.save') , ['type' => 'submit', 'class' => 'btn btn-primary'] ) !!}

    <a class="btn btn-warning mr-1" role="button" href="{{route('project.index')}}">
        <i class="ft-x"></i> {{trans('labels.cancel')}}
    </a>
</div>
{!! Form::close() !!}



