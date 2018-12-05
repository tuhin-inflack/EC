@extends('hm::layouts.master')
@section('title', 'Approved Booking Requests')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Approved Booking Request List</h4>
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
                                <table id="store-entry-table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Booked By</th>
                                        <th>Booked For</th>
                                        <th>Booking Type</th>
                                        <th>Organization</th>
                                        <th>Contact</th>
                                        <th>Number of guest</th>
                                        <th>Reference</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Hasib Noor</td>
                                            <td>05-12-2018 to 12-12-2018</td>
                                            <td>Official</td>
                                            <td>Inflack Limited</td>
                                            <td>01718874510</td>
                                            <td>112</td>
                                            <td>Abdur Razzak</td>
                                            <td>
                                                <div class="row justify-content-center">
                                                    <a href="" class="btn btn-sm btn-primary">
                                                        <i class="ft-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
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
@endsection

@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
@endpush

@push('page-js')
    <script src="{{ asset('theme/js/scripts/tables/datatables/datatable-advanced.js') }}"
            type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#store-entry-table').DataTable({
                paging: false,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [7, ':visible']
                        }
                    },
                ]
            });
        });
    </script>

@endpush