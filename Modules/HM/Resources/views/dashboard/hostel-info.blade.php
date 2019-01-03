<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">@lang('hm::hostel.menu_title') @lang('labels.chart')</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <canvas id="hostel-pie-chart" height="350"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">@lang('hm::hostel.menu_title')</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        {{--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>--}}
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th>@lang('hm::hostel.menu_title')</th>
                                <th>@lang('hm::hostel.floor') @lang('labels.number')</th>
                                <th>@lang('hm::hostel.total_rooms')</th>
                                <th>@lang('hm::hostel.booked_rooms')</th>
                                <th>@lang('hm::hostel.available_rooms')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hostels as $hostel)
                                @php
                                    $totalRooms = count($hostel->rooms);
                                    $totalAvailableRooms = 0;
                                    $totalBookedRooms = 0;
                                @endphp
                                @foreach($hostel->rooms as $room)
                                    @if($room['status'] === 'unavailable')
                                        @php $totalBookedRooms++; @endphp
                                    @elseif($room['status'] === 'available' || $room['status'] === 'partially-available')
                                        @php $totalAvailableRooms++; @endphp
                                    @endif
                                @endforeach
                                <tr>
                                    <th>
                                        <label class="text-info text-capitalize">{{ $hostel->name }}</label>
                                    </th>
                                    <th><h4>{{ $hostel->total_floor}}</h4></th>
                                    <th><h4>{{ $totalRooms }}</h4></th>
                                    <th><h4>{{ $totalBookedRooms }}</h4></th>
                                    <th><h4>{{ $totalAvailableRooms }}</h4></th>
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