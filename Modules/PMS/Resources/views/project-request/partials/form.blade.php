{!! Form::open(['route' => 'project-request.store', 'class' => 'project-request-tab-steps form', 'enctype' => 'multipart/form-data']) !!}
<div class="form-body">
    <h4 class="form-section"><i
                class="la la-briefcase"></i> {{trans('pms::project_proposal.request_form')}}</h4>

    <div class="row">
        <div class="col-md-8 offset-2">
            <fieldset>
                <div class="form row">
                    <div class="form-group mb-1 col-sm-12 col-md-12">
                        <label class="required">{{ trans('rms::research_proposal.send_to') }}</label>
                        <br>
                        {!! Form::select('receiver[]', $employees, null, ['class' => 'select2 form-control required'.($errors->has('receiver') ? ' is-invalid' : ''), 'multiple', 'data-msg-required' => Lang::get('labels.This field is required')]) !!}

                        @if ($errors->has('receiver'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('receiver') }}</strong>
                        </span>
                        @endif
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
                        <label class="required">{{ trans('rms::research_proposal.last_sub_date') }}</label>
                        {{ Form::text('end_date', date('j F, Y'), ['id' => 'end_date', 'class' => 'form-control required' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'Pick end date', 'data-msg-required' => Lang::get('labels.This field is required')]) }}
                        @if ($errors->has('end_date'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group mb-1 col-sm-12 col-md-12">
                        <label for="remarks" class="form-label">{{trans('labels.remarks')}}</label>
                        {!! Form::textarea('remarks', old('remarks'), ['class' => 'form-control' . ($errors->has('remarks') ? ' is-invalid' : ''), 'placeholder' => 'Write here...', 'cols' => 30, 'rows' => 5, 'data-rule-maxlength' => 5000, 'data-msg-maxlength'=>Lang::get('labels.At most 5000 characters')]) !!}

                        @if ($errors->has('remarks'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('remarks') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group mb-1 col-sm-12 col-md-12">
                        <label class="required">{{trans('rms::research_proposal.attachment')}}</label>
                        {!! Form::file('attachment[]', ['class' => 'form-control required' . ($errors->has('attachment') ? ' is-invalid' : ''), 'data-msg-required' => Lang::get('labels.This field is required'), 'accept' => '.doc, .docx, .xlx, .xlsx, .csv, .pdf', 'multiple' => 'multiple']) !!}

                        @if ($errors->has('attachment'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('attachment') }}</strong>
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

    <a class="btn btn-warning mr-1" role="button" href="{{route('project-request.index')}}">
        <i class="ft-x"></i> {{trans('labels.cancel')}}
    </a>
</div>
{!! Form::close() !!}
