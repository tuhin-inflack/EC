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
                        <div class="col-md-12">
                            <div class="media">
                                <div class="media-body">
                                    @if(count($remarks)>0)
                                        @foreach($remarks as $remark)
                                            <p class="text-bold-600 mb-0">
                                                {{ $remark->user->name }}
                                            </p>
                                            <p class="small m-0 comment-time">{{date('h:iA d-m-Y', strtotime($remark->created_at))}}</p>
                                            <p class="m-0 comment-text">{{$remark->remarks}}</p>
                                        @endforeach
                                    @endif
                                </div>
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
                                <div class="form-group">
                                    <label>Message to Receiver</label>
                                    <textarea class="form-control" name="message_to_receiver"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="button" class="btn btn-warning" name="back" value="REVERT"><i class="ft-rewind"></i>  BACK</button>
                                    <button type="submit" class="btn btn-success" name="status" value="APPROVED"><i class="ft-check"></i> APPROVE</button>
                                    <button type="submit" class="btn btn-danger" name="status" value="REJECTED"><i class="ft-x"></i> REJECT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection


@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/js/charts/jsgantt-improved/docs/jsgantt.css') }}">
@endpush

@push('page-js')

    <script src="{{ asset('theme/vendors/js/charts/jsgantt-improved/docs/jsgantt.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/charts/jsgantt-improved/chart.js') }}" type="text/javascript"></script>

@endpush
