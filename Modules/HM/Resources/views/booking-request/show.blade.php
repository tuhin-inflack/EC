@extends('hm::layouts.master')
@section('title', 'Booking Requests')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"
                            id="basic-layout-form">@lang('hm::booking-request.booking_request') @lang('labels.details')</h4>
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
                            <p><span class="text-bold-600">@lang('hm::booking-request.booking_details')</span></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td class="width-150">@lang('hm::booking-request.request_id')</td>
                                                <td class="width-300">{{ $roomBooking->shortcode }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.requested_on')</td>
                                                <td>{{ $roomBooking->created_at->format('d/m/Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.booked_by')</td>
                                                <td>{{ $roomBooking->requester->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.organization')</td>
                                                <td>{{ $roomBooking->requester->organization }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.designation')</td>
                                                <td>{{ $roomBooking->requester->designation }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.organization_type')</td>
                                                <td>{{ $roomBooking->requester->organization_type }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.contact')</td>
                                                <td>{{ $roomBooking->requester->contact }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.email')</td>
                                                <td>{{ $roomBooking->requester->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.address')</td>
                                                <td>{{ $roomBooking->requester->address }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td class="width-150">@lang('hm::booking-request.request_id')</td>
                                                <td class="width-300">{{ $roomBooking->shortcode }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.booking_type')</td>
                                                <td>{{ $roomBooking->booking_type }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.check_in')</td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $roomBooking->start_date)->format('d/m/Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.check_out')</td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $roomBooking->end_date)->format('d/m/Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.no_of_guests')</td>
                                                <td>{{ $roomBooking->guestInfos->count() }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.no_of_rooms')</td>
                                                <td>{{ $roomBooking->roomInfos->sum('quantity') }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.room_details')</td>
                                                <td>
                                                    @foreach($roomBooking->roomInfos as $roomInfo)
                                                        {{ $roomInfo->quantity }} ({{ $roomInfo->roomType->name }})
                                                    @endforeach
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td class="width-150">@lang('hm::booking-request.bard_reference')</td>
                                                <td class="width-300">{{ $roomBooking->referee->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.designation')</td>
                                                <td>Designation</td>
                                                <!-- TODO: dynamic designation -->
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.department')</td>
                                                <td>{{ $roomBooking->referee->department->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('hm::booking-request.contact')</td>
                                                <td>{{ $roomBooking->referee->contact }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p><span class="text-bold-600">@lang('hm::booking-request.documents')</span></p>
                            <div class="row card-deck">
                                <figure class="card card-img-top border-grey border-lighten-2"
                                        itemprop="associatedMedia" itemscope=""
                                        itemtype="http://schema.org/ImageObject">
                                    <a href="{{ asset('theme/images/backgrounds/bg-1.jpg') }}" itemprop="contentUrl"
                                       data-size="480x360">
                                        <img class="gallery-thumbnail card-img-top"
                                             src="{{ asset('theme/images/backgrounds/bg-1.jpg') }}" itemprop="thumbnail"
                                             alt="Image description">
                                    </a>
                                    <div class="card-body px-0">
                                        <h4 class="card-title">@lang('hm::booking-request.your_photo')</h4>
                                    </div>
                                </figure>
                                <figure class="card card-img-top border-grey border-lighten-2"
                                        itemprop="associatedMedia" itemscope=""
                                        itemtype="http://schema.org/ImageObject">
                                    <a href="{{ asset('theme/images/backgrounds/bg-1.jpg') }}" itemprop="contentUrl"
                                       data-size="480x360">
                                        <img class="gallery-thumbnail card-img-top"
                                             src="{{ asset('theme/images/backgrounds/bg-1.jpg') }}" itemprop="thumbnail"
                                             alt="Image description">
                                    </a>
                                    <div class="card-body px-0">
                                        <h4 class="card-title">@lang('hm::booking-request.nid_copy')</h4>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        @if($roomBooking->guestInfos->count())
                            <div class="card-body" style="padding-left: 20px;">
                                <p><span class="text-bold-600">@lang('hm::booking-request.guest_information')</span></p>
                                <div class="row">
                                    <table class="table table-striped table-bordered"
                                           style="margin-left: 15px;margin-right: 15px;">
                                        <thead>
                                        <tr>
                                            <th>@lang('labels.serial')</th>
                                            <th>@lang('labels.name')</th>
                                            <th>@lang('hm::booking-request.age')</th>
                                            <th>@lang('hm::booking-request.gender')</th>
                                            <th>@lang('hm::booking-request.address')</th>
                                            <th>@lang('hm::booking-request.relation')</th>
                                            <th>@lang('hm::booking-request.nid')</th>
                                            <th>@lang('hm::booking-request.nid_copy')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roomBooking->guestInfos as $guestInfo)
                                            <tr>
                                                <td>{{ $guestInfo->name }}</td>
                                                <td>{{ $guestInfo->age }}</td>
                                                <td>{{ $guestInfo->gender }}</td>
                                                <td>{{ $guestInfo->address }}</td>
                                                <td>{{ $guestInfo->relation }}</td>
                                                <td>{{ $guestInfo->nid_no }}</td>
                                                <td>{{ $guestInfo->nid_doc }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                        <div class="card-body" style="padding-left: 20px;">
                            <p><span class="text-bold-600">@lang('hm::booking-request.note_of_authority')</span></p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message"
                                                  class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"
                                                  placeholder="Write here..."
                                                  id="" cols="30" rows="5">{{ old('message') }}</textarea>

                                        @if ($errors->has('message'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="padding-left: 20px;">
                            <div class="form-actions">
                                <a class="btn btn-warning mr-1" role="button" href="{{ route('booking-requests.index') }}">
                                    <i class="ft-x"></i> @lang('labels.cancel')
                                </a>
                                @if($roomBooking->status != 'pending')
                                    <form style="display: inline"
                                          action="{{ route('booking-request-status.edit', $roomBooking->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')
                                        {{ Form::hidden('status', 'pending') }}
                                        <button class="btn btn-secondary mr-1" type="submit"><i
                                                    class="ft-alert-circle"></i> @lang('hm::booking-request.pending')
                                        </button>
                                    </form>
                                @endif
                                @if($roomBooking->status != 'rejected')
                                    <form style="display: inline"
                                          action="{{ route('booking-request-status.edit', $roomBooking->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')
                                        {{ Form::hidden('status', 'rejected') }}
                                        <button class="btn btn-danger
                                         mr-1" type="submit"><i
                                                    class="ft-x-circle"></i> @lang('hm::booking-request.reject')
                                        </button>
                                    </form>
                                @endif
                                @if($roomBooking->status != 'approved')
                                    <form style="display: inline"
                                          action="{{ route('booking-request-status.edit', $roomBooking->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')
                                        {{ Form::hidden('status', 'approved') }}
                                        <button class="btn btn-success mr-1" type="submit"><i
                                                    class="ft-check"></i> @lang('hm::booking-request.approve')
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





