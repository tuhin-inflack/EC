@extends('hm::layouts.master')
@section('title', trans('hm::booking-request.booking_request') . ' ' . trans('labels.list'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">@lang('hm::booking-request.booking_request') @lang('labels.list')</h4>
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
                                    <table class="booking-request-table table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>@lang('labels.serial')</th>
                                            <th>@lang('hm::booking-request.booked_by')</th>
                                            <th>@lang('hm::booking-request.check_in_date')</th>
                                            <th>@lang('hm::booking-request.check_out_date')</th>
                                            <th>@lang('hm::booking-request.organization')</th>
                                            <th>@lang('hm::booking-request.bard_reference')</th>
                                            <th>@lang('hm::booking-request.guests')</th>
                                            <th>@lang('labels.status')</th>
                                            <th>@lang('labels.action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bookingRequests as $bookingRequest)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route('booking-requests.show', $bookingRequest->id) }}">{{ $bookingRequest->requester->name }}</a></td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $bookingRequest->start_date)->format('d/m/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $bookingRequest->end_date)->format('d/m/Y') }}</td>
                                                <td>{{ $bookingRequest->requester->organization }}</td>
                                                <td>{{ $bookingRequest->referee->name }}</td>
                                                <td>{{ $bookingRequest->guestInfos->count() }}</td>
                                                <td>{{ $bookingRequest->status }}</td>
                                                <td>
                                                    <a href="{{ route('booking-requests.edit', $bookingRequest->id) }}" class="btn btn-sm btn-primary"><i class="ft-edit-2"></i></a>
                                                </td>
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

@push('page-js')
    <script>
        $(document).ready(function () {
            $('.booking-request-table').DataTable({
                "columnDefs": [
                    { "orderable": false, "targets": 8 }
                ]
            });
        });
    </script>
@endpush