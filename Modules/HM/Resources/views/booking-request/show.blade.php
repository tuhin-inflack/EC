@extends('hm::layouts.master')
@section('title', 'Booking Requests')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Booking Request Details</h4>
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
                            <p><span class="text-bold-600">Booking Information</span></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td class="width-150">Request ID</td>
                                                <td class="width-300">BARDXXXXXX</td>
                                            </tr>
                                            <tr>
                                                <td>Requested On</td>
                                                <td>03-12-2018</td>
                                            </tr>
                                            <tr>
                                                <td>Booked By</td>
                                                <td>Hasib Noor</td>
                                            </tr>
                                            <tr>
                                                <td>Organization</td>
                                                <td>Inflack Limited</td>
                                            </tr>
                                            <tr>
                                                <td>Designation</td>
                                                <td>Manageing Director</td>
                                            </tr>
                                            <tr>
                                                <td>Organization Type</td>
                                                <td>Private</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>xxxxxxxxxxx</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>hasib@inflack.com</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>Dhaka</td>
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
                                                <td class="width-150">Request ID</td>
                                                <td class="width-300">BARDXXXXXX</td>
                                            </tr>
                                            <tr>
                                                <td>Booking Type</td>
                                                <td>Single</td>
                                            </tr>
                                            <tr>
                                                <td>Check In</td>
                                                <td>03-12-2018</td>
                                            </tr>
                                            <tr>
                                                <td>Check Out</td>
                                                <td>03-12-2018</td>
                                            </tr>
                                            <tr>
                                                <td>No. of Guest</td>
                                                <td>3</td>
                                            </tr>
                                            <tr>
                                                <td>No. of Room</td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <td>Room Details</td>
                                                <td>2 (AC)</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td class="width-150">BARD Reference</td>
                                                <td class="width-300">Employee Name</td>
                                            </tr>
                                            <tr>
                                                <td>Designation</td>
                                                <td>Designation</td>
                                            </tr>
                                            <tr>
                                                <td>Department</td>
                                                <td>Department</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>xxxxxxxxxxx</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="padding-left: 20px;">
                            <p><span class="text-bold-600">Documents</span></p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td class="width-200">Photo</td>
                                                <td class="width-350">
                                                    <img src="{{asset('theme/images/backgrounds/bg-1.jpg')}}" alt="" height="100px" width="200px">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td>NID Front Part</td>
                                                <td>
                                                    <img src="{{asset('theme/images/backgrounds/bg-1.jpg')}}" alt="" height="100px" width="200px">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td>NID Back Part</td>
                                                <td>
                                                    <img src="{{asset('theme/images/backgrounds/bg-1.jpg')}}" alt="" height="100px" width="200px">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="padding-left: 20px;">
                            <p><span class="text-bold-600">Guest Information</span></p>
                            <div class="row">
                                <table class="table table-striped table-bordered" style="margin-left: 15px;margin-right: 15px;">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Mobile</th>
                                        <th>Organization</th>
                                        <th>Address</th>
                                        <th>Relation</th>
                                        <th>Document</th>
                                        <th>File</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Saib Bin Ron</td>
                                        <td>28</td>
                                        <td>Male</td>
                                        <td>xxxxxxxxxxxx</td>
                                        <td>Inflack Limited</td>
                                        <td>Dhaka</td>
                                        <td>Colleague</td>
                                        <td>NID</td>
                                        <td><a href="">File</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Sumon Siddik</td>
                                        <td>28</td>
                                        <td>Male</td>
                                        <td>xxxxxxxxxxxx</td>
                                        <td>Inflack Limited</td>
                                        <td>Dhaka</td>
                                        <td>Colleague</td>
                                        <td>NID</td>
                                        <td><a href="">File</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body" style="padding-left: 20px;">
                            <p><span class="text-bold-600">Note by Authority</span></p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message"
                                                  class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" placeholder="Write here..."
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
                                <a class="btn btn-warning mr-1" role="button" href="">
                                    <i class="ft-x"></i> Cancel
                                </a>
                                <a class="btn btn-secondary mr-1" role="button" href="">
                                    <i class="ft-x-circle"></i> Reject
                                </a>
                                <a class="btn btn-success mr-1" role="button" href="">
                                    <i class="ft-check"></i> Approve
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





