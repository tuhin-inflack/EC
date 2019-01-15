@extends('pms::layouts.master')
@section('title', 'All Project Proposal Request ')

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('pms::project_proposal.received_proposal_list')}}</h4>
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
                                        <th scope="col">{{trans('pms::project_proposal.submitted_by')}}</th>
                                        <th scope="col">{{trans('labels.status')}}</th>
                                        <th scope="col">{{trans('labels.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proposals as $proposal)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $proposal->title }}</td>
                                        <td><a href="{{url('pms/project-proposal-submission/attachment-download/'.$proposal->id)}}">Attachment</a></td>
                                        <td>{{ $proposal->remarks }}</td>
                                        <td>Dummy Text</td>
                                        <td>
                                            @if($proposal->status == 0)
                                                <span class="badge badge-warning">Pending</span>
                                            @else
                                                <span class="badge badge-success">Approved</span>
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
                                                    <a href="{{route('project-proposal-submitted.view', $proposal->id)}}" class="dropdown-item"><i class="ft-eye"></i> View</a>
                                                    <a href="" class="dropdown-item"><i class="ft-minus-square"></i> Reject</a>
                                                    <a href="" class="dropdown-item"><i class="ft-check"></i> Approve</a>
                                                    <a href="" class="dropdown-item"><i class="ft-plus"></i> Add Organization</a>
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

