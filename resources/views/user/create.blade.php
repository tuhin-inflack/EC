@extends('layouts.master')
@section('title', 'User create')
@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/forms/icheck/custom.css') }}">
@endpush
@section('content')
    <section id="user-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">User Creation</h4>
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
                            {!! Form::open(['url' =>  '/system/user', 'class' => 'form']) !!}
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> User Form</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label required">{{ __('Name') }}</label>
                                            <input id="name" type="text"
                                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email"
                                                   class="col-form-label">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email"
                                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile"
                                                   class="col-form-label required">{{ __('Mobile') }}</label>
                                            <input id="mobile" type="text"
                                                   class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                                   name="mobile" value="{{ old('mobile') }}" placeholder="01xxxxxxxxx">
                                            @if ($errors->has('mobile'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username"
                                                   class="col-form-label required">{{ __('Username') }}</label>
                                            <input id="username" type="text"
                                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                   name="username" value="{{ old('username') }}" required>
                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('username') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password"
                                                   class="col-form-label required">{{ __('Password') }}</label>
                                            <input id="password" type="password"
                                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password-confirm"
                                                   class="col-form-label required">{{ __('Confirm Password') }}</label>

                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="roles" class="form-label">Select roles</label>
                                            {{ Form::select("roles", $roles, null, ["class"=>"form-control select2", "id"=>"roles",
                                             'multiple' => 'multiple', 'name'=>'roles[]']) }}
                                            @if ($errors->has('roles'))
                                                <span class="invalid-feedback"><strong>{{ $errors->first('roles') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row icheck_minimal skin.skin-square">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_type"
                                                   class="col-form-label required">{{ __('User Type') }}</label>
                                            @foreach($userTypes as $key => $value)
                                                <fieldset class="radio">
                                                    <input type="radio"
                                                           name="user_type" value="{{$key}}" {{$key == 'GUEST' ? 'checked' : ''}} required>
                                                    <label for="user_type">
                                                        {{$value}}
                                                    </label>
                                                </fieldset>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status"
                                                   class="col-form-label required">{{ __('Status') }}</label>
                                            @foreach($status as $key => $value)
                                                <fieldset class="radio">
                                                    <label for="status">
                                                        <input type="radio"
                                                               name="status" value="{{$key}}" {{$key == 'ACTIVE' ? 'checked' : ''}} required>
                                                        {{$value}}
                                                    </label>
                                                </fieldset>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                    <a class="btn btn-warning mr-1" role="button" href="{{url('/system/user')}}">
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
@push('page-js')
<script type="text/javascript" src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/js/scripts/forms/checkbox-radio.min.js') }}"></script>
@endpush
