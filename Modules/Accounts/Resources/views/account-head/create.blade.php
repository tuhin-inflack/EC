@extends('layouts.app')

@section('content')
    <form action="{{ url('accounts/account-head') }}" method="post" role="form" id="add_form">
        {{--@method('PUT')--}}
        @csrf
        <div class="modal-body has-padding">

            <div class="form-group">
                <label>Account Parent Head</label>
                {{-- Form::select('parent_id', $coa) --}}

                <select class="form-control" name="parent_id">
                    <option value="1">Assets</option>
                    <option value="2">Liability</option>
                    <option value="3">Income</option>
                    <option value="4">Expense</option>
                </select>
            </div>

            <div class="form-group">
                <label>Account Head Name</label>
                <input type="text" placeholder="e.g. Fixed Assets" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label>Account Head Code</label>
                <input type="text" placeholder="e.g. A0001" class="form-control" name="code">
            </div>



            <div class="form-group">
                <label>Account Head Description</label>
                <textarea class="form-control" name="description" rows="2"></textarea>
            </div>

        </div>
        <div class="modal-footer">
            {{--<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>--}}
            <button type="submit" class="btn btn-primary">Submit </button>
        </div>
    </form>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Account Head</div>
                    <div class="card-body">
                        <form action="{{ route('account-head.store') }}" method="post">
                            @csrf
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
                                    <input type="text"
                                           value="{{ old('name') }}"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" autofocus required/>

                                    <select class="form-control" name="head_type">
                                        <option value="1">Assets</option>
                                        <option value="2">Liability</option>
                                        <option value="3">Income</option>
                                        <option value="4">Expense</option>
                                    </select>

                                    {{ Form::select("head_type", $permissions, null, ["class"=>"form-control show-tick", "id"=>"permissions",
                                         'multiple','name'=>'permissions[]', 'required'=>true]) }}


                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif

                                    @if ($errors->has('permissions'))
                                        <label id="permissions-error" class="error"
                                               for="permissions">{{ $errors->first('permissions') }}</label>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Seat Capacity</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('capacity') }}"
                                           class="form-control{{ $errors->has('capacity') ? ' is-invalid' : '' }}"
                                           name="capacity" required/>

                                    @if ($errors->has('capacity'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('capacity') }}</strong>
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