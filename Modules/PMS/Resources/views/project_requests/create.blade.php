@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css')  }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css')  }}">
@endpush
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

                                <div class="col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <span class="la la-calendar-o"></span>
                                                </span>
                                            </div>
                                            <input type='text' class="form-control pickadate" placeholder="Basic Pick-a-date"
                                            />
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Message</label>

                                <div class="col-md-6">
                                    <textarea name="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"  id="" cols="30" rows="10" autofocus required>{{ old('message') }}</textarea>

                                    @if ($errors->has('message'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Attachment</label>

                                <div class="col-md-6">
                                    <input type="file"
                                           class="form-control{{ $errors->has('attachment') ? ' is-invalid' : '' }}"
                                           name="attachment" autofocus required/>
                                    @if ($errors->has('attachment'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('attachment') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <input type="hidden" name="status" value="0">

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
@push('page-js')
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.js')  }}" ></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.date.js') }}" ></script>
    <script src="{{ asset('theme/js/scripts/pickers/dateTime/pick-a-datetime.js')  }}" ></script>
@endpush
