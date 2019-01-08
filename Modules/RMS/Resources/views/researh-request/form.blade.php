<div class="row match-height">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"
                >{{trans('rms::research_proposal.research_proposal_request_creation')}}</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    {!! Form::open(['route' => 'research-request.store', 'class' => 'form research-request-form', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-body">
                        <h4 class="form-section"><i
                                    class="la la-briefcase"></i> {{trans('rms::research_proposal.request_form')}}</h4>

                        <div class="row">
                            <div class="col-md-8 offset-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('to', __('rms::research_proposal.send_to'), ['class' => 'form-label']) !!}

                                            {!! Form::select('to[]', [
                                            'AK' => 'Shadnan Ahmed - Software Engineer',
                                            'HI' => 'Mehedi Hasan - Senior Software Engineer',
                                            'RR' => 'Sahib Bin Ron - Cheif Executive Officer'
                                            ], null,
                                            ['class'=>'form-control select2'.($errors->has('title') ? ' is-invalid' : ''), 'required',
                                             'data-validation-required-message'=>trans('validation.required', ['attribute' => __('rms::research_proposal.title')]), 'multiple']) !!}

                                            <span class="select-error"></span>
                                            @if ($errors->has('to'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('to') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('title', __('labels.title'), ['class' => 'form-label required']) !!}
                                            {!! Form::text('title', old('title'), ['class' => 'form-control'.($errors->has('title') ? ' is-invalid' : ''), 'required',
                                             'data-validation-required-message'=>trans('validation.required', ['attribute' => __('labels.title')])]) !!}
                                            <div class="help-block"></div>
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('end_date', __('rms::research_proposal.last_sub_date'), ['class' => 'form-label required']) !!}
                                            {{ Form::text('end_date', date('j F, Y'), ['id' => 'end_date', 'class' => 'form-control required' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Pick start date', 'required' => 'required']) }}

                                            @if ($errors->has('end_date'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('end_date') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="remarks"
                                                   class="">{{trans('labels.remarks')}}</label>
                                            <textarea name="remarks"
                                                      data-rule-minlength="10"
                                                      data-msg-minlength="khela hobe"
                                                      class="form-control{{ $errors->has('remarks') ? ' is-invalid' : '' }}"
                                                      placeholder="{{trans('rms::research_proposal.write_here')}}..."
                                                      id="" cols="30" rows="5">{{ old('remarks') }}</textarea>

                                            @if ($errors->has('remarks'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('remarks') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">{{trans('rms::research_proposal.attachment')}} <span
                                                        class="danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="file" name="attachment[]" multiple="multiple" id=""
                                                       class="form-control{{ $errors->has('attachment') ? ' is-invalid' : '' }}"
                                                       required>
                                                @if ($errors->has('attachment'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('attachment') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> {{trans('labels.save')}}
                            </button>

                            <a class="btn btn-warning mr-1" role="button" href="{{route('project-request.index')}}">
                                <i class="ft-x"></i> {{trans('labels.cancel')}}
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
