@extends('hm::layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Room Creation</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form novalidate action="{{ route('rooms.store') }}" method="post">
                                @csrf
                                <h4 class="form-section"><i class="la  la-building-o"></i>Room Form</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Hostel <span class="danger">*</span></label>
                                            <select name="hostel_id" id="hostel-select" class="form-control" required>
                                                <option></option>
                                                <option value="1">Hostel 1</option>
                                                <option value="2">Hostel 2</option>
                                                <option value="3">Hostel 3</option>
                                            </select>

                                            @if ($errors->has('hostel_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('hostel_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Room Type <span class="danger">*</span></label>
                                            <select class="form-control {{ $errors->has('room_type_id') ? 'is-invalid' : '' }}"
                                                    name="room_type_id" id="room-type-select" required>
                                                <option value=""></option>
                                                <option value="1">Room Type 1</option>
                                                <option value="2">Room Type 2</option>
                                                <option value="3">Room Type 3</option>
                                            </select>

                                            @if ($errors->has('room_type_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('room_type_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Level <span class="danger">*</span></label>
                                            <input type="number"
                                                   value="{{ old('level') }}"
                                                   min="1"
                                                   class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}"
                                                   name="level" autofocus required/>

                                            @if ($errors->has('level'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('level') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Shortcode <span class="danger">*</span></label>
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
                                </div>


                                <h4 class="form-section"><i class="la  la-table"></i>Room Inventories</h4>

                                <div class="repeater-room-inventories row">
                                    <div class="mb-1 col-sm-12 col-md-6">
                                        <label for="bio" class="cursor-pointer">Item Name </label>
                                    </div>
                                    <div class="mb-1 col-sm-12 col-md-6">
                                        <label for="bio" class="cursor-pointer">Quantity </label>
                                    </div>

                                    <div class="col-md-12">
                                        <div data-repeater-list="room_types">
                                            <div data-repeater-item class="row">
                                                <div class="form-group mb-1 col-sm-12 col-md-6">
                                                    <select name="" id="" class="custom-select">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-1 col-sm-12 col-md-5">
                                                    <input type="number"
                                                           placeholder="1"
                                                           min="1"
                                                           class="form-control"
                                                           name="capacity" required/>
                                                </div>
                                                <div class="skin skin-flat form-group mb-1 col-sm-12 col-md-1">
                                                    <button type="button" class="btn btn-outline-danger"
                                                            data-repeater-delete><i class="ft-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group float-right" style="margin-bottom: 0">
                                            <button type="button" data-repeater-create
                                                    class="btn btn-sm btn-outline-info">
                                                <i class="ft-plus"></i> More room inventory
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                    </div>

                                    <div class="form-group col-md-12 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <a href="#" class="btn btn-warning">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#hostel-select, #room-type-select').select2({
                placeholder: 'Select option'
            });

            $('.repeater-room-inventories').repeater({
                show: function () {
                    $('div:hidden[data-repeater-item]')
                        .find('input.is-invalid')
                        .each((index, element) => {
                            $(element).removeClass('is-invalid');
                        });

                    $(this).slideDown();
                },
            });
        });
    </script>
@endpush