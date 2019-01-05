@extends('hm::layouts.master')
@section('title', trans('hm::bill.bill_details'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Form wizard with number tabs section start -->
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('hm::bill.bill_details')}}</h4>
                                    <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-h font-medium-3"></i></a>
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
                                            <div class="col-12">
                                                <h4><i class="la  la-user"></i> {{ trans('hm::booking-request.personal_information') }}</h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>@lang('labels.name'): </strong><span id="primary-contact-name">{{ $checkin->requester->first_name }} {{ $checkin->requester->middle_name }} {{ $checkin->requester->last_name }}</span><br>
                                                        <strong>@lang('hm::booking-request.contact'): </strong><span id="primary-contact-contact">{{ $checkin->requester->contact }}</span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>@lang('hm::booking-request.start_date'): </strong><span id="start_date_display">{{ \Carbon\Carbon::parse($checkin->start_date)->format('d/m/Y') }}</span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>@lang('hm::booking-request.end_date'): </strong><span id="end_date_display">{{ \Carbon\Carbon::parse($checkin->end_date)->format('d/m/Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4><i class="la  la-building-o"></i> {{ trans('hm::booking-request.room_type') }}</h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="billing-table" class="table table-bordered table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th>{{ trans('hm::booking-request.room_type') }}</th>
                                                                    <th>{{ trans('hm::booking-request.quantity') }}</th>
                                                                    <th>{{ trans('hm::booking-request.duration') }}</th>
                                                                    <th>{{ trans('hm::booking-request.rate_type') }}</th>
                                                                    <th>{{ trans('hm::booking-request.rate') }}</th>
                                                                    <th>{{ trans('hm::booking-request.total_rate') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($checkin->roomInfos as $roomInfo)
                                                                        <tr>
                                                                            <td>{{ $roomInfo->roomType->name }}</td>
                                                                            <td>{{ $roomInfo->quantity }}</td>
                                                                            <td>{{ \Carbon\Carbon::parse($checkin->start_date)->format('d/m/Y') }} To {{ \Carbon\Carbon::parse($checkin->end_date)->format('d/m/Y') }}</td>
                                                                            <td>
                                                                                @if($roomInfo->rate_type == 'govt')
                                                                                {{ trans('hm::roomtype.govt_type') }}
                                                                                    @elseif($roomInfo->rate_type == 'ge')
                                                                                    {{ trans('hm::roomtype.general_type') }}
                                                                                @elseif($roomInfo->rate_type == 'bard-emp')
                                                                                    {{ trans('hm::roomtype.bard_emp_type') }}
                                                                                @elseif($roomInfo->rate_type == 'special')
                                                                                    {{ trans('hm::roomtype.special_type') }}

                                                                                 @endif
                                                                            </td>
                                                                            <td>{{ $roomInfo->rate }} x {{ $roomInfo->quantity }}</td>
                                                                            <td>{{ number_format($roomInfo->rate   *  $roomInfo->quantity, 2) }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12"><p style="float: right"><b>{{ trans('hm::checkin.grand_total_bill') }} - {{ number_format($checkin->roomInfos->sum(function ($roomInfo) { return $roomInfo->rate * $roomInfo->quantity; }), 2) }}  &#2547;</b></p></div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(count($checkin->guestInfos))
                                            <br><br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4><i class="la  la-users"></i> {{ trans('hm::booking-request.guest_information') }}</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="table-responsive">
                                                                <table id="guests-info-table" class="table table-bordered table-striped">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>{{ trans('labels.name') }}</th>
                                                                        <th>{{ trans('hm::booking-request.age') }}</th>
                                                                        <th>{{ trans('hm::booking-request.gender') }}</th>
                                                                        <th>{{ trans('hm::booking-request.relation') }}</th>
                                                                        <th>{{ trans('hm::booking-request.address') }}</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($checkin->guestInfos as $guestInfo)
                                                                        <tr>
                                                                            <td>{{ $guestInfo->first_name }}  {{ $guestInfo->middle_name }} {{ $guestInfo->last_name }}</td>
                                                                            <td>{{ $guestInfo->age }}</td>
                                                                            <td>{{ $guestInfo->gender == 'male' ? trans('hm::booking-request.male') : trans('hm::booking-request.female') }}</td>
                                                                            <td>{{ $guestInfo->relation }}</td>
                                                                            <td>{{ $guestInfo->address}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if(count($checkin->payments))
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4><i class="la  la-building-o"></i> {{ trans('hm::bill.payment_details') }}</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="table-responsive">
                                                                <table id="guests-info-table" class="table table-bordered table-striped">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>@lang('labels.serial')</th>
                                                                        <th>@lang('hm::bill.title') @lang('labels.number')</th>
                                                                        <th>@lang('labels.date')</th>
                                                                        <th>@lang('labels.amount')</th>
                                                                        <th>@lang('hm::bill.payment_method')</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($checkin->payments as $payment)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>BILL{{$payment->shortcode}}</td>
                                                                            <td>{{ \Carbon\Carbon::parse($payment->create_at)->format('d/m/Y') }}</td>
                                                                            <td>{{ $payment->amount }}</td>
                                                                            <td>@if($payment->type == 'cash')
                                                                                    {{ trans('hm::checkin.cash') }}
                                                                                    @elseif($payment->type == 'card')
                                                                                    {{ trans('hm::checkin.card') }}
                                                                                    @else
                                                                                    {{ trans('hm::checkin.check') }}
                                                                                    @endif

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
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with number tabs section end -->
            </div>
        </div>
    </div>
@endsection


