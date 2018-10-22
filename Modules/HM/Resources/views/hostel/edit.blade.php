@extends('hm::layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Hostel Edit</h4>
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
                            <form action="{{ route('hostels.update', $hostel->id) }}" method="post">
                                <h4 class="form-section"><i class="ft-home"></i>Hostel Edit Form</h4>
                                @method('PUT')
                                @csrf
                                <div class="col-md-6 offset-md-3">
                                    <div class="form-group row">
                                        <label class="form-label">Shortcode</label>
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

                                <div class="col-md-6 offset-md-3">
                                    <div class="form-group row">
                                        <label class="form-label">Name</label>
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

                                <div class="col-md-6 offset-md-3">
                                    <div class="form-group row">
                                        <label class="form-label">Level</label>
                                        <input type="text"
                                               value="{{ old('level') ?: $hostel->level }}"
                                               class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}"
                                               name="level" required/>

                                        @if ($errors->has('level'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('level') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-3">
                                    <div class="form-group row">
                                        <label class="form-label">Total Room</label>
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

                                <div class="col-md-6 offset-md-3">
                                    <div class="form-group row">
                                        <label class="form-label">Total Seat</label>
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

                                <div class="form-group row">
                                    <b class="col-sm-4 col-form-label text-md-right"><u>Room Details</u></b>
                                </div>

                                <div class="repeater-room-types col-md-6 offset-sm-3 row">
                                    <div class="mb-1 col-sm-12 col-md-4">
                                        <label for="bio" class="cursor-pointer">Room Type</label>
                                    </div>
                                    <div class="mb-1 col-sm-12 col-md-3">
                                        <label for="bio" class="cursor-pointer">Capacity</label>
                                    </div>
                                    <div class="mb-1 col-sm-12 col-md-3">
                                        <label for="bio" class="cursor-pointer">Rate</label>
                                    </div>
                                    <div class="mb-1 col-sm-12 col-md-2">
                                        <button type="button" data-repeater-create class="btn btn-sm btn-outline-info">
                                            <i class="ft-plus"></i> More room type
                                        </button>
                                    </div>
                                    <div data-repeater-list="room_types">
                                        @if(old('room_types'))
                                            @foreach(old('room_types') as $oldInput)
                                                <div data-repeater-item class="row">
                                                    <div class="form-group mb-1 col-sm-12 col-md-4">
                                                        <input type="hidden" id="room-type-id" name="id"
                                                               value="{{ $oldInput['id'] }}"/>
                                                        <input type="hidden" name="hostel_id"
                                                               value="{{ $oldInput['hostel_id'] }}"/>
                                                        <input type="text"
                                                               value="{{ $oldInput['name'] }}"
                                                               class="form-control{{ $errors->has('room_types.'.$loop->index.'.name') ? ' is-invalid' : '' }}"
                                                               name="name" required/>

                                                        @if ($errors->has('room_types.'.$loop->index.'.name'))
                                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('room_types.'.$loop->index.'.name') }}</strong>
                                                    </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                        <input type="text"
                                                               value="{{ $oldInput['capacity'] }}"
                                                               class="form-control{{ $errors->has('room_types.'.$loop->index.'.capacity') ? ' is-invalid' : '' }}"
                                                               name="capacity" required/>

                                                        @if ($errors->has('room_types.'.$loop->index.'.capacity'))
                                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('room_types.'.$loop->index.'.capacity') }}</strong>
                                                    </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                        <input type="text"
                                                               value="{{ $oldInput['rate'] }}"
                                                               class="form-control{{ $errors->has('room_types.'.$loop->index.'.rate') ? ' is-invalid' : '' }}"
                                                               name="rate" required/>

                                                        @if ($errors->has('room_types.'.$loop->index.'.rate'))
                                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('room_types.'.$loop->index.'.rate') }}</strong>
                                                    </span>
                                                        @endif
                                                    </div>
                                                    <div class="skin skin-flat form-group mb-1 col-sm-12 col-md-1">
                                                        <button type="button" class="btn btn-outline-danger"
                                                                data-repeater-delete><i class="ft-x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            @foreach($hostel->roomTypes as $roomType)
                                                <div data-repeater-item class="row">
                                                    <div class="form-group mb-1 col-sm-12 col-md-4">
                                                        <input type="hidden" id="room-type-id" name="id"
                                                               value="{{ $roomType->id }}"/>
                                                        <input type="hidden" name="hostel_id"
                                                               value="{{ $hostel->id }}"/>
                                                        <input type="text" name="name"
                                                               value="{{ old('room_type.name') ?: $roomType->name }}"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                        <input type="text" name="capacity"
                                                               value="{{ old('room_type.capacity') ?: $roomType->capacity }}"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                        <input type="text" name="rate"
                                                               value="{{ old('room_type.rate') ?: $roomType->rate }}"
                                                               class="form-control">
                                                    </div>
                                                    <div class="skin skin-flat form-group mb-1 col-sm-12 col-md-1">
                                                        <button type="button" class="btn btn-outline-danger"
                                                                data-repeater-delete>
                                                            <i class="ft-x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <a href="{{ route('hostels.index') }}" class="btn btn-warning">Cancel</a>
                                    </div>
                                </div>
                            </form>
                            <form id="room-type-delete" method="POST">
                                @csrf
                                @method('DELETE')
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
            $('.repeater-room-types').repeater({
                show: function () {
                    $('div:hidden[data-repeater-item]').remove();

                    let index = $('div[data-repeater-item]').length;

                    $('div[data-repeater-list="room_types"]').append(`
                        <div data-repeater-item class="row">
                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                <input type="hidden" id="room-type-id" name="room_types[${index}][id]" value="">
                                <input type="hidden" name="room_types[${index}][hostel_id]" value="">
                                <input type="text" name="room_types[${index}][name]" class="form-control">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                <input type="text" name="room_types[${index}][capacity]" class="form-control">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                <input type="text" name="room_types[${index}][rate]" class="form-control">
                            </div>
                            <div class="skin skin-flat form-group mb-1 col-sm-12 col-md-1">
                                <button type="button" class="btn btn-outline-danger" data-repeater-delete="">
                                    <i class="ft-x"></i>
                                </button>
                            </div>
                        </div>
                    `);
                },
                hide: function (deleteElement) {
                    let roomTypeId = $(this).find('#room-type-id').val();

                    if (roomTypeId) {
                        if (confirm('Are you sure you want to delete this element?')) {
                            $('#room-type-delete').attr('action', `/hm/room-types/${roomTypeId}`);
                            $('#room-type-delete').submit();
                            $(this).slideUp(deleteElement);
                        }
                    } else {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
        });
    </script>
@endpush