@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.invited_research_proposal_details'))

@section('content')
    <section class="row">
        <div class=" col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ trans('rms::research_proposal.invited_research_proposal_details') }}</h4> <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h5 class="card-title">{{ trans('labels.title') }}</h5>
                        <pre>{{ $researchRequest->title }}</pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ trans('rms::research_proposal.last_sub_date') }}</h5>
                        <pre>{{ date('d/m/Y', strtotime($researchRequest->end_date)) }}</pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ trans('labels.remarks') }}</h5>
                        <pre>{{ $researchRequest->remarks }}</pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ trans('labels.attachments') }}</h5>
                        <pre>
                            @foreach($researchRequest->researchRequestAttachments as $file)
                                <ul>
                                    <li><a href="{{url('rms/invited-research-proposals/file-download/'.$file->id)}}">{{ $file->attachments }}</a></li>
                                </ul>
                            @endforeach
                            <ul>
                                <li><b><a href="{{url('rms/research-requests/attachment-download/'.$researchRequest->id)}}">{{ trans('rms::research_proposal.download_all_attachments') }}</a></b></li>
                            </ul>
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

