@extends('accounts::layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Account Head</div>
                    <div class="card-body">
                        <form action="{{ route('account-head.store') }}" method="post" role="form" id="add_form">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Account Parent Head</label>
                                {{-- Form::select('parent_id', $coa) --}}

                                <div class="col-md-6">

{{--                                     {{ Form::select('parent_id', ['L' => 'Large', 'S' => 'Small'] , null, array('class' => 'form-control'))  }}--}}
                                     {{ Form::select('parent_id', $chartOfAccounts , null, array('class' => 'form-control'))  }}

                                    {{--<select class="form-control" name="parent_id">--}}
                                        {{--<option value="1">Assets</option>--}}
                                        {{--<option value="2">Liability</option>--}}
                                        {{--<option value="3">Income</option>--}}
                                        {{--<option value="4">Expense</option>--}}
                                    {{--</select>--}}

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
                                <label class="col-sm-4 col-form-label text-md-right">Account Head Code</label>

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
                                <label class="col-sm-4 col-form-label text-md-right">Account Head Type</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="head_type">
                                        <option value="1">Assets</option>
                                        <option value="2">Liability</option>
                                        <option value="3">Income</option>
                                        <option value="4">Expense</option>
                                    </select>

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
                                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">
                                        {{ old('description') }}
                                    </textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
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