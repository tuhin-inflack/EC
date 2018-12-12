@extends('hm::layouts.master')
@section('title', 'Hostel Details')

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
                            <div class="row">
                                <div class="col-md-2">
                                    <b>Name:</b>
                                    {{ $hostel->name }}
                                </div>
                                <div class="col-md-2">
                                    <b>Total Floor:</b>
                                    {{ $hostel->total_floor }}
                                </div>
                                <div class="col-md-2">
                                    <b>Total Rooms:</b>
                                    {{ count($hostel->rooms) }}
                                </div>
                            </div>

                            <hr/>
                            <h3 class="text-center">Room Details</h3>
                            <div class="text-center">
                                <a href="{{ route('rooms.create', $hostel->id) }}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> Add Rooms</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th>Room Type</th>
                                        <th>Room No.</th>
                                        <th>Floor</th>
                                        <th>Capacity</th>
                                        <th>Gen. Rate</th>
                                        <th>Govt. Rate</th>
                                        <th>Emp. Rate</th>
                                        <th>Special Rate</th>
                                        <th><i class="ft-activity"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hostel->rooms as $room)
                                        <tr>
                                            <td>{{ $room->roomType->name }}</td>
                                            <td>{{ $room->room_number }}</td>
                                            <td>{{ $room->floor }}</td>
                                            <td>{{ $room->roomType->capacity }}</td>
                                            <td>{{ $room->roomType->general_rate }}</td>
                                            <td>{{ $room->roomType->govt_rate }}</td>
                                            <td>{{ $room->roomType->bard_emp_rate }}</td>
                                            <td>{{ $room->roomType->special_rate }}</td>
                                            <td>
                                                {!! Form::open([
                                                'method'=>'DELETE',
                                                'route' => [ 'rooms.destroy', $room->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                                {!! Form::button('<i class="ft-trash"></i> ', array(
                                                'type' => 'submit',
                                                'title' => 'Delete the room',
                                                'onclick'=>'return confirm("Confirm delete?")',
                                                )) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <a class="btn btn-warning mr-1" role="button" href="{{route('hostels.index')}}">
                                    <i class="ft-arrow-left"></i> Back
                                </a>
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
