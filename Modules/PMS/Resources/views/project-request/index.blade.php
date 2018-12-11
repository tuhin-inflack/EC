@extends('pms::layouts.master')
@section('title', 'All Project Proposal Request ')

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('pms::project_proposal.project_request_list')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{route('project-request.create')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> {{trans('pms::project_proposal.new_proposal_request')}}</a>
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
                                        <th scope="col">{{trans('labels.serial')}}</th>
                                        <th scope="col">{{trans('pms::project_proposal.remarks')}}</th>
                                        <th scope="col">{{trans('pms::project_proposal.last_sub_date')}}</th>
                                        <th scope="col">{{trans('labels.status')}}</th>
                                        <th scope="col">{{trans('labels.created_at')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                            <td>08/11/2018</td>
                                            <td>
                                                <span class="badge badge-warning">Ongoing</span>
                                            </td>
                                            <td>2018-11-08 16:15:12</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                            <td>26/07/2019</td>
                                            <td>
                                                <span class="badge badge-success">Completed</span>
                                            </td>
                                            <td>2018-11-08 16:15:12</td>
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
