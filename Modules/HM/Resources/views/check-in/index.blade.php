@extends('hm::layouts.master')
@section('title', 'Check In List')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">@lang('hm::booking-request.check_in') @lang('labels.list')</h4>
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
                                        @php $count = 0 @endphp
                                        @for($i = rand(2, 10); $i > 1; $i--)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td><a href="{{ route('check-in.show') }}" >CNXXXXX{{$i}}</a></td>
                                                <td>BK{{$i}}XXX</td>
                                                <td>{{ date('d.m.Y',strtotime("-".$i." days")) }}</td>
                                                <td>{{ date('d.m.Y') }}</td>
                                                <td>{{$i}}</td>
                                            </tr>
                                        @endfor
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