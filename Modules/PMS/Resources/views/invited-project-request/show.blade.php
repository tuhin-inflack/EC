@extends('pms::layouts.master')
@section('title', trans('pms::project_proposal.invited_project_request_details'))
@push('page-css')
    <style>
        pre{
            font-size: 15px;
        }
    </style>
@endpush

@section('content')
    <section class="row">
        <div class=" col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('pms::project_proposal.invited_project_request_details')</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                        <h5 class="card-title">@lang('labels.title')</h5>
                        <pre>{{ $projectRequest->title }}</pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">@lang('pms::project_proposal.receiver') </h5>
                        <pre>
                            <ul>
                                @foreach($projectRequest->projectRequestReceivers as $receiver)
                                    <li>{{ $receiver->employeeDetails->first_name }} {{ $receiver->employeeDetails->last_name }}</li>
                                @endforeach
                            </ul>
                        </pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ trans('rms::research_proposal.last_sub_date') }}</h5>
                        <pre>{{ date('d/m/Y', strtotime($projectRequest->end_date)) }}</pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ trans('labels.attachments') }}</h5>
                        <pre>
                            <ul>
                                @foreach($projectRequest->projectRequestAttachments as $file)
                                    <li><a href="{{url('pms/project-requests/file-download/'.$file->id)}}">{{ $file->file_name }}</a></li>
                                @endforeach
                            </ul>
                            <ul>
                                <li><b><a href="{{url('pms/project-requests/attachment-download/'.$projectRequest->id)}}">@lang('pms::project_proposal.download_all_attachments')</a></b></li>
                            </ul>
                        </pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ trans('labels.remarks') }}</h5>
                        <p style="background-color: #f7f7f9;font-size: 15px;text-align: justify">{{ $projectRequest->remarks }}</p>
                        <div class="form-actions text-center">

                            <a href="" class="btn btn-primary mr-1">
                                <i class="ft-plus white"></i> @lang('labels.edit')
                            </a>


                            <a class="btn btn-warning mr-1" role="button" href="{{route('invited-project-request.index')}}">
                                <i class="ft-x"></i> @lang('labels.cancel')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

