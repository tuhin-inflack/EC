{!! Form::open(['route' => 'project-request.store', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
<div class="form-body">
    <h4 class="form-section"><i class="la la-briefcase"></i>{{trans('pms::project_proposal.request_form')}}</h4>
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="row">
                <div class="form-group mb-1 col-sm-12 col-md-12">
                    <label class="required">{{ trans('pms::project_proposal.send_to') }}</label>
                    <br>
                    {!! Form::select('send_to[]', $employees, null, ['class' => 'select2 form-control required'.($errors->has('send_to') ? ' is-invalid' : ''), 'multiple', 'data-msg-required' => Lang::get('labels.This field is required')]) !!}

                    @if ($errors->has('send_to'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('send_to') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="form-label">{{trans('pms::project_proposal.last_sub_date')}} <span
                                    class="danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <span class="la la-calendar-o"></span>
                                    </span>
                            </div>
                            <input type='text'
                                   class="form-control pickadate-format-db{{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                   placeholder="Pick a Date" name="end_date" required/>

                            @if ($errors->has('end_date'))
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('end_date') }}</strong>
                                                        </span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">{{trans('pms::project_proposal.attachment')}} <span
                                    class="danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="file" name="attachment[]" multiple="multiple" id=""
                                   class="form-control{{ $errors->has('attachment') ? ' is-invalid' : '' }}" required>
                            @if ($errors->has('attachment'))
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('attachment') }}</strong>
                                                </span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="form-label">{{trans('pms::project_proposal.remarks')}}</label>
                        <textarea name="message"
                                  class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"
                                  placeholder="Write here..."
                                  id="" cols="30" rows="5">{{ old('message') }}</textarea>

                        @if ($errors->has('message'))
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="status" value="0">

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
