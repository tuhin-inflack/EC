@extends('pms::layouts.master')
@section('title', trans('pms::project_proposal.menu_title'))

@section('content')
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">@lang('labels.details')</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div id="GanttChartDIV"></div>
                            </div>
                        </div>
                        {{-- {!! print_r($proposal->task->toArray()) !!}--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-12">--}}
                                {{--<h5>Last Submission Date: {{date('d-M-Y', strtotime($proposal->end_date))}}</h5>--}}
                                {{--<h5>@lang('pms::project_proposal.project_title'): {{$proposal->title}}</h5>--}}
                                {{--<h5>@lang('pms::project_proposal.remarks'): {{$proposal->remarks}}</h5>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="organization list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('pms::project_proposal.organization_name_for_project')</h4>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>

                                        <th scope="col">@lang('labels.serial')</th>
                                        <th scope="col">@lang('pms::project_proposal.organization_name')</th>
                                        <th scope="col">@lang('labels.email_address')</th>
                                        <th scope="col">@lang('labels.mobile')</th>
                                        <th scope="col">@lang('labels.address')</th>
                                        <th scope="col">@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @if(count($proposal->organizations)>0)
                                        @foreach($proposal->organizations as $organization)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{ $organization->name }}</td>
                                                <td>{{ $organization->email }}</td>
                                                <td>{{ $organization->mobile }}</td>
                                                <td>{{ $organization->address }}</td>
                                                {{--<td>{{ $projectResearchOrganization->organization->email }}</td>--}}
                                                {{--<td>{{ $projectResearchOrganization->organization->mobile }}</td>--}}
                                                {{--<td>{{ $projectResearchOrganization->organization->address }}</td>--}}
                                                <td>


                                                <span class="dropdown">
                                                    <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                                    <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{route('member.add-member', $organization->id)}}" class="dropdown-item"><i class="ft-plus"></i>@lang('pms::member.add_member')</a>
                                                    </span>
                                                </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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


@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/js/charts/jsgantt-improved/docs/jsgantt.css') }}">
@endpush

@push('page-js')
    <script type="text/javascript">
        let mountElement = document.getElementById('GanttChartDIV');
        let presentedFormat = "week";
        let jsonData = {!! json_encode($ganttChart) !!};
    </script>
    <script src="{{ asset('theme/vendors/js/charts/jsgantt-improved/docs/jsgantt.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/charts/jsgantt-improved/gantt-chart.js') }}" type="text/javascript"></script>
@endpush
