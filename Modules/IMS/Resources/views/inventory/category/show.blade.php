@extends('ims::layouts.master')

@section('title', trans('ims::inventory.item_category_details'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('ims::inventory.item_category_details')</h4>
                        <a class="heading-elements-toggle" href=""><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements" style="top: 5px;">
                            <ul class="list-inline mb-1">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                        <div class="heading-elements mt-2" style="margin-right: 10px;">
                            <a href="{{ route('inventory-item-category.index') }}" class="btn btn-primary btn-sm">
                                <i class="ft-list white">@lang('ims::inventory.item_category_list')</i>
                            </a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="card-text">
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('labels.name')</dt>
                                    <dd class="col-sm-9">{{ $inventoryItemCategory->name}}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('ims::inventory.type')</dt>
                                    <dd class="col-sm-9">
                                        @if($inventoryItemCategory->type == 1)
                                            <p>@lang('ims::inventory.fixed_asset')</p>
                                        @else
                                            <p>@lang('ims::inventory.stationery')</p>
                                        @endif
                                    </dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('ims::inventory.unit')</dt>
                                    <dd class="col-sm-9">{{ $inventoryItemCategory->unit}}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


