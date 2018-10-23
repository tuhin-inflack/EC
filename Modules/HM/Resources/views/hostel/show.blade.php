@extends('hm::layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Hostel Room Creation</h4>
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

                            <!-- Button trigger modal -->
                            <button type="button" class="float-right btn btn-sm btn-outline-primary" data-toggle="modal"
                                    data-target="#default">
                                <i class="ft-plus"></i>
                                Add room information
                            </button>
                            <!-- Modal -->
                            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel1"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel1">Room Information</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="#">
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <label for="room_type" class="form-label">Room Type</label>
                                                        <select class="form-control" name="room_type" id="">
                                                            <option selected disabled="">Select room type</option>
                                                            @foreach($hostel->roomTypes as $roomType)
                                                                <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <u>Room Items</u>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <div class="row">
                                                            <div class="col-md-5">Item Name</div>
                                                            <div class="col-md-5">Quantity</div>
                                                        </div>
                                                        <div class="repeater-default">
                                                            <div data-repeater-list="inventories">
                                                                <div data-repeater-item>
                                                                    <div class="row">
                                                                        <div class="form-group- col-md-5">
                                                                            <input name="name" type="text"
                                                                                   class="form-control">
                                                                        </div>
                                                                        <div class="form-group- col-md-5">
                                                                            <input name="quantity" type="number" min="1"
                                                                                   class="form-control">
                                                                        </div>
                                                                        <div class="form-group- col-md-2">
                                                                            <button data-repeater-delete type="button"
                                                                                    class="btn btn-outline-danger"><i
                                                                                        class="ft-x"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                            <div class="form-group overflow-hidden">
                                                                <div class="col-12">
                                                                    <button type="button" data-repeater-create
                                                                            class="btn btn-primary btn-sm">
                                                                        <i class="ft-plus"></i> Add more item
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn grey btn-outline-secondary"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-outline-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center"
                                            colspan="{{ ceil($hostel->total_room / $hostel->level) + 1 }}">{{ $hostel->name }}
                                            ({{ $hostel->shortcode }})
                                            <div class="float-right">
                                                <label>
                                                    <input type="checkbox" onchange="toggleRoomCheckboxes()"/>
                                                    Select all rooms
                                                </label>
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-body">
                                    @php
                                        $width =  (85 / ceil($hostel->total_room / $hostel->level))
                                    @endphp

                                    @for($level = $hostel->level; $level > 0; $level--)
                                        <tr>
                                            <td width="15%">F - {{ $level }}</td>
                                            @for($room = 0; $room < ceil($hostel->total_room / $hostel->level); $room++)
                                                <td width="{{ $width }}%">
                                                    <input type="checkbox" data-room-id="" data-level="" name="level[]">
                                                    {{ $level . $room }}
                                                </td>
                                            @endfor
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
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
        function toggleRoomCheckboxes() {
            let roomCheckboxes = $('input[name="level[]"]');
            roomCheckboxes.attr('checked', !roomCheckboxes.attr('checked'));
        }

        $(document).ready(function () {
            let modal = $('#default');
            modal.on('hidden.bs.modal', function (e) {
                modal.find('form')[0].reset();
                $('div[data-repeater-item]:not(:first)').remove();
            });
        });
    </script>
@endpush