@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Hostel</div>
                    <div class="card-body">
                        <form novalidate action="{{ route('hostels.update', $hostel->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Shortcode</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('shortcode') ?: $hostel->shortcode }}"
                                           class="form-control{{ $errors->has('shortcode') ? ' is-invalid' : '' }}"
                                           name="shortcode" autofocus required/>
                                    @if ($errors->has('shortcode'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('shortcode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('name') ?: $hostel->name }}"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" required/>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Total Room</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('total_room') ?: $hostel->total_room }}"
                                           class="form-control{{ $errors->has('total_room') ? ' is-invalid' : '' }}"
                                           name="total_room" required/>

                                    @if ($errors->has('total_room'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('total_room') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Total Seat</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('total_seat') ?: $hostel->total_seat }}"
                                           class="form-control{{ $errors->has('total_seat') ? ' is-invalid' : '' }}"
                                           name="total_seat" required/>

                                    @if ($errors->has('total_seat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('total_seat') }}</strong>
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