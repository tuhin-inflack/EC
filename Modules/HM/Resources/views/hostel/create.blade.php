@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Hostel</div>
                    <div class="card-body">
                        <form novalidate action="{{ route('hostels.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Shortcode</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('shortcode') }}"
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
                                           value="{{ old('name') }}"
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
                                <label class="col-sm-4 col-form-label text-md-right">Level</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('level') }}"
                                           class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}"
                                           name="name" required/>

                                    @if ($errors->has('level'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('level') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">Total Room</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           value="{{ old('total_room') }}"
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
                                           value="{{ old('total_seat') }}"
                                           class="form-control{{ $errors->has('total_seat') ? ' is-invalid' : '' }}"
                                           name="total_seat" required/>

                                    @if ($errors->has('total_seat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('total_seat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <b class="col-sm-4 col-form-label text-md-right"><u>Room Details</u></b>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-6 offset-sm-4">
                                    <a class="pull-right" href="javascript:void(0)" onclick="addRow()">+ Add room
                                        type</a>
                                </div>
                                <table id="rt-table" class="col-md-6 offset-md-4" style="">
                                    <thead>
                                    <tr>
                                        <th width="10%">SL</th>
                                        <th>Room Type</th>
                                        <th colspan="2">Rate</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td width="10%">
                                            1
                                        </td>
                                        <td width="40%">
                                            <select class="custom-select">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </td>
                                        <td width="40%">
                                            <input type="text"
                                                   value="{{ old('shortcode') }}"
                                                   class="form-control{{ $errors->has('shortcode') ? ' is-invalid' : '' }}"
                                                   name="shortcode" autofocus required/>

                                            @if ($errors->has('shortcode'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('shortcode') }}</strong>
                                                </span>
                                            @endif
                                        </td>
                                        <td width="10%">
                                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(event)">X</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
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

@push('page-js')
    <script>
        function addRow() {
            let rowIndex = $('#rt-table tr').length;
            $('#rt-table tr:last').after(`
                <tr>
                    <td width="10%">
                        ${rowIndex}
                    </td>
                    <td width="40%">
                        <select class="custom-select">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </td>
                    <td width="40%">
                        <input type="text"
                               value="{{ old('shortcode') }}"
                               class="form-control{{ $errors->has('shortcode') ? ' is-invalid' : '' }}"
                               name="shortcode" autofocus required/>
                        @if ($errors->has('shortcode'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('shortcode') }}</strong>
                            </span>
                        @endif
                    </td>
                    <td width="10%">
                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(event)">X</button>
                    </td>
                </tr>
            `)
        }

        function deleteRow(event) {
            $(event.target).parents('tr').remove();

            $('#rt-table tbody tr td:first-child').each(function (index) {
                $(this).html(index + 1);
            });
        }
    </script>
@endpush