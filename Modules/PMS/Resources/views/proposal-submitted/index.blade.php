@extends('pms::layouts.master')
@section('title', trans('pms::project_proposal.received_proposal'))

@section('content')
    <section id="user-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('pms::project_proposal.received_proposal_list')}}</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered alt-pagination">
                                <thead>
                                <tr>
                                    <th scope="col">@lang('labels.serial')</th>
                                    <th scope="col">@lang('labels.title')</th>
                                    <th scope="col">@lang('pms::project_proposal.attached_file')</th>
                                    <th scope="col">@lang('pms::project_proposal.submitted_by')</th>
                                    <th scope="col">@lang('rms::research_proposal.submission_date')</th>
                                    <th scope="col">@lang('labels.status')</th>
                                    <th scope="col">@lang('labels.action')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($proposals as $proposal)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td><a href="{{route('project-proposal-submitted.view', $proposal->id)}}">{{ $proposal->title }}</a></td>
                                        <td><a href="{{url('pms/project-proposal-submission/attachment-download/'.$proposal->id)}}">@lang('labels.attachments')</a></td>
                                        <td>{{ $proposal->ProposalSubmittedBy->name }}</td>
                                        <td>{{ date('d/m/y hi:a', strtotime($proposal->created_at)) }}</td>
                                        <td>@lang('labels.status_' . $proposal->status)</td>
                                        <td>
                                            <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                    <a href="{{route('project-proposal-submitted.view', $proposal->id)}}" class="dropdown-item"><i class="ft-eye"></i> {{trans('labels.details')}}</a>
                                                    <a href="{{ route('project-monitor-tables.index', $proposal->id) }}" class="dropdown-item"><i class="ft-bar-chart-2"></i>Monitoring Tabular View</a>
                                                    <a href="" class="dropdown-item"><i class="ft-minus-square"></i> {{trans('labels.reject')}}</a>
                                                    <a href="" class="dropdown-item"><i class="ft-check"></i> {{trans('labels.approve')}}</a>
                                                    <a href="{{route('project-proposal-submitted.monthly-update', $proposal->id)}}" class="dropdown-item"><i class="ft-list"></i> {{trans('monthly-update.title')}}</a>
                                                    <a href="{{route('task.create', $proposal->id)}}" class="dropdown-item"><i class="ft-plus"></i> {{trans('pms::task.create_card_title')}}</a>
                                                    <a href="{{route('organization.add-organization', $proposal->id)}}" class="dropdown-item"><i class="ft-plus"></i>@lang('pms::project_proposal.add_organization')</a>
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
    </section>
@endsection
