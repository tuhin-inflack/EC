@extends('hrm::layouts.master')
@section('title', trans('hrm::designation.list_page_title'))
{{--@section("employee_create", 'active')--}}


@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('hrm::designation.list_page_title')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{route('employee-leave.apply')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> @lang('hrm::leave.leave_application')</a>

                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination" id="DepartmentTable">
                                    <thead>
                                    <tr>
                                        <th>@lang('labels.serial')</th>
                                        <th>@lang('hrm::leave.leave_type')</th>
                                        <th>@lang('hrm::leave.leave_start_date')</th>
                                        <th>@lang('hrm::leave.leave_end_date')</th>
                                        <th>@lang('hrm::leave.leave_duration')</th>
                                        <th>@lang('hrm::leave.leave_application_date')</th>
                                        <th>@lang('labels.status')</th>
                                        <th>@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($leaves as $leave)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <th>{{ $leave['type'] }}</th>
                                            <th>{{ $leave['from'] }}</th>
                                            <th>{{ $leave['to'] }}</th>
                                            <th>{{ $leave['duration'].' days' }}</th>
                                            <th>{{ $leave['created_at'] }}</th>
                                            <th>{{ $leave['status'] }}</th>

                                            <td>
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                    <i class="la la-cog"></i></button>
                                                <span aria-labelledby="btnSearchDrop2"
                                                      class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="" class="dropdown-item"><i class="ft-eye"></i> @lang('labels.details')</a>
                                                         <div class="dropdown-divider"></div>
                                                        <a href="" class="dropdown-item"><i class="ft-edit-2"></i> @lang('labels.edit')</a>
                                                         <div class="dropdown-divider"></div>
                                                        {!! Form::open(['url' =>  '', 'method' => 'DELETE', 'class' => 'form',' novalidate']) !!}

                                                    {!! Form::button('<i class="ft-trash"></i> ' . trans('labels.delete'), array(
                                                        'type' => 'submit',
                                                        'class' => 'dropdown-item',
                                                        'title' => 'Delete the hostel',
                                                        'onclick'=>'return confirmMessage()',
                                                    )) !!}
                                                    {!! Form::close() !!}
                                                </span>

                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach

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

        function confirmMessage() {
            if(!confirm("{{ trans('labels.confirm_delete') }}"))
                event.preventDefault();
        }
    </script>

@endpush
