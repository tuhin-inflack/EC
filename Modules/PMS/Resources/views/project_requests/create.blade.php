@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create Project Proposal Request</div>
                    <div class="card-body">
                        <form novalidate action="" method="post">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Send To</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('send_to') }}"
                                           class="form-control{{ $errors->has('send_to') ? ' is-invalid' : '' }}"
                                           name="send_to" autofocus required/>
                                    @if ($errors->has('send_to'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('send_to') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Last Submission  Date</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control pickadate picker__input" placeholder="Basic Pick-a-date" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="P372837478_root">
                                    <input type="text"
                                           value="{{ old('send_to') }}"
                                           class="form-control{{ $errors->has('send_to') ? ' is-invalid' : '' }}"
                                           name="send_to" autofocus required/>
                                    @if ($errors->has('send_to'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('send_to') }}</strong>
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