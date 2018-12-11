@extends('hm::layouts.master')
@section('title', 'Room History')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">{{trans('hm::hostel.room')}} Chart</h4>
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
                                <div class="col-md-6">
                                    <i class="la la-building"></i> <span class="font-size-large">Hostal Name</span>
                                </div>
                                <div class="col-md-6">
                                    <div class="pull-right">
                                    <i class="la la-square text-warning"></i> Booked: 15
                                    <i class="la la-square-o"></i> Available: 10
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th width="15%">Levels</th>
                                                <th colspan="42">Room Numbers</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @for($level = 5; $level > 0 ; $level--)
                                            <tr>
                                                <td>Level {{$level}}</td>
                                                @for($room = 1; $room <= 5 ; $room++ )
                                                    <td
                                                        @if($level*$room%4)
                                                        class="bg-warning"
                                                        @endif
                                                    >
                                                        <h5>{{$level}}{{$room}}</h5>
                                                        @if($level%$room)
                                                            <span>AC</span>
                                                        @endif
                                                    </td>
                                                @endfor
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
    </div>
@endsection
@push('page-js')

@endpush