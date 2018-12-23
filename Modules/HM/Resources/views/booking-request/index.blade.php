@extends('hm::layouts.master')
@section('title', 'Booking Request List')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Booking Request List</h4>
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
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-bordered alt-pagination">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Booked By</th>
                                            <th>Check In Date</th>
                                            <th>Check Out Date</th>
                                            <th>Organization</th>
                                            <th>Reference</th>
                                            <th>Guests</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bookings as $booking)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="#">{{ $booking->requester->name }}</a></td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $booking->start_date)->format('d/m/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $booking->end_date)->format('d/m/Y') }}</td>
                                                <td>{{ $booking->requester->organization }}</td>
                                                <td>{{ $booking->referee->name }}</td>
                                                <td>{{ $booking->guestInfos->count() }}</td>
                                                <td>{{ $booking->status }}</td>
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
    </div>
@endsection

@push('js')
    <script>

    </script>
@endpush