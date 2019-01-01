<div class="row match-height">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Research Proposal Creation</h4>
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
                        <h4 class="form-section"><i class="la la-briefcase"></i>Create Research Proposal</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="form-label">Faculty Director</label>
                                    <select class="select2 form-control">
                                        <option value="AK">Hasib Noor</option>
                                        <option value="HI">MJ Ferdous</option>
                                        <option value="CA">Sahib Bin Ron</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
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
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
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
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
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

                        <div class="form-actions">


                            <a href="{{route('research-proposal-submission.index')}}" class="btn btn-primary"><i class="la la-check-square-o"></i> Submit</a>

                            <a class="btn btn-warning mr-1" role="button" href="{{route('research-proposal-submission.index')}}">
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