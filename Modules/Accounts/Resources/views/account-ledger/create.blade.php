@extends('accounts::layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Account Ledger</div>
                    <div class="card-body">
                        <form action="{{ route('account-ledger.store') }}" method="post" role="form" id="add_form">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Account Head</label>
                                {{-- Form::select('parent_id', $coa) --}}

                                <div class="col-md-6">
                                    {{ Form::select('account_head_id', $accountsHeads , null, array('class' => 'form-control' . ($errors->has('account_head_id') ? ' is-invalid' : '') )) }}

                                    @if ($errors->has('parent_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('account_head_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Account Ledger Name</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('name') }}"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" autofocus required/>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Account Ledger Code</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('code') }}"
                                           class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}"
                                           name="code" autofocus required/>

                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Opening Balance</label>

                                <div class="col-md-4">
                                    <input type="text"
                                           value="{{ old('opening_balance') }}"
                                           class="form-control{{ $errors->has('opening_balance') ? ' is-invalid' : '' }}"
                                           name="opening_balance" autofocus required/>

                                    @if ($errors->has('head_type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('opening_balance') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    {{ Form::select('opening_balance_type', ['D' => 'Debit', 'C' => 'Credit'] , null, array('class' => 'form-control')) }}
                                </div>
                                {{--<samp>Assets / Expenses always have Dr balance and Liabilities / Incomes always have Cr balance.</samp>--}}
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea
                                            rows="2"
                                            name="description"
                                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Account Type</label>

                                <div class="col-md-4">
                                    {{ Form::select('account_type', ['' => 'None', 'cash' => 'Cash', 'bank' => 'Bank'] , null, array('class' => 'form-control' . ($errors->has('account_type') ? ' is-invalid' : '') )) }}

                                    @if ($errors->has('account_type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('account_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <label>Reconciliation <input type="checkbox" class="form-control" name="reconciliation" value="1"></label>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary" type="submit">Save</button>

                                    <button class="btn btn-default" type="reset">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection