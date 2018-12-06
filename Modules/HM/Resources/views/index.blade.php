@extends('hm::layouts.master')
@section('title', 'Hostel')

@section('content')
    <h1>
        Dashboard
        <span class="font-size-base">
            Module: {!! config('hm.name') !!}
        </span>
    </h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Hostels</h4>
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
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>Hostal</th>
                                        <th>Total Rooms</th>
                                        <th>Booked Rooms</th>
                                        <th>Available Rooms</th>
                                        <th>Hostel Details</th>
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
                                                    <h1 class="">HOSTEL NAME</h1>
                                                    <span>number of floors 5</span>
                                                </div>
                                            </div>
                                        </th>
                                        <th><h2>25</h2></th>
                                        <th><h2>15</h2></th>
                                        <th><h2>10</h2></th>
                                        <th>
                                            <a href="{{ route('hostels.detail') }}" class="btn btn-info">Details</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="la la-building warning font-large-2"></i>
                                                </div>
                                                <div class="col-10">
                                                    <h1 class="">HOSTEL NAME</h1>
                                                    <span>number of floors 6</span>
                                                </div>
                                            </div>
                                        </th>
                                        <th><h2>67</h2></th>
                                        <th><h2>41</h2></th>
                                        <th><h2>26</h2></th>
                                        <th>
                                            <a href="{{ route('hostels.detail') }}" class="btn btn-info">Details</a>
                                        </th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
