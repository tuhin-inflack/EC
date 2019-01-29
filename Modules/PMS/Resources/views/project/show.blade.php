@extends('pms::layouts.master')
@section('title', trans('pms::project_proposal.project_details'))

@section('content')
    @include('../../../organization.table', ['organizations' => $project->organizations, 'url' => route('pms-organizations.create', $project->id)])

    <section class="row">
        <div class=" col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('pms::project_proposal.project_details')</h4>
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
                        <pre>{{ $project->title }}</pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">@lang('rms::research_proposal.submitted_by')</h5>
                        <pre>{{ $project->projectSubmittedByUser->name }}</pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">@lang('rms::research_proposal.submission_date')</h5>
                        <pre>{{ date('d/m/Y,  h:iA', strtotime($project->created_at)) }}</pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">@lang('labels.status')</h5>
                        <pre>@lang('rms::research_proposal.' . $project->status)</pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-js')
    <script>
        $(document).ready(function () {
            $('.organization-table').DataTable({
                "pageLength": 5
            })
        });
    </script>
@endpush
