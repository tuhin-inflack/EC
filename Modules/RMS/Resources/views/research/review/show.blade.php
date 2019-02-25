@extends('rms::layouts.master')
@section('title', trans('rms::research.title') . ' '. trans('labels.details'))

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"
                            id="basic-layout-form">@lang('rms::research.title') @lang('labels.details')
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

                                            <label class="black">@lang('rms::research_proposal.submission_date'): </label>
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
                                                            <p class="text-bold-600 mb-0">
                                                                {{ $remark->user->name }}
                                                            </p>
                                                            <p class="small m-0 comment-time">{{ date("j F, Y, g:i a",strtotime($remark->created_at)) }}</p>
                                                            <p class="m-0 comment-text">{{ $remark->remarks }}</p>
                                                            <hr/>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    {!! Form::open(['route' =>  'research.reviewUpdate',  'enctype' => 'multipart/form-data']) !!}
                                    <hr/>
                                    <div class="form-group">
                                        {!! Form::label('remarks', trans('labels.remarks'), ['class' => 'black']) !!}
                                        {!! Form::textarea('remarks', null, ['class' => 'form-control comment-input', 'rows' => 2]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('message', trans('labels.message_to_receiver'), ['class' => 'black']) !!}
                                        {!! Form::textarea('message', null, ['class' => 'form-control comment-input', 'rows' => 2]) !!}
                                    </div>

                                    {!! Form::hidden('feature', $feature->name) !!}
                                    {!! Form::hidden('workflow_master_id', $workflowMasterId) !!}
                                    {!! Form::hidden('workflow_conversation_id', $workflowConversationId) !!}
                                    {!! Form::hidden('item_id', $researchId) !!}
                                    {{--                                    {!! Form::button(' <i class="ft-skip-back"></i> Back', ['type' => 'submit', 'class' => 'btn btn-warning mr-1', 'name' => 'type', 'value' => 'publish'] ) !!}--}}
                                    {{--<a class="btn btn-warning mr-1" role="button" href="{{ route('rms.index') }}">--}}
                                    {{--<i class="ft-x"></i> @lang('labels.cancel')</a>--}}
                                    {!! Form::button(' <i class="ft-check"></i> '.trans('labels.status_approved'), ['type' => 'submit', 'class' => 'btn btn-success mr-1', 'name' => 'status', 'value' => 'APPROVED'] ) !!}
                                    {!! Form::button('  <i class="ft-skip-back"></i> '. trans('labels.send_back'), ['type' => 'submit', 'class' => 'btn btn-info mr-1', 'name' => 'status', 'value' => 'REJECTED'] ) !!}
                                    {{--{!! Form::button('  <i class="ft-x"></i>'.trans('labels.reject'), ['type' => 'submit', 'class' => 'btn btn-danger mr-1', 'name' => 'status', 'value' => 'REJECTED'] ) !!}--}}
                                    {{--<a href="{{ route('workflow-close-reviewer', [$workflowMasterId, $researchProposalSubmissionId]) }}" class="btn btn-danger "> <i class="ft-x"></i> @lang('labels.reject')</a>--}}

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
