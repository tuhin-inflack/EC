@extends('pms::layouts.master')
@section('title', 'All Project Proposal Request ')

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Project Proposal Request List</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{route('project-request.create')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> New Proposal Request</a>
                            <a href="{{route('project-request.create')}}" class="btn btn-warning btn-sm"> <i
                                        class="ft-download white"></i></a>

                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Headline</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                            <td>08/11/2018</td>
                                            <td>
                                                <span class="badge badge-warning">Pending</span>
                                            </td>
                                            <td>
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>

                                                <a href="" class="dropdown-item"><i class="ft-tag"></i> Send Feedback</a>
                                                <div class="dropdown-divider"></div>
                                                  <a href="{{route('project-request-forwards.create')}}" class="dropdown-item"><i class="ft-fast-forward"></i> Forward to Departments</a>
                                              </span>
                                            </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                            <td>26/07/2019</td>
                                            <td>
                                                <span class="badge badge-warning">Pending</span>
                                            </td>
                                            <td>
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>

                                                <a href="" class="dropdown-item"><i class="ft-tag"></i> Send Feedback</a>
                                                <div class="dropdown-divider"></div>
                                                  <a href="{{route('project-request-forwards.create')}}" class="dropdown-item"><i class="ft-fast-forward"></i> Forward to Departments</a>
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
        function attachmentDev() {
            alert("Download process is in under development");
        }
    </script>
@endpush
