@extends('pms::layouts.master')
@section('title', trans('pms::project_proposal.submitted_proposal'))

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('pms::project_proposal.submitted_proposal_list')}}</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('labels.serial')</th>
                                        <th scope="col">@lang('labels.title')</th>
                                        <th scope="col">@lang('pms::project_proposal.attached_file')</th>
                                        <th scope="col">@lang('pms::project_proposal.submitted_by')</th>
                                        <th scope="col">@lang('rms::research_proposal.submission_date')</th>
                                        <th scope="col">@lang('labels.status')</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php
                                    $statusAr = array(
                                    'APPROVED' => 'bg-success',
                                    'REJECTED' => 'bg-danger',
                                    'PENDING' => 'bg-warning',
                                    'REVIEWED' => 'bg-info',
                                    );
                                    @endphp
                                    @foreach($proposals as $proposal)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{ $proposal->title }}</td>
                                            <td><a href="{{url('pms/project-proposal-submission/attachment-download/'.$proposal->id)}}">@lang('labels.attachments')</a></td>
                                            <td>{{ $proposal->ProposalSubmittedBy->name }}</td>
                                            <td>{{ date('d/m/y hi:a', strtotime($proposal->created_at)) }}</td>
                                            <td><span class="badge {{ $statusAr[strtoupper($proposal->status)] }}">@lang('labels.status_' . strtolower($proposal->status))</span> </td>
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

