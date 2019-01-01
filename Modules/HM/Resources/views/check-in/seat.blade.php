@extends('hm::layouts.master')
@section('title', 'Approved Booking Request')
@push('page-css')
    <style type="text/css" src="css/jquery.seat-charts.css"></style>
    <style type="text/css">
        .hostel-level {
            background-color: #ff22f3;
            color: #ffffff;
        }

        .room-block {
            color: #ffffff;
        }

        .available {
            background-color: green;
            cursor: pointer;
        }

        .unavailable {
            background-color: red;
            pointer-events: none;
            cursor: not-allowed;
        }

        .partially-available {
            background-color: purple;
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Room Allocation</h4>
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
                                <div class="col-md-6">
                                    <fieldset>
                                        <legend>Booking Details</legend>
                                        <label>Booking Code: {{$roomBookingDetails->shortcode}}</label>
                                        <label>Booking Type: {{$roomBookingDetails->booking_type}}</label>
                                        <label>Start Date: {{$roomBookingDetails->start_date}}</label>
                                        <label>End Date: {{$roomBookingDetails->end_date}}</label>
                                    </fieldset>
                                </div>
                            </div>
                            <hr/>
                            <h3>{{$hostel->name}}</h3>
                            <div class="table table-bordered text-center overflow-auto">
                                <table>
                                    <tbody>
                                    @foreach($roomDetails as $key => $roomDetail)
                                        <tr>
                                            <td class="hostel-level"><strong>Level {{$key}}</strong></td>
                                            @foreach($roomDetail as $room)
                                                <td data-roomid="{{$room->id}}" class="room-block {{$room->status}}"
                                                    title="{{'Status: '.$room->status}} {{'Capacity: '.$room->roomType->capacity}}"
                                                    data-toggle="modal" data-target="#selectionModal">
                                                    {{$room->room_number}}<br/>{{$room->roomType->name}}
                                                </td>
                                            @endforeach
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
    <div class="modal fade" id="selectionModal" tabindex="-1" role="dialog" aria-labelledby="selectionModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="selectionModalLabel">Allocate Room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' =>  'room.assign', 'class' => 'form', 'novalidate']) !!}
                <div class="modal-body">
                    <input type="hidden" name="room_booking_id" value="{{$roomBookingDetails->id}}"/>
                    <input type="hidden" name="hostel_id" id="hostel-id" value="{{$hostel->id}}"/>
                    <input type="hidden" name="room_id" id="room-id" value=""/>
                    <div class="form-group">
                        <label for="booking_guest_info_id" class="col-form-label">Select Guest:</label>
                        {!! Form::select('booking_guest_info_id', $guests, null, ['class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                        <label for="checkin_date" class="col-form-label">Checkin Date:</label>
                        <input type="datetime-local" class="form-control" name="checkin_date" id="checkin-date"
                               required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script type="text/javascript">
        $('#selectionModal').on('show.bs.modal', function (event) {
            var td = $(event.relatedTarget);// td that triggered the modal
            var roomId = td.data('roomid');
            $('#room-id').val(roomId);
        })

    </script>
@endpush
