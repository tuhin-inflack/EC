@extends('pms::layouts.master')
@section('title', trans('pms::project_proposal.invited_project_request'))

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('pms::project_proposal.invited_project_project_list')}}</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{trans('labels.serial')}}</th>
                                        <th scope="col">{{trans('pms::project_proposal.received_at')}}</th>
                                        <th scope="col">{{trans('pms::project_proposal.remarks')}}</th>
                                        <th scope="col">{{trans('pms::project_proposal.attached_file')}}</th>
                                        <th scope="col">{{trans('pms::project_proposal.last_sub_date')}}</th>
                                        <th scope="col">{{trans('labels.status')}}</th>
                                        <th scope="col">{{trans('labels.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($requests as $request)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$request->created_at}}</td>
                                        <td>{{ $request->message }}</td>
                                        <td><a href="{{url('pms/project-requests/attachment-download/'.$request->id)}}">Attachment</a></td>
                                        <td>{{ $request->end_date }}</td>
                                        <td>
                                            @if($request->status == 0)
                                                <span class="badge badge-warning">Ongoing</span>
                                            @else
                                                <span class="badge badge-warning">Success</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false" class="btn btn-info dropdown-toggle"><i
                                                            class="la la-cog"></i></button>
                                                <span aria-labelledby="btnSearchDrop2"
                                                      class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{route('project-proposal-submission.create')}}"
                                                   class="dropdown-item"><i class="ft-fast-forward"></i> {{trans('pms::project_proposal.submit_proposal')}}</a>
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
        function attachmentDev() {
            alert("Download process is in under development");
        }
    </script>
@endpush
