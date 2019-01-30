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
                            {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    {!! Form::open(['url'=> route('project-proposal-submitted-review-update', $proposal->id), 'novalidate', 'class' => 'form']) !!}
                    <input type="hidden" name="wf_master" value="{{$wfData['wfMasterId']}}">
                    <input type="hidden" name="wf_conv" value="{{$wfData['wfConvId']}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5>@lang('pms::project_proposal.project_title'): {{$proposal->title}}</h5>
                                <h5>@lang('pms::project_proposal.remarks'): {{$proposal->remarks}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea class="form-control" name="approval_remark"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Message to Receiver</label>
                                    <textarea class="form-control" name="message_to_receiver"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" name="status" value="APPROVED"><i class="ft-check"></i> APPROVE</button>
                                    <button type="submit" class="btn btn-danger" name="status" value="REJECTED"><i class="ft-x"></i> REJECT</button>
                                    <button type="button" class="btn btn-primary" name="back" value="REVERT"><i class="ft-rewind"></i>  BACK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
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
                        <a href="{{route('organization.add-organization', $proposal->id)}}" class="btn btn-primary btn-sm pull-right"><i class="ft-plus"></i>@lang('pms::project_proposal.add_organization')</a>

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

    <section id="task-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('pms::task.card_title')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{route('task.create', $proposal->id)}}" class="btn btn-primary btn-sm"><i
                                    class="ft-plus white"></i> {{trans('pms::task.create_button')}}</a>
                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered alt-pagination">
                                <thead>
                                <tr>
                                    <th>{{trans('labels.serial')}}</th>
                                    <th>{{trans('pms::task.task_name')}}</th>
                                    <th>{{trans('pms::task.expected_start_date')}}</th>
                                    <th>{{trans('pms::task.expected_end_date')}}</th>
                                    <th>{{trans('pms::task.task_description')}}</th>
                                    <th>{{trans('pms::task.start_date')}}</th>
                                    <th>{{trans('pms::task.end_date')}}</th>
                                    <th>{{trans('labels.action')}}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(count($proposal->task))
                                    @foreach($proposal->task as $task)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$task->taskName->name}}</td>
                                            <td>{{date('d-m-Y', strtotime($task->expected_start_time))}}</td>
                                            <td>{{date('d-m-Y', strtotime($task->expected_end_time))}}</td>
                                            <td>{{$task['description']}}</td>
                                            <td>{{(!empty($task->start_time))? date('d-m-Y', strtotime($task->start_time)) : '-'}}</td>
                                            <td>{{(!empty($task->end_time))? date('d-m-Y', strtotime($task->end_time)) : '-'}}</td>
                                            {{--<td>{{($training->status == 1)? "Active":"Inactive"}}</td>--}}
                                            <td>
                                                <span class="dropdown">
                                                    <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                                    <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{route('task.show', ['taskId' => $task['id']])}}" class="dropdown-item"><i class="ft-eye"></i> {{trans('labels.details')}}</a>
                                                         @if(empty($task->start_time) || empty($task->end_time))
                                                            <a href="{{route('task.toggleStartEnd', ['taskId' => $task['id']])}}" class="dropdown-item"><i class="ft-edit-2"></i> {{(empty($task->start_time))? trans('pms::task.start_date') : trans('pms::task.end_date')}}</a>
                                                        @endif
                                                        <div class="dropdown-divider"></div>
                                                            {!! Form::open(['method'=>'DELETE',
                                                            'url' => [route('task.delete', $task->id)],
                                                            'style' => 'display:inline']) !!}
                                                        {!! Form::button('<i class="ft-trash"></i> '.trans('labels.delete'), array(
                                                        'type' => 'submit',
                                                        'class' => 'dropdown-item',
                                                        'title' => 'Delete the Task',
                                                        'onclick'=>'return confirm("Confirm delete?")',
                                                        )) !!}
                                                        {!!Form::close()!!}
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
    </section>
@endsection


@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/js/charts/jsgantt-improved/docs/jsgantt.css') }}">
@endpush

@push('page-js')

    <script src="{{ asset('theme/vendors/js/charts/jsgantt-improved/docs/jsgantt.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/charts/jsgantt-improved/chart.js') }}" type="text/javascript"></script>

@endpush
