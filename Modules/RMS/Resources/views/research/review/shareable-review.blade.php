@extends('rms::layouts.master')
@section('title', trans('rms::research.research_details'))

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"
                            id="basic-layout-form">@lang('rms::research.research_details')
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
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="black">@lang('labels.title'): </label>
                                            <p class="card-text">{{ $research->title }}</p>

                                            <label class="black">@lang('rms::research_proposal.submission_date')
                                                : </label>
                                            <p> {{ date('d/m/y', strtotime($research->created_at)) }} </p>
                                            <label class="black">@lang('rms::research_proposal.submitted_by'): </label>
                                            <p> {{ $research->researchSubmittedByUser->name }} </p>
                                        </div>
                                        @if(count($remarks)>0)
                                            <div class="col-md-12">
                                                <label class="black">@lang('labels.remarks'): </label>
                                                <div class="media">
                                                    <div class="media-body">

                                                        @foreach($remarks as $remark)
                                                            {{--{{ dd($remark) }}--}}
                                                            <hr/>
                                                            <p class="text-bold-600 mb-0">
                                                                {{ $remark->user->name }}
                                                            </p>
                                                            <p class="small m-0 comment-time">{{ date("j F, Y, g:i a",strtotime($remark->created_at)) }}</p>
                                                            <p class="m-0 comment-text">{{ $remark->remarks }}</p>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title">{{trans('rms::research.research_publication_info')}}</h4>
                                    @if(is_null($research->publication))
                                        <dl class="row">
                                            <dt class="col-sm-3"></dt>
                                            <dd class="col-sm-9">{{ trans('labels.empty_table') }}</dd>
                                        </dl>
                                    @else
                                        <dl class="row">
                                            <dt class="col-sm-3">@lang('rms::research.research_publication_short_desc')</dt>
                                            <dd class="col-sm-9">{{ $research->publication->description }}</dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">@lang('rms::research.research_publication_attachment')</dt>
                                            <dd class="col-sm-9">
                                                @if(is_null($research->publication->attachments))
                                                    {{trans('labels.no_doc_available')}}
                                                @else
                                                    <ul class="list-inline">
                                                        @foreach($research->publication->attachments as $attachment)
                                                            <li class="list-group-item">
                                                                <a href="{{ route('file.download', ['filePath' => $attachment->path, 'displayName' => $research->title.'-publication.'.$attachment->ext]) }}" class="badge bg-info white" style="overflow: hidden; max-width: 80px;" title="{{ $attachment->name }}">{{ $attachment->name  }}</a><br><label class="label"><strong>{{$attachment->ext}}</strong>file</label></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </dd>
                                        </dl>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    {!! Form::open(['route' => [ 'research.share-feedback',$shareConversationId],  'enctype' => 'multipart/form-data', 'novalidate']) !!}
                                    <hr/>
                                    @if(!is_null($ruleDesignations))

                                        <div class="form-group {{ $errors->has('designation_id') ? 'error' : '' }}">
                                            <label>{{__('labels.share')}}</label>
                                            <select name="designation_id" class="form-control">
                                                <option value="" placeholder=""> {!!  trans('labels.select') !!}</option>

                                                @foreach($ruleDesignations as $ruleDesignation)
                                                    <option value="{{$ruleDesignation->designation_id}}">{{$ruleDesignation->getDesignation->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('designation_id'))
                                                <div class="help-block">{{ trans('labels.This field is required') }}</div>
                                            @endif

                                        </div>

                                    @endif
                                    <div class="form-group">
                                        {!! Form::label('remarks', trans('labels.remarks'), ['class' => 'black']) !!}
                                        {!! Form::textarea('remarks', null, ['class' => 'form-control comment-input', 'rows' => 2,  'placeholder' => '', 'data-validation-required-message'=>trans('labels.This field is required')]) !!}
                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group {{ $errors->has('message') ? 'error' : '' }}">
                                        {!! Form::label('message', trans('labels.message_to_receiver'), ['class' => 'black']) !!}
                                        {!! Form::textarea('message', null, ['class' => 'form-control comment-input', 'rows' => 2]) !!}
                                        {{--<div class="help-block"></div>--}}
                                        @if ($errors->has('message'))
                                            <div class="help-block">{{ trans('labels.This field is required') }}</div>
                                        @endif
                                    </div>

                                    {!! Form::hidden('feature', $feature->name) !!}
                                    {!! Form::hidden('feature_id', $feature->id) !!}
                                    {!! Form::hidden('share_rule_id', $shareConversation->shareRuleDesignation->share_rule_id) !!}
                                    {{--{!! Form::hidden('workflow_conversation_id', $workflowConversationId) !!}--}}
                                    {!! Form::hidden('ref_table_id', $researchId) !!}
                                    <button type="submit" name="status" value="REVIEW" class="btn btn-primary">@lang('labels.share')</button>
                                    @if($shareConversation->shareRuleDesignation->can_approve==true)
                                        {!! Form::button(' <i class="ft-check"></i> '. trans('labels.approve'), ['type' => 'submit', 'class' => 'btn btn-success mr-1', 'name' => 'status', 'value' => 'APPROVED'] ) !!}
                                    @endif
                                    @if($shareConversation->shareRuleDesignation->can_reject)
                                        <a href="{{ route('workflow-close-reviewer', [$workflowMasterId, $researchId, $shareConversationId]) }}"
                                           class="btn btn-danger "> <i class="ft-x"></i> @lang('labels.reject')</a>
                                    @endif
                                    {!! Form::close() !!}

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

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
