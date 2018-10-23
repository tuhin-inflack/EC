@extends('pms::layouts.master')
@section('title', 'Show Project Proposal Request')

@section('content')

    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Project Proposal Request</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                        </ul>
                    </div>
                    <div class="dropdown float-md-right">
                        <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 10px;">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="{{ route('project_request.approve',$projectRequest->id) }}"><i class="ft-check-circle"></i> Approve</a>
                            <a class="dropdown-item" href="#"><i class="ft-x-circle"></i> Reject</a>


                        </div>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5>Last Submission Date: {{date('d-M-Y', strtotime($projectRequest->end_date))}}</h5>
                            </div>
                            <div class="col-6"><a href="" onclick="attachmentDev()">Attachment</a></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <p>{{ $projectRequest->message }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('page-js')
    <script>
        function attachmentDev() {
            alert("Download process is in under development");
        }
    </script>
@endpush