@extends('layouts.public')

@section('content')
    <section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <img class="brand-logo" alt="bard erp logo" src="{{ asset('images/logo.png') }}">
                            <h3>বাংলাদেশ পল্লী উন্নয়ন একাডেমি (বার্ড), কুমিল্লা</h3>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-2">
                            <span>Provide Your Account Details</span>
                        </p>
                        <div class="card-body pt-0">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                @csrf
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input id="email" type="email"
                                           class="input-lg form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" placeholder="Enter email"
                                           required autofocus>
                                    <div class="form-control-position">
                                        <i class="la la-user"></i>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </fieldset>
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input id="password" type="password"
                                           class="input-lg form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" placeholder="Enter password" required>
                                    <div class="form-control-position">
                                        <i class="la la-key"></i>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </fieldset>
                                <button type="submit" class="btn btn-info btn-lg btn-block"><i
                                        class="ft-unlock"></i> Login
                                </button>
                            </form>
                        </div>
                        <div class="card-body pb-0">
                            <p class="text-center">
                                <a class="card-link" href="{{ route('password.request') }}">
                                    {{ __('Recover Password?') }}
                                </a>
                            <p class="text-center">New to BARD ERP?
                                <a class="card-link" href="{{ route('register') }}">{{ __('Create Account') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
