@extends('accounts::layouts.master')
@section('title', trans('accounts::accounts.title'))

@section('content')
    <h1>
        @lang('labels.dashboard')
    </h1>

    <div class="container">
        <div id="crypto-stats-3" class="row" style="margin-top: 32px">
            <div class="col-xl-4 col-12">
                <div class="card crypto-card-3 pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <h1><i class="la la-tags warning font-large-2"></i></h1>
                                </div>
                                <div class="col-10 pl-2">
                                    <h4>@lang('accounts::economy-code.title')</h4>
                                    <h6 class="text-muted"><a href="{{ route('economy-code.index') }}">@lang('accounts::economy-code.title')</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-12">
                <div class="card crypto-card-3 pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <h1><i class="la la-tag warning font-large-2"></i></h1>
                                </div>
                                <div class="col-10 pl-2">
                                    <h4>@lang('accounts::economy-head.title')</h4>
                                    <h6 class="text-muted"><a href="{{ route('economy-head.index') }}">@lang('accounts::economy-head.title')</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-12">
                <div class="card crypto-card-3 pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <h1><i class="la la-calendar-o warning font-large-2"></i></h1>
                                </div>
                                <div class="col-10 pl-2">
                                    <h4>@lang('accounts::fiscal-year.title')</h4>
                                    <h6 class="text-muted"><a href="{{ route('fiscal-year.index') }}">@lang('accounts::fiscal-year.title')</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-xl-4 col-12">--}}
                {{--<div class="card crypto-card-3 pull-up">--}}
                    {{--<div class="card-content">--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-2">--}}
                                    {{--<h1><i class="la la-list warning font-large-2"></i></h1>--}}
                                {{--</div>--}}
                                {{--<div class="col-10 pl-2">--}}
                                    {{--<h4>@lang('Chart of Account')</h4>--}}
                                    {{--<h6 class="text-muted"><a href="{{ route('chart-of-account') }}">Chart of Account</a></h6>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@stop
