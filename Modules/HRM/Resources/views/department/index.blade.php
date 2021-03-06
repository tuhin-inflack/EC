@extends('hrm::layouts.master')
@section('title', trans('hrm::department.page_card_title'))
{{--@section("employee_create", 'active')--}}


@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('hrm::department.page_card_title')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url('/hrm/department/create')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i>@lang('labels.add')</a>

                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination" id="DepartmentTable">
                                    <thead>
                                    <tr>
                                        <th>@lang('labels.serial')</th>
                                        <th>@lang('labels.name')</th>
                                        <th>@lang('labels.code')</th>
                                        <th>@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($departmentList) && count($departmentList)>0)
                                        @foreach($departmentList as $department)

                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <th>{{ $department->name }}</th>
                                                <td>{{$department->department_code}}</td>

                                                <td>
                                                    <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                        <i class="la la-cog"></i></button>
                                                    <span aria-labelledby="btnSearchDrop2"
                                                          class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{ url('/hrm/department',$department->id) }}"
                                                           class="dropdown-item"><i class="ft-eye"></i> @lang('labels.details')</a>
                                                         <div class="dropdown-divider"></div>
                                                        <a href="{{ url('/hrm/department/' . $department->id . '/edit')  }}"
                                                           class="dropdown-item"><i class="ft-edit-2"></i> @lang('labels.edit')</a>

                                                         <div class="dropdown-divider"></div>
                                                        {!! Form::open(['url' =>  ['/hrm/department', $department->id], 'method' => 'DELETE', 'class' => 'form',' novalidate']) !!}

                                                        {!! Form::button('<i class="ft-trash"></i> '.trans('labels.delete'), array(
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
