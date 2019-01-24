@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.research_list'))

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ trans('rms::research_proposal.research_list') }}</h4>
                        <div class="heading-elements">
                            <a href="" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> {{ trans('rms::research_proposal.create_research') }}</a>

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
                                        <th scope="col">{{ trans('rms::research_proposal.submitted_by') }}</th>
                                        <th scope="col">{{trans('rms::research_proposal.submission_date')}}</th>
                                        <th scope="col">{{ trans('labels.status') }}</th>
                                        <th scope="col">{{ trans('labels.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
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
