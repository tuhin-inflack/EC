@extends('layouts.public')
@section('title', trans('labels.login'))
@section('content')
    <section class="flexbox-container">
        {{--<div class="col-12 d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('public-booking-requests.create') }}" class="btn btn-primary" style="font-size: large">@lang('hm::booking-request.create_booking_request')</a>
                </div>
                <div class="col-6">
                    <a href="{{ route('training-registration.index') }}" class="btn btn-primary" style="font-size: large">@lang('tms::training.registration_for_training')</a>
                </div>
            </div>
        </div>--}}
        <br>
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <img class="brand-logo" alt="bard erp logo" src="{{ asset('images/ec.svg') }}" style="height: 100px;">
                            <h3>বাংলাদেশ নির্বাচন কমিশন</h3>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-2">
                            <span>@lang('labels.provide_your_account_details')</span>
                        </p>
                        <div class="card-body pt-0">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                @csrf
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input id="username" type="text"
                                           class="input-lg form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" placeholder="Enter Username"
                                           required autofocus>
                                    <div class="form-control-position">
                                        <i class="la la-user"></i>
                                    </div>
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
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
                                        class="ft-unlock"></i> @lang('labels.login')
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
