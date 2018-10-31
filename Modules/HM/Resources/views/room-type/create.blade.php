@extends('hm::layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Room Type Creation</h4>
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
                            <form action="#" method="post">
                                <h4 class="form-section"><i class="la  la-building-o"></i>Room Type Form</h4>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Name <i class="danger">*</i></label>
                                            <input type="text"
                                                   placeholder="AC Single"
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
                                            <label class="form-label">Capacity <i class="danger">*</i></label>
                                            <input type="number"
                                                   placeholder="4"
                                                   min="1"
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
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">General Rate <i class="danger">*</i></label>
                                            <input type="number"
                                                   placeholder="amount"
                                                   value="{{ old('general_rate') }}"
                                                   class="form-control{{ $errors->has('general_rate') ? ' is-invalid' : '' }}"
                                                   name="general_rate" required/>

                                            @if ($errors->has('general_rate'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('general_rate') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Government Rate <i class="danger">*</i></label>
                                            <input type="number"
                                                   placeholder="amount"
                                                   value="{{ old('govt_rate') }}"
                                                   class="form-control{{ $errors->has('govt_rate') ? ' is-invalid' : '' }}"
                                                   name="govt_rate" required/>

                                            @if ($errors->has('govt_rate'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('govt_rate') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">BARD Employee Rate <i class="danger">*</i></label>
                                            <input type="number"
                                                   placeholder="amount"
                                                   value="{{ old('employee_rate') }}"
                                                   class="form-control{{ $errors->has('employee_rate') ? ' is-invalid' : '' }}"
                                                   name="employee_rate" required/>

                                            @if ($errors->has('employee_rate'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('employee_rate') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Special Rate <i class="danger">*</i></label>
                                            <input type="number"
                                                   placeholder="amount"
                                                   value="{{ old('special_rate') }}"
                                                   class="form-control{{ $errors->has('special_rate') ? ' is-invalid' : '' }}"
                                                   name="special_rate" required/>

                                            @if ($errors->has('special_rate'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('special_rate') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <h4 class="form-section"><i class="la  la-table"></i>Room Type Inventories</h4>

                                <div class="repeater-room-types row">
                                    <div class="mb-1 col-sm-12 col-md-6">
                                        <label for="bio" class="cursor-pointer">Inventory Item <span
                                                    class="danger">*</span></label>
                                    </div>
                                    <div class="mb-1 col-sm-12 col-md-6">
                                        <label for="bio" class="cursor-pointer">Quantity <span
                                                    class="danger">*</span></label>
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
                                                <i class="ft-plus"></i> More room type
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