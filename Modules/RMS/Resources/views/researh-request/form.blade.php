<div class="row match-height">
<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">{{trans('rms::research_proposal.research_proposal_request_creation')}}</h4>
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
                    {!! Form::open() !!}
                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-briefcase"></i> {{trans('rms::research_proposal.request_form')}}</h4>
                        <div class="row">
                            <div class="col-md-8 offset-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Departments</label>
                                            <div class="input-group">
                                                <select class="select2 form-control{{ $errors->has('send_to') ? ' is-invalid' : '' }}" multiple="multiple">
                                                    <option value="AK">Administration</option>
                                                    <option value="HI">Training</option>
                                                    <option value="HI">Research</option>
                                                    <option value="HI"></option>
                                                </select>


                                                @if ($errors->has('send_to'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('send_to') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Start Date</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <span class="la la-calendar-o"></span>
                                                </span>
                                                </div>
                                                <input type='text'
                                                       class="form-control pickadate-format-db {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                                       placeholder="Pick a Date" name="end_date"
                                                />
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
                                            <label for="name" class="form-label">End Date</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <span class="la la-calendar-o"></span>
                                                </span>
                                                </div>
                                                <input type='text'
                                                       class="form-control pickadate-format-db {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                                       placeholder="Pick a Date" name="end_date"
                                                />
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
                            </div>
                        </div>
                        <div class="form-actions text-center">
                            <a href="{{ route('research-request.index')  }}" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</a>

                            <a class="btn btn-warning mr-1" role="button" href="{{route('research-request.index')}}">
                                <i class="ft-x"></i> Cancel
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>