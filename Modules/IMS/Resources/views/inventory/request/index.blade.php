@extends('ims::layouts.master')

@section('title', trans('ims::inventory.inventory_request') .' '. trans('labels.list'))

@section('content')
    <section id="product-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('ims::inventory.inventory_request') @lang('labels.list')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements" style="top: 5px;">
                            <ul class="list-inline mb-1">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                        <div class="heading-elements mt-2" style="margin-right: 10px;">
                            <a href="{{ route('inventory-request.create') }}" class="btn btn-primary btn-sm">
                                <i class="ft-plus white"> @lang('labels.new') @lang('ims::inventory.inventory_request')</i>
                            </a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                        <tr>
                                            <th>@lang('labels.serial')</th>
                                            <th>@lang('ims::inventory.inventory_request_title')</th>
                                            <th>@lang('labels.receiver')</th>
                                            <th>@lang('ims::inventory.inventory_request_type')</th>
                                            <th>@lang('ims::location.from_location')</th>
                                            <th>@lang('ims::location.to_location')</th>
                                            <th>@lang('labels.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($inventoryRequests as $inventoryRequest)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $inventoryRequest->title }}</td>
                                                <td>{{ $inventoryRequest->receiver->name }}</td>
                                                <td>{{ ucwords($inventoryRequest->request_type) }}</td>
                                                <td>{{ $inventoryRequest->fromLocation->name }}</td>
                                                <td>{{ $inventoryRequest->toLocation->name }}</td>
                                                <td>
                                                <span class="dropdown">
                                                    <button id="imsProductList" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                        <i class="la la-cog"></i>
                                                    </button>
                                                    <span aria-labelledby="imsProductList" class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="javascript:;" class="dropdown-item"><i class="ft-eye"></i> @lang('labels.details')</a>
                                                        <a href="{{ route('inventory-request.edit', $inventoryRequest->id) }}" class="dropdown-item"><i class="ft-edit-2"></i> @lang('labels.edit')</a>
                                                        <div class="dropdown-divider"></div>
                                                        {!! Form::open([
                                                            'method'=>'DELETE',
                                                            'url' => route('inventory-request.destroy', 1),
                                                            'style' => 'display:inline']); !!}

                                                        {!! Form::button('<i class="ft-trash"></i> '.trans('labels.delete'), array(
                                                                'type' => 'submit',
                                                                'class' => 'dropdown-item text-danger',
                                                                'title' => 'Delete',
                                                                'onclick'=>'return confirm("Confirm delete?")',
                                                                )); !!}

                                                        {!! Form::close(); !!}

                                                    </span>
                                                </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
