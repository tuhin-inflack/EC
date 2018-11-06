@extends('accounts::layouts.master')
@section('title', 'Accounts')

@section('content')
    <H1>Accounts</H1>

    <p>Accounting parts line Chart of Account & Auto Voucher</p>

    <div class="container">
        <div id="crypto-stats-3" class="row" style="margin-top: 32px">
            <div class="col-xl-4 col-12">
                <div class="card crypto-card-3 pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <h1><i class="la la-list warning font-large-2"></i></h1>
                                </div>
                                <div class="col-10 pl-2">
                                    <h4>Chart of Account</h4>
                                    <h6 class="text-muted"><a href="{{ route('chart-of-account') }}">Chart of Account</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
