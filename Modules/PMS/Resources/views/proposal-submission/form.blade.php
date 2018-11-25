<div class="row match-height">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Project Proposal Creation</h4>
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
                        <h4 class="form-section"><i class="la la-briefcase"></i>Submit Project Proposal</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="form-label">Project Title</label>
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
                                    <label for="name" class="form-label">Proposal Request Remarks</label>
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


                            <a href="{{route('project-proposal-submission.index')}}" class="btn btn-primary"><i class="la la-check-square-o"></i> Submit</a>

                            <a class="btn btn-warning mr-1" role="button" href="{{route('project-proposal-submission.index')}}">
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