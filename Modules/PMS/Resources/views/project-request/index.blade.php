@extends('pms::layouts.master')
@section('title', trans('pms::project_proposal.project_request_list'))

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('pms::project_proposal.project_request_list')</h4>

                        <div class="heading-elements">
                            <a href="{{route('project-request.create')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> @lang('pms::project_proposal.new_proposal_request')</a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('labels.serial')</th>
                                        <th scope="col">@lang('labels.title')</th>
                                        <th scope="col">@lang('labels.remarks')</th>
                                        <th scope="col">@lang('pms::project_proposal.attached_file')</th>
                                        <th scope="col">@lang('pms::project_proposal.last_sub_date')</th>
                                        <th scope="col">@lang('labels.status')</th>
                                        <th scope="col">@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($requests as $request)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td><a href="">{{ $request->title }}</a></td>
                                                <td>{{ substr($request->remarks, 0,100) }} {{ strlen($request->remarks)>100 ? "..." : "" }}</td>
                                                <td><a href="{{url('pms/project-requests/attachment-download/'.$request->id)}}">@lang('labels.attachments')</a></td>
                                                <td>{{ $request->end_date }}</td>
                                                <td>@lang('labels.status_' . $request->status)</td>
                                                <td>
                                                <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                    <i class="la la-cog"></i>
                                                </button>
                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                    <a href=""
                                                       class="dropdown-item"><i class="ft-eye"></i>@lang('labels.details')</a>
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
@push('page-js')
    <script>
        function attachmentDev() {
            alert("Download process is in under development");
        }
    </script>
@endpush
