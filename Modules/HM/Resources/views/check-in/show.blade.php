@extends('hm::layouts.master')
@section('title', 'Check In Details')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Check In Details</h4>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <p><span class="text-bold-600">Booking Information</span></p>
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
                                <div class="col-md-6">
                                    <p><span class="text-bold-600">Check In Information</span></p>
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

                                    <p><span class="text-bold-600">Guest Information</span></p>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Organization</th>
                                                <th>Document</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Saib Bin Ron</td>
                                                <td>xxxxxxxxxxxx</td>
                                                <td>Inflack Limited</td>
                                                <td><a href="javascript:;">File</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Sumon Siddik</td>
                                                <td>xxxxxxxxxxxx</td>
                                                <td>Inflack Limited</td>
                                                <td><a href="javascript:;">File</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="padding-left: 20px;">
                            <p><span class="text-bold-600">Note by Authority</span></p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" placeholder="Write here..." rows="3" disabled>This is the notes from Authorities</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <a class="btn btn-outline-danger mr-1" role="button" href="{{ route('check-in.index') }}">
                                    <i class="ft-x"></i> Cancel
                                </a>
                                <a class="btn btn-success mr-1" role="button" href="javascript:confirm('Check Out !!');">
                                    <i class="ft-check-circle"></i> Check out
                                </a>
                                <a class="btn btn-info mr-1" role="button" href="{{ route('bill.create') }}">
                                    <i class="ft-file-plus"></i> Create Bill
                                </a>
                                <a class="btn btn-outline-primary mr-1" role="button" href="{{ route('bill.payments-of-check-in') }}">
                                    <i class="ft-list"></i> Payments
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





