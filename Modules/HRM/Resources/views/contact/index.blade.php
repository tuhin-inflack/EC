@extends('hrm::layouts.master')
@section('title', 'Contact')
@push('page-css')
@endpush

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('hrm::designation.list_page_title')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url('/hrm/designation/create')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> @lang('labels.add')</a>

                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination text-center" id="DepartmentTable">
                                    <thead>
                                    <tr>
                                        {{--<th>@lang('labels.serial')</th>--}}
                                        {{--<th>@lang('labels.name')</th>--}}
                                        {{--<th>@lang('labels.short_name')</th>--}}
                                        {{--<th>@lang('labels.action')</th>--}}
                                        {{----}}
                                        <th>@lang('labels.serial')</th>
                                        <th>@lang('labels.name')</th>
                                        <th>Type</th>
                                        <th>@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mohammad Imran Hossain</td>
                                        <td>Client</td>

                                        <td>
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                <i class="la la-cog"></i></button>
                                            <span aria-labelledby="btnSearchDrop2"
                                                  class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{url('hrm/contact/12')}}"
                                                           class="dropdown-item"><i class="ft-eye"></i> @lang('labels.details')</a>
                                                         <div class="dropdown-divider"></div>
                                                         <a href="#" class="dropdown-item"><i class="ft ft-trash"></i> @lang('labels.delete')</a>
                                                </span>
                                            </span>
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
            if (!confirm("{{ trans('labels.confirm_delete') }}"))
                event.preventDefault();
        }
    </script>

@endpush


