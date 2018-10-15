@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Room Type</div>
                    <div class="card-body">
                        <form action="{{ route('room-types.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Room Type Name</label>

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