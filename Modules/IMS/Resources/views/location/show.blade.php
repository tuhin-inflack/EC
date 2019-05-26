@extends('ims::layouts.master')

@section('title', trans('ims::location.location_details'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('ims::location.location_details')</h4>
                        <a class="heading-elements-toggle" href=""><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements" style="top: 5px;">
                            <ul class="list-inline mb-1">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                        <div class="heading-elements mt-2" style="margin-right: 10px;">
                            <a href="{{ route('location.index') }}" class="btn btn-primary btn-sm">
                                <i class="ft-list white">@lang('ims::location.location_list')</i>
                            </a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="card-text">
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('labels.name')</dt>
                                    <dd class="col-sm-9">{{ $location->name}}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('ims::location.department')</dt>
                                    <dd class="col-sm-9">{{ $location->departments->name}}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('ims::location.type')</dt>
                                    <dd class="col-sm-9">
                                        @if($location->type == 1)
                                            <p>@lang('ims::location.store')</p>
                                        @else
                                            <p>@lang('ims::location.general')</p>
                                        @endif
                                    </dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('ims::location.description')</dt>
                                    <dd class="col-sm-9">{{ $location->description}}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


