@extends('ims::layouts.master')

@section('title', trans('ims::warehouse.warehouse_details'))

@section('content')
    <div class="row match-height">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ trans('ims::warehouse.warehouse_details') }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="card-text">
                            <dl class="row">
                                <dt class="col-sm-3">@lang('labels.name')</dt>
                                <dd class="col-sm-9">{{ $warehouse->name }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">@lang('ims::warehouse.department')</dt>
                                <dd class="col-sm-9">{{ $warehouse->departments->name }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">@lang('labels.date')</dt>
                                <dd class="col-sm-9">{{ date('j F,Y', strtotime($warehouse->date)) }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection