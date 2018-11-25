@extends('hrm::layouts.master')
@section('title', 'Designation List ')
{{--@section("employee_create", 'active')--}}


@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Designation List</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url('/hrm/designation/create')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> Add New Designation</a>

                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination" id="DepartmentTable">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Designation Name</th>
                                        <th>Short Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($designationList) && count($designationList)>0)
                                        @foreach($designationList as $designation)

                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <th>{{ $designation->name }}</th>
                                                <td>{{ $designation->short_name }}</td>

                                                <td>
                                                    <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                        <i class="la la-cog"></i></button>
                                                    <span aria-labelledby="btnSearchDrop2"
                                                          class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{ url('/hrm/designation',$designation->id) }}"
                                                           class="dropdown-item"><i class="ft-eye"></i> Details</a>
                                                         <div class="dropdown-divider"></div>
                                                        <a href="{{ url('/hrm/designation/' . $designation->id . '/edit')  }}"
                                                           class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>

                                                         <div class="dropdown-divider"></div>
                                                        {!! Form::open(['url' =>  ['/hrm/designation', $designation->id], 'method' => 'DELETE', 'class' => 'form',' novalidate']) !!}

                                                        {!! Form::button('<i class="ft-trash"></i> Delete ', array(
                                                            'type' => 'submit',
                                                            'class' => 'dropdown-item',
                                                            'title' => 'Delete the hostel',
                                                            'onclick'=>'return confirm("Are you sure you want to delete?")',
                                                        )) !!}
                                                        {!! Form::close() !!}
                                                </span>

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
            $('#DepartmentTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy', className: 'copyButton',
                        exportOptions: {
                            columns: [0, 1, 2],
                        }
                    },
                    {
                        extend: 'excel', className: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2],
                        }
                    },
                    {
                        extend: 'pdf', className: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2],
                        }
                    },
                    {
                        extend: 'print', className: 'print',
                        exportOptions: {
                            columns: [0, 1, 2],
                        }
                    },
                ],
                paging: true,
                searching: true,
                "bDestroy": true,
            });
        });

    </script>

@endpush

@push('page-css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>

@endpush