@extends('pms::layouts.master')
@section('title', 'All Project Proposal Request ')

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Project Proposal Submission List</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>

                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Project Title</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                        <td>
                                            <span class="badge badge-warning">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                        <td>
                                            <span class="badge badge-success">Approved</span>
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
