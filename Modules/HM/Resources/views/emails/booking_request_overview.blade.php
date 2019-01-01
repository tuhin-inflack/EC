@extends('layouts.email')
@section('title', trans('hm::booking-request.title'))

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
                                    <h4 class="card-title">{{ trans('hm::booking-request.booking_details') }}</h4>
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
                                        <h6>{{ trans('hm::booking-request.booking_details') }}</h6>
                                        <fieldset>
                                            <h4 class="form-section"><i
                                                        class="la  la-building-o"></i>{{ trans('hm::booking-request.billing_information') }}
                                            </h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>@lang('labels.name'): </strong><span
                                                            id="primary-contact-name">{{ $bookingRequestData['first_name'] . " " . $bookingRequestData['middle_name']. " " . $bookingRequestData['last_name']}}</span><br>
                                                    <strong>@lang('hm::booking-request.contact'): </strong><span
                                                            id="primary-contact-contact">{{ $bookingRequestData['contact'] }}</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>@lang('hm::booking-request.start_date'): </strong><span
                                                            id="start_date_display">{{ $bookingRequestData['start_date'] }}</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>@lang('hm::booking-request.end_date'): </strong><span
                                                            id="end_date_display">{{ $bookingRequestData['end_date'] }}</span>
                                                </div>
                                            </div>
                                            <br>
                                            <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.room_type') }}</h4>
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table id="billing-table"
                                                           class="table table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>{{ trans('hm::booking-request.room_type') }}</th>
                                                            <th>{{ trans('hm::booking-request.quantity') }}</th>
                                                            {{--<th>{{ trans('hm::booking-request.duration') }}</th>--}}
                                                            {{--<th>{{ trans('hm::booking-request.rate_type') }}</th>--}}
                                                            <th>{{ trans('hm::booking-request.rate') }}</th>
                                                        </tr>
                                                        @if(count($bookingRequestData['roomInfos'])>0)
                                                            @foreach($bookingRequestData['roomInfos'] as $roomInfo)
                                                                <tr>
                                                                    <td>{{ $roomInfo['room_type_id'] }}</td>
                                                                    <td>{{ $roomInfo['quantity'] }}</td>
                                                                    <td>{{ $roomInfo['rate'] }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="guests-info-div">
                                                <h4 class="form-section"><i
                                                            class="la  la-building-o"></i>{{ trans('hm::booking-request.guest_information') }}
                                                </h4>
                                                <div class="row">
                                                    <div class="table-responsive">
                                                        <table id="guests-info-table"
                                                               class="table table-bordered table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>{{ trans('labels.name') }}</th>
                                                                <th>{{ trans('hm::booking-request.age') }}</th>
                                                                <th>{{ trans('hm::booking-request.gender') }}</th>
                                                                <th>{{ trans('hm::booking-request.relation') }}</th>
                                                                <th>{{ trans('hm::booking-request.address') }}</th>
                                                            </tr>
                                                            @if(count($bookingRequestData['guests'])>0)
                                                                @foreach($bookingRequestData['guests'] as $guest)
                                                                    <tr>
                                                                        <td>{{ $guest['name'] }}</td>
                                                                        <td>{{ $guest['age'] }}</td>
                                                                        <td>{{ $guest['gender'] }}</td>
                                                                        <td>{{ $guest['relation'] }}</td>
                                                                        <td>{{ $guest['address'] }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bard-referee-summary-div">
                                                <h4 class="form-section"><i
                                                            class="la  la-building-o"></i>{{ trans('hm::booking-request.bard_reference') }}
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-6 row">
                                                        <div class="col-md-12">
                                                            <strong>@lang('labels.name'): </strong><span id="bard-referee-name">{{ $bookingRequestData['employee_id'] }}</span><br>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <strong>@lang('hm::booking-request.designation')
                                                                : </strong><span id="bard-referee-designation">{{ $bookingRequestData['designation'] }}</span><br>
                                                        </div>
                                                        {{--<div class="col-md-12">--}}
                                                            {{--<strong>@lang('hm::booking-request.department')--}}
                                                                {{--: </strong><span id="bard-referee-department">{{ $bookingRequestData['designation'] }}</span><br>--}}
                                                        {{--</div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
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