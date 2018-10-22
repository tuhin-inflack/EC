@extends('layouts.master')
@section('content')
    <section id="permission-form-layouts">
        <div class="row match-height">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Permission Creation</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            {!! Form::open(['url' =>  '/user/permission', 'class' => 'form']) !!}
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> Permission Form</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="model_name" class="form-label">Model Name</label>
                                            <input name="model_name" type="text" id="model_name" value="{{ old('model_name') }}"
                                                   class="form-control {{ $errors->has('model_name') ? 'is-invalid' : '' }}"
                                                   placeholder="eg. User" required>
                                            @if ($errors->has('model_name'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('model_name') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                    <a class="btn btn-warning mr-1" role="button" href="{{url('/user/permission')}}">
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
    </section>
@endsection
