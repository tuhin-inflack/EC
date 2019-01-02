@extends('hm::layouts.master')
@section('title', 'Hostel selection')
@push('page-css')
@endpush
@section('content')
    <div class="modal fade" id="selectionModal" tabindex="-1" role="dialog" aria-labelledby="selectionModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="selectionModalLabel">Select Hostel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table table-bordered">
                        <table>
                            @foreach($hostels as $name => $details)
                                <tr>
                                    <td>
                                        <a href="{{route('room.assign', ['hostelId' => $details['hostelDetails']->id,
                                        'roomBookingId'=>$roomBookingId])}}">{{$name}}</a>
                                    </td>
                                    @foreach($details['roomDetails'] as $roomDetail)
                                        <td>
                                            {{'Type: '.$roomDetail->room_type}}<br/>
                                            {{'Total Room: '.$roomDetail->room_count}}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#selectionModal').modal('show');
        });
    </script>
@endpush
