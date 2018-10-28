@extends('accounts::layouts.master')
@section('title', 'Chart of Account')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Chart of Account</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{ route('account-head.create') }}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> Create Account Head</a>
                            <a href="{{ route('account-ledger.create') }}" class="btn btn-warning btn-sm"> <i
                                        class="ft-download white"></i> Create Account Ledger</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col">SL</th>
                                {{--<th scope="col">Parent</th>--}}
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="float-right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection