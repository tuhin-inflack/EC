@extends('layouts.app')

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
                                    <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                </div>
                                <div class="col-10 pl-2">
                                    <h4>Account Head</h4>
                                    <h6 class="text-muted"><a href="{{url('accounts/account-head')}}">Account Head</a></h6>
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
                                    {{--<h1><i class="cc BT warning font-large-2" title="BTC"></i></h1>--}}
                                    <h1><i class="la la-tag warning font-large-2"></i></h1>
                                </div>
                                <div class="col-10 pl-2">
                                    <h4>Account Ledger</h4>
                                    <h6 class="text-muted"><a href="{{url('accounts/account-ledger')}}">Account Ledger</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
