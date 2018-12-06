@extends('hm::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Hostel Details</h4>
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
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-md-right">
                                    <b>Shortcode:</b>
                                </div>
                                <div class="col-md-6">
                                    {{ $hostel->shortcode }}
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <b>Name:</b>
                                </div>
                                <div class="col-md-6">
                                    {{ $hostel->name }}
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <b>Level:</b>
                                </div>
                                <div class="col-md-6">
                                    {{ $hostel->level }}
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <b>Total room:</b>
                                </div>
                                <div class="col-md-6">
                                    {{ $hostel->total_room }}
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <b>Total Seat:</b>
                                </div>
                                <div class="col-md-6">
                                    {{ $hostel->total_seat }}
                                </div>
                            </div>

                            <hr>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th colspan="4" class="text-center">Rooms</th>
                                    </tr>
                                    <tr>
                                        <th>Shortcode</th>
                                        <th>Room Type</th>
                                        <th>Level</th>
                                        <th>Items</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hostel->rooms as $room)
                                        <tr>
                                            <td>{{ $room->shortcode }}</td>
                                            <td>{{ $room->roomType->name }}</td>
                                            <td>{{ $room->level }}</td>
                                            <td>{{ $room->inventories }}</td> {{-- $room->inventories->count() --}}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">Room Details</th>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <th>Capacity</th>
                                        <th>Rate</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hostel->roomTypes as $roomType)
                                        <tr>
                                            <td>{{ $roomType->name }}</td>
                                            <td>{{ $roomType->capacity }}</td>
                                            <td>{{ $roomType->rate }}</td>
                                        </tr>
                                    @endforeach
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

@endpush