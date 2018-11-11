@extends('hm::layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Hostel Creation</h4>
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
                            @if($errors->has('room_types'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{ $errors->first('room_types') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('hostels.store') }}" method="post">
                                <h4 class="form-section"><i class="la  la-building-o"></i>Hostel Form</h4>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Name <span class="danger">*</span></label>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Total Floor <span class="danger">*</span></label>
                                            <input type="number"
                                                   min="1"
                                                   value="{{ old('total_floor') }}"
                                                   class="form-control{{ $errors->has('total_floor') ? ' is-invalid' : '' }}"
                                                   name="total_floor" required/>

                                            @if ($errors->has('total_floor'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('total_floor') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <h4 class="form-section"><i class="la  la-table"></i>Room Details</h4>

                                <div class="repeater-room-types">
                                    <div class="row">
                                        <div class="mb-1 col-sm-12 col-md-2">
                                            <label for="bio" class="cursor-pointer">Floor Number<span class="danger">*</span></label>
                                        </div>
                                        <div class="mb-1 col-sm-12 col-md-3">
                                            <label for="bio" class="cursor-pointer">Room Type <span class="danger">*</span></label>
                                        </div>
                                        <div class="mb-1 col-sm-12 col-md-3">
                                            <label for="bio" class="cursor-pointer">Room Type Quantity <span class="danger">*</span></label>
                                        </div>
                                        <div class="mb-1 col-sm-12 col-md-3">
                                            <label for="bio" class="cursor-pointer">Room numbers <span class="danger">*</span></label>
                                        </div>
                                    </div>

                                    <div data-repeater-list="room_types">
                                        <div data-repeater-item class="row">
                                            <div class="form-group mb-1 col-sm-12 col-md-2">
                                                <input type="number"
                                                       min="1"
                                                       class="form-control"
                                                       name="quantity" required/>
                                            </div>
                                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                                <select name="" id="" class="custom-select">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                                <select name="" id="" class="custom-select">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                            <div class="skin skin-flat form-group mb-1 col-sm-12 col-md-1">
                                                <button type="button" class="btn btn-outline-danger"
                                                        data-repeater-delete><i class="ft-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group float-right" style="margin-bottom: 0">
                                                <button type="button" data-repeater-create
                                                        class="btn btn-sm btn-outline-info">
                                                    <i class="ft-plus"></i> More room type
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="{{ route('hostels.index') }}" class="btn btn-warning">Cancel</a>
                                        </div>
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
        $(document).ready(() => {
            $('.repeater-room-types').repeater({
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