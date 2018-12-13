<div class="row match-height">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">{{trans('pms::project_proposal.project_submit_form')}}</h4>
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
                    {!! Form::open(['route' => 'project-proposal-submission.store', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-briefcase"></i>{{trans('pms::project_proposal.create_proposal')}}</h4>
                        <div class="row">
                            <div class="col-md-8 offset-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">{{trans('pms::project_proposal.project_title')}}   <span
                                                        class="danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text"
                                                       value="" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                       name="title" required autofocus/>



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
                                            <label for="">{{trans('pms::project_proposal.attachment')}} <span
                                                        class="danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="file" name="attachment[]" multiple="multiple" id="" class="form-control{{ $errors->has('attachment') ? ' is-invalid' : '' }}" required>
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
                                            <label for="remarks" class="form-label">{{trans('pms::project_proposal.remarks')}}</label>
                                            <textarea name="remarks"
                                                      class="form-control{{ $errors->has('remarks') ? ' is-invalid' : '' }}" placeholder="Write here..."
                                                      id="" cols="30" rows="5">{{ old('message') }}</textarea>

                                            @if ($errors->has('remarks'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('remarks') }}</strong>
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
                </div>

            </div>
        </div>
    </div>
</div>