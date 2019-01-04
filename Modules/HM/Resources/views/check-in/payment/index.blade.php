@extends('hm::layouts.master')
@section('title', 'Payments Details of Check In')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Payments Details of Check In</h4>
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
                        <div class="card-body" style="padding-left: 20px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <span class="text-bold-600">@lang('hm::booking-request.check_in') @lang('labels.information')</span>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td class="width-150">@lang('hm::booking-request.check_in') @lang('labels.id')</td>
                                                <td class="width-300">BARDXXXXXX</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.booking_type')</td>
                                                <td>{{ $checkin->booking_type }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.check_in')</td>
                                                <td>{{ \Carbon\Carbon::parse($checkin->start_date)->format('d/m/Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.check_out')</td>
                                                <td>{{ \Carbon\Carbon::parse($checkin->end_date)->format('d/m/Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.no_of_guests')</td>
                                                <td>{{ $checkin->guestInfos()->count() }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.no_of_rooms')</td>
                                                <td>{{ $checkin->roomInfos()->sum('quantity') }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.room_details')</td>
                                                <td>
                                                    @foreach($checkin->roomInfos as $roomInfo)
                                                        {{ $roomInfo->quantity }} ({{ $roomInfo->roomType->name }})
                                                    @endforeach
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @if(count($checkin->payments))
                                    <div class="col-md-6">
                                        <p><span class="text-bold-600">{{ trans('hm::bill.payment_details') }}</span></p>
                                        <div class="table-responsive">
                                            <table class="table table-responsive table-bordered mb-0">
                                                <thead>
                                                <tr>
                                                    <th>@lang('labels.serial')</th>
                                                    <th>@lang('hm::bill.title') @lang('labels.number')</th>
                                                    <th>@lang('labels.date')</th>
                                                    <th>@lang('labels.amount')</th>
                                                    <th>@lang('hm::bill.payment_method')</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($checkin->payments as $payment)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><a href="{{ route('check-in-payments.show', [$checkin->id, $payment->id]) }}">BILL{{$payment->shortcode}}</a>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($payment->create_at)->format('d/m/Y') }}</td>
                                                        <td>{{ $payment->amount }}</td>
                                                        <td>{{ $payment->type }}</td>
                                                        <td><a href="javascript:;"><i class="la la-eye"></i></a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <p><span class="text-bold-600">Total Payment: {{ $checkin->payments()->sum('amount') }}</span></p>

                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body" style="padding-left: 20px;">
                            <div class="form-actions">
                                <a class="btn btn-warning mr-1" role="button" href="{{ route('check-in.show',  $checkin->id) }}">
                                    <i class="ft-x"></i> Cancel
                                </a>
                                <a class="btn btn-success mr-1" role="button" href="{{ route('check-in-payments.create', $checkin->id) }}">
                                    <i class="ft-credit-card"></i> Make Payment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





