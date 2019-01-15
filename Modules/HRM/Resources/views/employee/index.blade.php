@extends('hrm::layouts.master')
@section('title', trans('hrm::employee.list_title'))
{{--@section("employee_create", 'active')--}}


@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('hrm::employee.list_title')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url('/hrm/employee/create')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> @lang('labels.add')</a>

                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination" id="Example1">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('labels.serial')</th>
                                        <th scope="col">@lang('labels.id')</th>
                                        <th scope="col">@lang('labels.name')</th>
                                        <th scope="col">@lang('hrm::designation.designation')</th>
                                        <th scope="col">@lang('labels.gender')</th>
                                        <th scope="col">@lang('hrm::department.department')</th>
                                        <th scope="col">@lang('labels.status')</th>
                                        <th scope="col">@lang('labels.tel')</th>
                                        <th scope="col">@lang('labels.mobile')</th>
                                        <th scope="col">@lang('labels.action')</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($employeeList)>0)
                                        @foreach($employeeList as $employee)

                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <th>{{ $employee->employee_id }}</th>
                                                <td>{{$employee->first_name . " " . $employee->last_name}}</td>
                                                <td>{{$employee->designation->name}}</td>
                                                <td>{{$employee->gender}}</td>
                                                <td>{{isset($employee->employeeDepartment->name) ? $employee->employeeDepartment->name : ''}}</td>
                                                <td>{{$employee->status}}</td>
                                                <td>{{$employee->tel_office}}</td>
                                                <td>{{$employee->mobile_one}}</td>

                                                <td>
                                                    <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                        <i class="la la-cog"></i></button>
                                                    <span aria-labelledby="btnSearchDrop2"
                                                          class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{ url('/hrm/employee',$employee->id) }}"
                                                           class="dropdown-item"><i class="ft-eye"></i> @lang('labels.details')</a>
                                                            <div class="dropdown-divider"></div>
                                                        <a href="{{ url('/hrm/employee/' . $employee->id . '/edit')  }}"
                                                           class="dropdown-item"><i class="ft-edit-2"></i> @lang('labels.edit')</a>

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
                        extend: 'pdf', className: 'pdf', "charset": "utf-8",
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
                paging: true,
                searching: true,
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
