@extends('pms::layouts.master')
@section('title', 'All Project Proposal Request ')

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('pms::project_proposal.proposal_submission_list')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>

                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{trans('labels.serial')}}</th>
                                        <th scope="col">{{trans('pms::project_proposal.project_title')}}</th>
                                        <th scope="col">{{trans('pms::project_proposal.attached_file')}}</th>
                                        <th scope="col">{{trans('pms::project_proposal.remarks')}}</th>
                                        <th scope="col">{{trans('labels.status')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($proposals as $proposal)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{ $proposal->title }}</td>
                                            <td><a href="{{url('pms/project-proposal-submission/attachment-download/'.$proposal->id)}}">Attachment</a></td>
                                            <td>{{ $proposal->remarks }}</td>
                                            <td>
                                                @if($proposal->status == 0)
                                                    <span class="badge badge-warning">Pending</span>
                                                @else
                                                    <span class="badge badge-success">Approved</span>
                                                @endif
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
        function attachmentDev() {
            alert("Download process is in under development");
        }
    </script>
@endpush
