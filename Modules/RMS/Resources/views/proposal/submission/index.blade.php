@extends('rms::layouts.master')
@section('title', 'All Requested Research Proposals ')

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Requested Research Proposals List</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Faculty Director</th>
                                        <th scope="col">Faculty Members</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Lorem ipsum</td>
                                        <td>Lorem ipsum, Lorem ipsum, Lorem ipsum</td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                        <td>
                                            <span class="badge badge-warning">Pending</span>
                                        </td>
                                        <td>
                                            <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false" class="btn btn-info dropdown-toggle"><i
                                                            class="la la-cog"></i></button>
                                                <span aria-labelledby="btnSearchDrop2"
                                                      class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{ route('research-proposal-submission.show', 1) }}"
                                                   class="dropdown-item"><i class="ft-eye"></i> Details</a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Lorem ipsum</td>
                                        <td>Lorem ipsum, Lorem ipsum</td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                        <td>
                                            <span class="badge badge-success">Approved</span>
                                        </td>
                                        <td>
                                            <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false" class="btn btn-info dropdown-toggle"><i
                                                            class="la la-cog"></i></button>
                                                <span aria-labelledby="btnSearchDrop2"
                                                      class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{ route('research-proposal-submission.show', 12) }}"
                                                   class="dropdown-item"><i class="ft-eye"></i> Details</a>
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
