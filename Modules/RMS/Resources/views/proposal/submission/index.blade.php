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
                                        <th scope="col">@lang('labels.status')</th>
                                        <th scope="col">@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proposals as $proposal)
                                        {{--                                        {{ dd($proposal) }}--}}
                                        {{--{{ dd($proposal->submittedBy) }}--}}
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                <a href="{{ route('research-proposal-submission.show', $proposal->id) }}">{{ $proposal->title }}</a>
                                            </td>
                                            <td>{{ isset($proposal->submittedBy->name) ? $proposal->submittedBy->name : '' }}</td>
                                            <td>
                                                <a href="{{url('rms/research-proposal-submission/attachment-download/'.$proposal->id)}}">@lang('labels.attachments')</a>
                                            </td>
                                            <td>{{ date('d/m/y hi:a', strtotime($proposal->created_at)) }}</td>
                                            <td>
                                                @php
                                                    if ($proposal->status=='APPROVED'){
                                                    $class = 'btn-primary';
                                                    }elseif ($proposal->status=='REJECTED'){
                                                    $class = 'btn-danger';
                                                    }else{
                                                    $class = 'btn-warning';
                                                    }
                                                @endphp
                                                <button type="button"
                                                        class="btn {{ $class }} btn-sm">{{ $proposal->status }}</button>

                                            </td>
                                            <td>
                                            <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                    <i class="la la-cog"></i>
                                                </button>
                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                    <a href="" class="dropdown-item"><i class="ft-plus"></i>@lang('pms::project_proposal.add_organization')</a>
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
        </div>
    </section>
@endsection


