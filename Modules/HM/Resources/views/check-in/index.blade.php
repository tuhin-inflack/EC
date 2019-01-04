@extends('hm::layouts.master')
@section('title', trans('hm::booking-request.check_in') . ' ' . trans('labels.list'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"
                            id="basic-layout-form">@lang('hm::booking-request.check_in') @lang('labels.list')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{ route('check-in.create-options') }}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> @lang('hm::booking-request.check_in') @lang('hm::booking-request.create')</a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered alt-pagination">
                                        <thead>
                                        <tr>
                                            <th>@lang('labels.serial')</th>
                                            <th>@lang('hm::checkin.check_in_number')</th>
                                            <th>@lang('hm::checkin.booking_id')</th>
                                            <th>@lang('hm::booking-request.check_in')</th>
                                            <th>@lang('hm::checkin.estimated_check_out_time')</th>
                                            <th>@lang('hm::checkin.estimated_no_of_day')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($checkins as $checkin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route('check-in.show', $checkin->id) }}">{{ $checkin->shortcode }}</a></td>
                                                <td>{{ $checkin->booking ? $checkin->booking->roomBooking->shortcode : null }}</td>
                                                <td>{{ \Carbon\Carbon::parse($checkin->start_date)->format('d/m/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($checkin->end_date)->format('d/m/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($checkin->start_date)->diffInDays(\Carbon\Carbon::parse($checkin->end_date)) }}</td>
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
