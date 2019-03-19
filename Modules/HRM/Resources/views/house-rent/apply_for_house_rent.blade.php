@extends('hrm::layouts.master')


@section('title', 'House Rent')


@section('content')

    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">House Information</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <table class="table table-striped table-bordered zero-configuration text-center">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>House No 1</td>
                                    <td>Regular</td>
                                    <td><p class="badge badge-success">Free</p></td>
                                    <td>
                                        @can('admin-access')
                                            <a href="{{ url('hrm/house-rent/apply') }}"
                                               class="btn btn-sm btn-primary">Apply</a>

                                        @endcan
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>House No 1</td>
                                    <td>Medium</td>
                                    <td><p class="badge badge-success">Free</p></td>
                                    <td>
                                        @can('admin-access')
                                            <a href="{{ url('hrm/house-rent/apply') }}"
                                               class="btn btn-sm btn-primary">Apply</a>

                                        @endcan
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>House No 1</td>
                                    <td>Large</td>
                                    <td><p class="badge badge-success">Free</p></td>
                                    <td>
                                        @can('admin-access')
                                            <a href="{{ url('hrm/house-rent/apply') }}"
                                               class="btn btn-sm btn-primary">Apply</a>

                                        @endcan
                                    </td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>House No 1</td>
                                    <td>Regular</td>
                                    <td><p class="badge badge-success">Free</p></td>
                                    <td>
                                        @can('admin-access')
                                            <a href="{{ url('hrm/house-rent/apply') }}"
                                               class="btn btn-sm btn-primary">Apply</a>

                                        @endcan
                                    </td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('page-css')

@endpush
@push('page-js')

@endpush