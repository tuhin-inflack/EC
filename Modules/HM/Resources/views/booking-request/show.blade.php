@extends('hm::layouts.master')
@section('title', 'Booking Request Show')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Booking Request Details</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
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

                                    <h4 class="form-section"><i class="la  la-building-o"></i>Booking Information</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-bordered table-light">
                                                <tbody>
                                                    <tr>
                                                        <td>Request ID</td>
                                                        <td>{{ $booking->request_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Requested On</td>
                                                        <td>{{ $booking->requested_on }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Booked By</td>
                                                        <td>{{ $booking->booked_by }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Organization</td>
                                                        <td>{{ $booking->organization }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Designation</td>
                                                        <td>{{ $booking->designation }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Organization Type</td>
                                                        <td>{{ $booking->organization_type }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone</td>
                                                        <td>{{ $booking->contact }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{ $booking->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td>{{ $booking->address }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-bordered table-light">
                                                <tbody>
                                                    <tr>
                                                        <td>Booking Type</td>
                                                        <td>{{ $booking->booking_type }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Check In</td>
                                                        <td>{{ $booking->check_in }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Check Out</td>
                                                        <td>{{ $booking->check_out }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>No. of Guest</td>
                                                        <td>{{ $booking->number_of_guest }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>No. of Room</td>
                                                        <td>{{ $booking->number_of_rooms }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Room Details</td>
                                                        <td>{{ $booking->room_details }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-bordered table-light">
                                                <tbody>
                                                <tr>
                                                    <td>BARD Reference</td>
                                                    <td>{{ $booking->reference }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Designation</td>
                                                    <td>{{ $booking->reference_designation }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Department</td>
                                                    <td>{{ $booking->reference_department }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>{{ $booking->reference_phone }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('booking-requests.index') }}" class="btn btn-outline-primary">Cancel</a>
                                <button type="button" class="btn btn-outline-danger">Reject</button>
                                <button type="button" class="btn btn-outline-success">Approved</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-css')
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/checkboxes-radios.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/wizard.css') }}">
@endpush

@push('page-js')
    <script src="{{ asset('theme/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/dateTime/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/wizard-steps.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/checkbox-radio.js') }}"></script>

    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#check-in-out').daterangepicker();
            $('#no-of-rooms-select').select2();
            $('.repeater-guest-information').repeater();
            $('.repeater-room-types').repeater({
                show: function () {
                    $(this).find('.select2-container').remove();
                    $(this).find('select').select2({
                        placeholder: 'Select item'
                    });
                    $(this).slideDown();
                }
            });
            $('#department-select').select2({
                placeholder: 'Select Department'
            });
            $('.room-type-select').select2({
                placeholder: 'Select Room Type'
            });
        });
    </script>
@endpush