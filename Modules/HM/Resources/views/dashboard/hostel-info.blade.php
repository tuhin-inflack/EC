<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">@lang('hm::hostel.menu_title') @lang('labels.chart')</h4>
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
                    <canvas id="simple-pie-chart" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
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
                                <th>@lang('hm::hostel.total_rooms')</th>
                                <th>@lang('hm::hostel.booked_rooms')</th>
                                <th>@lang('hm::hostel.available_rooms')</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="la la-building warning font-large-2"></i>
                                        </div>
                                        <div class="col-10">
                                            <h4 class="">
                                                <a href="{{ route('room.chart') }}"
                                                   class="text-capitalize">HOSTEL NAME</a>
                                            </h4>
                                            <span>number of floors 5</span>
                                        </div>
                                    </div>
                                </th>
                                <th><h2>25</h2></th>
                                <th><h2>15</h2></th>
                                <th><h2>10</h2></th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="la la-building warning font-large-2"></i>
                                        </div>
                                        <div class="col-10">
                                            <h4 class="">
                                                <a href="{{ route('room.chart') }}"
                                                   class="text-capitalize">HOSTEL NAME</a>
                                            </h4>
                                            <span>number of floors 6</span>
                                        </div>
                                    </div>
                                </th>
                                <th><h2>67</h2></th>
                                <th><h2>41</h2></th>
                                <th><h2>26</h2></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>