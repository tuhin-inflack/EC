@extends('accounts::layouts.master')
@section('title', 'Update Account Ledger')
@section("account_ledger", 'active')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Account Head</div>
                    <div class="card-body">
                        <form action="{{ route('account-head.update', $head->id) }}" method="post" role="form"
                              id="edit_form">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Account Parent Head</label>
                                {{-- Form::select('parent_id', $coa) --}}

                                <div class="col-md-6">
                                    {{ Form::select('parent_id', $accountsHeads, $head->parent_id, array('class' => 'form-control' . ($errors->has('parent_id') ? ' is-invalid' : '') )) }}

                                    @if ($errors->has('parent_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('parent_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Account Head Name</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('name') ?: $head->name }}"
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
                                <label class="col-sm-4 col-form-label text-md-right">Account Head Code</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('code') ?: $head->code }}"
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
                                <label class="col-sm-4 col-form-label text-md-right">Account Head Type</label>

                                <div class="col-md-6">
                                    {{ Form::select('head_type', ['1' => 'Assets', '2' => 'Liability', '3' => 'Income', '4' => 'Expense'] , $head->head_type, array('class' => 'form-control' . ($errors->has('head_type') ? ' is-invalid' : '') )) }}

                                    @if ($errors->has('head_type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('head_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea
                                            rows="2"
                                            name="description"
                                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description') ?: $head->description }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary" type="submit">Update</button>

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