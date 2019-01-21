@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.title') . ' '. trans('labels.details'))

@push('page-css')
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"
                            id="basic-layout-form">@lang('rms::research_proposal.title') @lang('labels.details')
                        </h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show print-view">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <iframe src="{{ asset($filePath) }}" width="100%" height="500px"></iframe>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="black">Proposal Title: </label>
                                            <p class="card-text">Lorem ipsum dolor sit amet</p>

                                            <label class="black">Submission Date: </label>
                                            <p> 21/05/2018 </p>

                                            <label class="black">Submitted by: </label>
                                            <p> Faculty Member </p>
                                        </div>
                                        <div class="col-md-12">
                                            <hr/>
                                            <div class="form-group">
                                                <label class="black">Comments</label>
                                                <textarea name="message" class="form-control comment-input" placeholder="Write here..." rows="1"></textarea>
                                            </div>
                                            <div class="form-group comment-action-btns" style="display: none">
                                                <button class="btn btn-primary btn-sm comment-save">Save</button>
                                                <button class="btn btn-outline-danger btn-sm comment-reset">Cancel</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="media">
                                                <div class="media-left pr-1">
                                                    <a href="#">
                                                        <span class="avatar avatar-online comment-user-avatar">
                                                          <img src="{{ asset('theme/images/portrait/small/avatar-s-1.png') }}" alt="avatar">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-bold-600 mb-0">
                                                        <a href="javascript:;" class="comment-user-name">Md. Junayed Hassan</a>

                                                        <a href="javascript:;" class="pull-right comment-delete">
                                                            <i class="ft-trash text-danger"></i>
                                                        </a>
                                                        <a href="javascript:;" class="pull-right comment-edit" style="padding-right: 5px">
                                                            <i class="ft-edit"></i>
                                                        </a>
                                                    </p>
                                                    <p class="small m-0 comment-time">20/06/2018 04:55:00</p>
                                                    <p class="m-0 comment-text">Some modification needed in time management section</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-warning mr-1" role="button" href="{{ route('bill.index') }}">
                                        <i class="ft-x"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="task-list">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">@lang('pms::task.card_title')</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            <div class="heading-elements">
                                <a href="{{route('research.task.create', $research->id)}}" class="btn btn-primary btn-sm"><i
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
                                    @if(count($tasks))
                                        @foreach($tasks as $task)
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
                                                        <a href="{{route('research.task.show', ['taskId' => $task['id']])}}" class="dropdown-item"><i class="ft-eye"></i> {{trans('labels.details')}}</a>
                                                         @if(empty($task->start_time) || empty($task->end_time))
                                                            <a href="{{route('research.task.toggleStartEnd', ['taskId' => $task['id']])}}" class="dropdown-item"><i class="ft-edit-2"></i> {{(empty($task->start_time))? trans('pms::task.start_date') : trans('pms::task.end_date')}}</a>
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
    </div>

@endsection


@push('page-js')
    <script type="text/javascript">
        $('.comment-input').focus(function (e) {
            $('.comment-action-btns').show();
        });
        $('.comment-reset').click(function (e) {
            $('.comment-input').val('');
            $('.comment-action-btns').hide();
        });
    </script>
@endpush
