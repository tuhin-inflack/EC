{!! Form::open(['route' =>  'research.store', 'class' => 'research-submission-tab-steps wizard-circle']) !!}

<div class="form-body">
    <h4 class="form-section"><i
                class="la la-briefcase"></i> {{trans('rms::research_proposal.research_create_form')}}</h4>

    <div class="row">
        <div class="col-md-8 offset-2">
            <fieldset>
                <div class="form row">
                    {!! Form::hidden('submitted_by', $auth_user_id) !!}
                    <div class="form-group mb-1 col-sm-12 col-md-12">
                        <label class="form-label">@lang('rms::research_proposal.responded_by')</label>
                        {!! Form::text('title', $name, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                    <div class="form-group mb-1 col-sm-12 col-md-12">
                        <label class="form-label">@lang('rms::research_proposal.department')</label>
                        {!! Form::text('title', $departmentName, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                    <div class="form-group mb-1 col-sm-12 col-md-12">
                        <label class="form-label">@lang('rms::research_proposal.designation')</label>
                        {!! Form::text('title', $designation, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                    <div class="form-group mb-1 col-sm-12 col-md-12">
                        <label class="required">{{ trans('labels.title') }}</label>
                        <br>
                        {!! Form::text('title', old('title'), ['class' => 'form-control required' . ($errors->has('title') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'Title', 'data-rule-maxlength' => 100, 'data-msg-maxlength'=>Lang::get('labels.At most 100 characters')]) !!}

                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
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

    <a class="btn btn-warning mr-1" role="button" href="{{route('invited-research-proposal.index')}}">
        <i class="ft-x"></i> {{trans('labels.cancel')}}
    </a>
</div>
{!! Form::close() !!}


