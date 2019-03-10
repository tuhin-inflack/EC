@extends('pms::layouts.master')
@section('title', trans('pms::project_proposal.menu_title'). ' '. trans('labels.details'))
@section('content')
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">@lang('pms::project_proposal.menu_title') @lang('labels.details')</h4>
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
                    {{--{!! Form::open(['url'=> route('project-proposal-submitted-review-update', $proposal->id), 'novalidate', 'class' => 'form']) !!}--}}
                    {!! Form::open(['route' => [ 'project-proposal-submission.feedback',$shareConversationId],  'enctype' => 'multipart/form-data']) !!}

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="black">@lang('labels.title'): </label>
                                        <p class="card-text">{{ $proposal->title }}</p>

                                        <label class="black">@lang('rms::research_proposal.submission_date'): </label>
                                        <p> {{ date('d/m/y', strtotime($proposal->created_at)) }} </p>
                                        <label class="black">@lang('rms::research_proposal.submitted_by'): </label>
                                        <p> {{ $proposal->proposalSubmittedBy->name }} </p>
                                    </div>
                                    @if(count($remarks))
                                        <div class="col-md-12">
                                            <label class="black">@lang('labels.remarks'): </label>
                                            <div class="media">
                                                <div class="media-body">
                                                    @foreach($remarks as $remark)
                                                        {{--{{ dd($remark) }}--}}
                                                        <p class="text-bold-600 mb-0">
                                                            {{ $remark->user->name }}
                                                        </p>
                                                        <p class="small m-0 comment-time">{{date("j F, Y, g:i a",strtotime($remark->created_at))}}</p>
                                                        <p class="m-0 comment-text">{{$remark->remarks}}</p>
                                                        <hr/>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    @foreach($proposal->projectProposalFiles as $file)
                                        <li>
                                            <a href="{{url('pms/project-proposal-submission/file-download/'.$file->id)}}">{{ $file->file_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul>
                                    <li>
                                        <b><a href="{{url('pms/project-proposal-submission/attachment-download/'.$proposal->id)}}">@lang('pms::project_proposal.download_all_attachments')</a></b>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                {{--<div class="form-group">--}}
                                    {{--<label>{{__('labels.remarks')}}</label>--}}
                                    {{--<textarea class="form-control" name="approval_remark"></textarea>--}}
                                {{--</div>--}}

                                <div class="form-group">
                                    {!! Form::label('approval_remark', trans('labels.remarks'), ['class' => 'black']) !!}
                                    {!! Form::textarea('approval_remark', null, ['class' => 'form-control comment-input', 'rows' => 2,  'placeholder' => '', 'data-validation-required-message'=>trans('labels.This field is required')]) !!}
                                    <div class="help-block"></div>
                                </div>

                            </div>
                        </div>

                    </div>

                    {!! Form::hidden('feature', $feature->name) !!}
                    {!! Form::hidden('feature_id', $feature->id) !!}
                    {{--{!! Form::hidden('workflow_conversation_id', $workflowConversationId) !!}--}}
                    {!! Form::hidden('ref_table_id', $projectProposalSubmissionId) !!}
                    <button type="submit" name="status" value="FEEDBACK" class="btn btn-primary">Provide feedback</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection