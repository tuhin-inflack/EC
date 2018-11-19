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
                                                   placeholder="e.g Hostel 1"
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
                                                   placeholder="e.g 5"
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

                                <div class="repeater-rooms">
                                    <div data-repeater-list="rooms">
                                        <div data-repeater-item="" style="">
                                            <div class="form row">
                                                <div class="form-group mb-1 col-sm-12 col-md-2">
                                                    <label>Floor No <span
                                                                class="danger">*</span></label>
                                                    <br>
                                                    <input type="text" name="section" class="form-control"
                                                           placeholder="e.g 1" required>
                                                </div>
                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                    <label>Room Type <span class="danger">*</span></label>
                                                    <br>
                                                    <select name="room_type" id="" class="form-control">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                    <label>Room Quantity <span
                                                                class="danger">*</span></label>
                                                    <br>
                                                    <input type="number" name="quantity" class="form-control"
                                                           placeholder="e.g 10" required>
                                                </div>
                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                    <label>Room Numbers <span class="danger">*</span></label>
                                                    <br>
                                                    <input type="text" name="room_numbers" min="1" id=""
                                                           class="form-control" placeholder="e.g 201-205" required>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-1 text-center mt-2">
                                                    <button type="button" class="btn btn-outline-danger"
                                                            data-repeater-delete=""><i
                                                                class="ft-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="form-group overflow-auto">
                                        <div class="col-12">
                                            <button type="button" data-repeater-create=""
                                                    class="pull-right btn btn-sm btn-outline-primary">
                                                <i class="ft-plus"></i> Add
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-actions text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                        <a class="btn btn-warning mr-1" role="button" href="#">
                                            <i class="ft-x"></i> Cancel
                                        </a>
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
            $('.repeater-rooms').repeater({
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