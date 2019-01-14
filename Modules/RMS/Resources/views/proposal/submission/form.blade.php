{!! Form::open() !!}
    <div class="form-body">
        <h4 class="form-section">
            <i class="la la-briefcase"></i>@lang('rms::research_proposal.research_proposal_creation_form')
        </h4>
        <div class="row">
            <div class="col-md-8 offset-2">
                <fieldset>
                    <div class="form row">
                        <div class="form-group mb-1 col-sm-12 col-md-12">
                            <label for="name" class="form-label">Faculty Director</label>
                            <select class="select2 form-control">
                                <option value="AK">Hasib Noor</option>
                                <option value="HI">MJ Ferdous</option>
                                <option value="CA">Sahib Bin Ron</option>
                            </select>

                            @if ($errors->has('to'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('to') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-12">
                            <label for="name" class="form-label">Members</label>
                            <div class="input-group">
                                <select class="select2 form-control{{ $errors->has('send_to') ? ' is-invalid' : '' }}" multiple="multiple">
                                    <option value="AK">Sadnan Hossaian</option>
                                    <option value="HI">Saiduzzaman Tohin</option>
                                    <option value="HI">Jahangir Alam</option>
                                    <option value="HI">Abu Taleb</option>
                                </select>


                                @if ($errors->has('send_to'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('send_to') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-12">
                            <label for="name" class="form-label">Title</label>
                            <div class="input-group">
                                <input type="text"
                                       value="" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                       name="title" autofocus/>



                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-12">
                            <label for="name" class="form-label">Objective of the Study</label>
                            <div class="input-group">
                                <input type="text"
                                       value="" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                       name="title" autofocus/>



                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="name" class="form-label">Notice</label>
                                <textarea name="message"
                                          class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" placeholder="Write here..."
                                          id="" cols="30" rows="5">{{ old('message') }}</textarea>

                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

        <div class="form-actions text-center">
            {!! Form::button('<i class="la la-check-square-o"></i> '.trans('labels.save') , ['type' => 'submit', 'class' => 'btn btn-primary'] ) !!}

            <a class="btn btn-warning mr-1" role="button" href="{{route('research-request.index')}}">
                <i class="ft-x"></i> {{trans('labels.cancel')}}
            </a>
        </div>
    </div>
{!! Form::close() !!}
