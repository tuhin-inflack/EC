@extends('hm::layouts.master')
@section('title', 'Room Edit')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Hostel Room Edit</h4>
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
                            <form action="{{ route('rooms.update', $room->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="hostel_id" value="{{ $room->hostel->id }}"/>
                                <h4 class="form-section"><i class="la  la-building-o"></i>Room Form</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Shortcode</label>
                                            <input type="text"
                                                   value="{{ old('shortcode') ?: $room->shortcode }}"
                                                   class="form-control{{ $errors->has('shortcode') ? ' is-invalid' : '' }}"
                                                   name="shortcode" autofocus required/>

                                            @if ($errors->has('shortcode'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('shortcode') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Room Type</label>
                                            <select class="form-control {{ $errors->has('room_type_id') ? 'is-invalid' : '' }}"
                                                    name="room_type_id" required>
                                                <option selected disabled="">Select room type</option>
                                                @foreach($room->hostel->roomTypes as $roomType)
                                                    <option value="{{ $roomType->id }}" {{ $roomType->id == $room->room_type_id ? 'selected' : '' }}>{{ $roomType->name }}</option>
                                                @endforeach
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
                                            <label class="form-label">Level</label>
                                            <input type="number"
                                                   value="{{ old('level') ?: $room->level }}"
                                                   min="1"
                                                   class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}"
                                                   name="level" required/>

                                            @if ($errors->has('level'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('level') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <b class="col-sm-4 col-form-label text-md-right"><u>Room Inventories</u></b>
                                </div>

                                <div class="repeater-room-inventories">
                                    <div data-repeater-list="inventories">
                                        <div class="row col-md-6 offset-md-3">
                                            <div class="mb-1 col-sm-12 col-md-5">
                                                <label>Item name</label>
                                            </div>
                                            <div class="mb-1 col-sm-12 col-md-5">
                                                <label>Quantity</label>
                                            </div>
                                        </div>
                                        @if(old('inventories'))
                                            @foreach(old('inventories') as $oldInput)
                                                <div data-repeater-item>
                                                    <input type="hidden" id="room-inventory-id" name="id" value="{{ $oldInput['id'] }}"/>
                                                    <input type="hidden" name="room_id" value="{{ $oldInput['hostel_id'] }}"/>
                                                    <div class="row col-md-6 offset-md-3">
                                                        <div class="form-group mb-1 col-sm-12 col-md-5">
                                                            <input type="text" value="{{ $oldInput['item_name'] }}"
                                                                   class="form-control {{ $errors->has('inventories.' . $loop->index . '.item_name') ? 'is-invalid' : '' }}"
                                                                   name="name">

                                                            @if($errors->has('inventories.' . $loop->index . '.item_name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('inventories.' . $loop->index . '.item_name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb-1 col-sm-12 col-md-5">
                                                            <input type="number" value="{{ $oldInput['quantity'] }}"
                                                                   min="1"
                                                                   class="form-control {{ $errors->has('inventories.' . $loop->index . '.quantity') ? 'is-invalid' : '' }}"
                                                                   name="quantity">

                                                            @if($errors->has('inventories.' . $loop->index . '.quantity'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('inventories.' . $loop->index . '.quantity') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb-1 col-sm-12 col-md-2">
                                                            <button type="button" class="btn btn-outline-danger"
                                                                    data-repeater-delete><i class="ft-x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            @foreach($room->inventories as $inventory)
                                                <div data-repeater-item>
                                                    <input type="hidden" id="room-inventory-id" name="id" value="{{ $inventory->id }}"/>
                                                    <input type="hidden" name="room_id" value="{{ $room->id }}"/>
                                                    <div class="row col-md-6 offset-md-3">
                                                        <div class="form-group mb-1 col-sm-12 col-md-5">
                                                            <input type="text" value="{{ $inventory->item_name }}"
                                                                   class="form-control" name="item_name">
                                                        </div>
                                                        <div class="form-group mb-1 col-sm-12 col-md-5">
                                                            <input type="number" value="{{ $inventory->quantity }}"
                                                                   min="1" class="form-control"
                                                                   name="quantity">
                                                        </div>
                                                        <div class="form-group mb-1 col-sm-12 col-md-2">
                                                            <button type="button" class="btn btn-outline-danger"
                                                                    data-repeater-delete><i class="ft-x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="form-group overflow-hidden">
                                        <div class="col-12">
                                            <button type="button" data-repeater-create
                                                    class="float-right btn btn-sm btn-primary">
                                                <i class="ft-plus"></i> More room item
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <a href="{{ route('rooms.index') }}"
                                           class="btn btn-warning">Cancel</a>
                                    </div>
                                </div>
                            </form>
                            <form id="room-inventory-delete" method="POST">
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
            $('.repeater-room-inventories').repeater({
                show: function () {
                    $('div:hidden[data-repeater-item]')
                        .find('input.is-invalid')
                        .each((index, element) => {
                            $(element).removeClass('is-invalid');
                        });

                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    let roomInventoryId = $(this).find('#room-inventory-id').val();

                    if (roomInventoryId) {
                        if (confirm('Are you sure you want to delete this element?')) {
                            $('#room-inventory-delete').attr('action', `/hm/room-inventories/${roomInventoryId}`);
                            $('#room-inventory-delete').submit();
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