<div class="row match-height">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Project Proposal Request Creation</h4>
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
                    {!! Form::open(['route' => 'project-request.store','enctype' => 'multipart/form-data','method' => 'POST']) !!}
                        <div class="form-body">
                            <h4 class="form-section"><i class="la la-briefcase"></i> Project Proposal Request Form</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Send To</label>
                                        <input type="text"
                                               value="{{ old('send_to') }}"
                                               class="form-control{{ $errors->has('send_to') ? ' is-invalid' : '' }}"
                                               name="send_to" autofocus required/>
                                        @if ($errors->has('send_to'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('send_to') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Last Submission Date</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <span class="la la-calendar-o"></span>
                                                </span>
                                            </div>
                                            <input type='text'
                                                   class="form-control pickadate-format-db {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                                   placeholder="Pick a Date" name="end_date"
                                                   required/>
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
                                        <label for="name" class="form-label">Title</label>
                                        <div class="input-group">

                                            <input type="text"
                                                   value="{{ old('title') }}"
                                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   name="title" autofocus required/>
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
                                        <label for="name" class="form-label">Message</label>
                                        <textarea name="message"
                                                  class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"
                                                  id="" cols="30" rows="10"
                                                  required>{{ old('message') }}</textarea>

                                        @if ($errors->has('message'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Attachment</label>
                                        <input type="file"
                                               class="form-control{{ $errors->has('attachment') ? ' is-invalid' : '' }}"
                                               name="attachment" autofocus required/>
                                        @if ($errors->has('attachment'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('attachment') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>
                                <input type="hidden" name="status" value="0">
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                                <a class="btn btn-warning mr-1" role="button" href="{{route('project-request.index')}}">
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