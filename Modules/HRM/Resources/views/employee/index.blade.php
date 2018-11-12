@extends('hrm::layouts.master')
@section('title', 'Employee List ')
{{--@section("employee_create", 'active')--}}


@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Employee List</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url('/hrm/employee/create')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> Add New Employee</a>

                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination" id="Example1">
                                    <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">ID No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tel (office)</th>
                                        <th scope="col">Mobile(one)</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($employeeList)
                                        @foreach($employeeList as $employee)

                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <th>ID No</th>
                                                <td>{{$employee->first_name . " " . $employee->last_name}}</td>
                                                <td>{{$employee->designation}}</td>
                                                <td>{{$employee->gender}}</td>
                                                <td>{{$employee->employeeDepartment->name}}</td>
                                                <td>{{$employee->status}}</td>
                                                <td>{{$employee->tel_office}}</td>
                                                <td>{{$employee->mobile_one}}</td>

                                                {{--<td>--}}
                                                {{--@if($projectRequest->status == 0)--}}
                                                {{--<span class="badge badge-warning">Pending</span>--}}
                                                {{--@elseif($projectRequest->status == 1)--}}
                                                {{--<span class="badge badge-success">Approved</span>--}}
                                                {{--@else--}}
                                                {{--<span class="badge badge-danger">Rejected</span>--}}
                                                {{--@endif--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                {{--<span class="dropdown">--}}
                                                <td>
                                                    <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                        <i class="la la-cog"></i></button>
                                                    <span aria-labelledby="btnSearchDrop2"
                                                          class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{ url('/hrm/employee',$employee->id) }}"
                                                           class="dropdown-item"><i class="ft-eye"></i> Details</a>

                                                        <a href="{{ url('project_request.edit', $employee->id)  }}"
                                                           class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>

                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-js')
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


    <script>

        //        table export configuration
        $(document).ready(function () {
            $('#Example1').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy', className: 'copyButton',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                        }
                    },
                    {
                        extend: 'excel', className: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                        }
                    },
                    {
                        extend: 'pdf', className: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                        }
                    },
                    {
                        extend: 'print', className: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                        }
                    },
                ],
                paging: false,
                searching: false,
                "bDestroy": true,
            });
        });

        //        tab link activation
        var url = document.URL;
        var hash = url.substring(url.indexOf('#'));

        $(".nav-tabs").find("li a").each(function (key, val) {
            if (hash == $(val).attr('href')) {
                $(val).click();
            }

            $(val).click(function (ky, vl) {
                location.hash = $(this).attr('href');
            });
        });
    </script>

@endpush

@push('page-css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>

@endpush