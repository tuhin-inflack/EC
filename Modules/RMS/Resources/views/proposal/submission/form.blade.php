{!! Form::open(['route' =>  'research-request.store', 'class' => 'research-submission-tab-steps wizard-circle', 'enctype' => 'multipart/form-data']) !!}
<div class="form-body">
    <h4 class="form-section"><i
                class="la la-briefcase"></i> {{trans('rms::research_proposal.request_form')}}</h4>

    <div class="row">
        <div class="col-md-8 offset-2">
            <fieldset>
                <div class="form row">
                    {!! Form::hidden('auth_user_id', $auth_user_id) !!}
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
                        {!! Form::text('title', old('title'), ['class' => 'form-control required' . ($errors->has('designation') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'placeholder' => 'Title', 'data-rule-maxlength' => 100, 'data-msg-maxlength'=>Lang::get('labels.At most 100 characters')]) !!}

                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group mb-1 col-sm-12 col-md-12">
                        <label class="required">{{ trans('rms::research_proposal.sub_start_date') }}</label>
                        {{ Form::text('start_date', date('j F, Y'), ['id' => 'start_date', 'class' => 'form-control required' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Pick end date', 'data-msg-required' => Lang::get('labels.This field is required')]) }}
                        @if ($errors->has('start_date'))
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('start_date') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group mb-1 col-sm-12 col-md-12">
                        <label class="required">{{ trans('rms::research_proposal.last_sub_date') }}</label>
                        {{ Form::text('end_date', date('j F, Y'), ['id' => 'end_date', 'class' => 'form-control required' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'Pick end date', 'data-msg-required' => Lang::get('labels.This field is required')]) }}
                        @if ($errors->has('end_date'))
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('end_date') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group mb-1 col-sm-12 col-md-12">
                        <label class="required">{{trans('rms::research_proposal.description')}}</label>
                        {!! Form::textarea('description', old('description'), ['class' => 'form-control ckeditor required' . ($errors->has('description') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'id' => 'ckeditor', 'cols' => 30, 'rows' => 15, 'data-rule-maxlength' => 5000, 'data-msg-maxlength'=>Lang::get('labels.At most 5000 characters')]) !!}
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group mb-1 col-sm-12 col-md-12">
                        <label class="required">{{trans('rms::research_proposal.attachment')}}</label>
                        {!! Form::file('attachments[]', ['class' => 'form-control required' . ($errors->has('attachments') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'accept' => '.doc, .docx, .xlx, .xlsx, .csv, .pdf', 'multiple' => 'multiple']) !!}

                        @if ($errors->has('attachments'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('attachments') }}</strong>
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



