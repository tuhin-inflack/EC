<div class="row match-height">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Forward Project Proposal Request</h4>
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
                    <form novalidate action="{{ route('project_request.forward_store')  }}" method="post">

                        @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-briefcase"></i> Request Forward Form</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="permissions" class="form-label">Proposal Request for:</label>

                                    <p>{{ $projectRequest->title  }}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="permissions" class="form-label">Select Department Head</label>
                                    <select class="select2 form-control{{ $errors->has('forward_to') ? ' is-invalid' : '' }}" multiple="multiple" name="forward_to[]" id="id_h5_multi" style="width: 685px;">

                                        @foreach($users as $user)
                                            <option value="{{ $user->email  }}">{{ $user->email  }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('forward_to'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('forward_to') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            <input type="hidden" name="project_request_id" value="{{ $projectRequest->id }}">
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> Send
                            </button>
                            <a class="btn btn-warning mr-1" role="button" href="{{url('/pms/project-requests/'.$projectRequest->id)}}">
                                <i class="ft-x"></i> Cancel
                            </a>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
