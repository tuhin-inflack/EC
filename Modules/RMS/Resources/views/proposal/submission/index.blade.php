@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.submitted_research_proposal'))

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('rms::research_proposal.submitted_research_proposal_list')</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination proposal-submission-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('labels.serial')</th>
                                        <th scope="col">@lang('labels.title')</th>
                                        <th scope="col">@lang('rms::research_proposal.submitted_by')</th>
                                        <th scope="col">@lang('rms::research_proposal.attached_file')</th>
                                        <th scope="col">@lang('rms::research_proposal.submission_date')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proposals as $proposal)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><a href="{{ route('research-proposal-submission.show', $proposal->id) }}">{{ $proposal->title }}</a></td>
                                        <td>{{ $proposal->submittedBy->name }}</td>
                                        <td><a href="{{url('rms/research-proposal-submission/attachment-download/'.$proposal->id)}}">@lang('labels.attachments')</a></td>
                                        <td>{{ date('d/m/y hi:a', strtotime($proposal->created_at)) }}</td>
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


