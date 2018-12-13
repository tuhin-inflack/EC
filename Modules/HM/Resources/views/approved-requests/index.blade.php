@extends('hm::layouts.master')
@section('title', 'Check Approved Booking Requests')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Search Approved Booking Request</h4>
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <select class="select2 form-control" onchange="location = this.options[this.selectedIndex].value;">
                                                        <option>Search Here</option>
                                                        <option value="{{ route('approved-booking-requests.edit') }}">018xxxxxxxx</option>
                                                        <option value="{{ route('approved-booking-requests.edit') }}">017xxxxxxxx</option>
                                                        <option value="{{ route('approved-booking-requests.edit') }}">016xxxxxxxx</option>
                                                        <option value="{{ route('approved-booking-requests.edit') }}">015xxxxxxxx</option>
                                                        <option value="{{ route('approved-booking-requests.edit') }}">018xxxxxxxx</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
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