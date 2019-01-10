@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.research_request_list'))

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ trans('rms::research_proposal.research_request_list') }}</h4>
                        <div class="heading-elements">
                            <a href="{{route('research-request.create')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> {{ trans('rms::research_proposal.new_proposal_request') }}</a>

                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ trans('labels.serial') }}</th>
                                        <th scope="col">{{ trans('labels.title') }}</th>
                                        <th scope="col">{{ trans('labels.remarks') }}</th>
                                        <th scope="col">{{trans('rms::research_proposal.attached_file')}}</th>
                                        <th scope="col">{{ trans('rms::research_proposal.last_sub_date') }}</th>
                                        <th scope="col">{{ trans('labels.status') }}</th>
                                        <th scope="col">{{ trans('labels.created_at') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($research_requests as $research_request)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{ $research_request->title }}</td>
                                            <td>{{ $research_request->remarks }}</td>
                                            <td><a href="">@lang('labels.attachments')</a></td>
                                            <td>{{ date('d/m/Y', strtotime($research_request->end_date)) }}</td>
                                            <td>@lang('labels.status_' . $research_request->status)</td>
                                            <td>{{ date('d/m/Y', strtotime($research_request->created_at)) }}</td>
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
