@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.invited_research_proposal_list'))

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ trans('rms::research_proposal.invited_research_proposal_list') }}</h4>
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
                                        <th scope="col">{{ trans('rms::research_proposal.last_sub_date') }}</th>
                                        <th scope="col">@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($research_requests as $research_request)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{ $research_request->title }}</td>
                                            <td>{{ substr($research_request->remarks, 0,50) }} {{ strlen($research_request->remarks)>50 ? "..." : "" }}</td>
                                            <td>{{ date('d/m/Y', strtotime($research_request->end_date)) }}</td>
                                            <td>
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                    <i class="la la-cog"></i></button>
                                                <span aria-labelledby="btnSearchDrop2"
                                                      class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{ route('invited-research-proposal.show', $research_request->id) }}"
                                                           class="dropdown-item"><i class="ft-eye"></i> @lang('labels.details')</a>
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

