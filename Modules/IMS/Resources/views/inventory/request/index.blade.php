@extends('ims::layouts.master')

@section('title', trans('ims::inventory.inventory_request_list'))

@section('content')
    <section id="product-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('ims::inventory.inventory_request_list')</h4>
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
                                            <th>{{trans('labels.serial')}}</th>
                                            <th>@lang('labels.title')</th>
                                            <th>@lang('ims::product-list-table.columns.code')</th>
                                            <th>@lang('ims::product-list-table.columns.hs_code')</th>
                                            <th>@lang('ims::product-list-table.columns.bar_code')</th>
                                            <th>{{trans('labels.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Chair</td>
                                            <td>C</td>
                                            <td>hs-120</td>
                                            <td>AB12345678910</td>
                                            <td>
                                                <span class="dropdown">
                                                    <button id="imsProductList" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                        <i class="la la-cog"></i>
                                                    </button>
                                                    <span aria-labelledby="imsProductList" class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="ft-eye"></i> @lang('labels.details')</a>
                                                        <a href="#" class="dropdown-item"><i class="ft-edit-2"></i> @lang('labels.edit')</a>
                                                        <div class="dropdown-divider"></div>

                                                        {!!

                                                            Form::open([
                                                              'method'=>'DELETE',
                                                              'url' => [''],
                                                              'style' => 'display:inline'
                                                                ])
                                                         !!}

                                                         {!!
                                                            Form::button('<i class="ft-trash"></i> '.trans('labels.delete'), array(
                                                            'type' => 'submit',
                                                            'class' => 'dropdown-item',
                                                            'title' => 'Delete the user',
                                                            'onclick'=>'return confirm("Confirm delete?")',
                                                                    ))
                                                                    !!}
                                                        {!! Form::close() !!}
                                                    </span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Table</td>
                                            <td>T</td>
                                            <td>hs-130</td>
                                            <td>CD10987654321</td>
                                            <td>
                                                <span class="dropdown">
                                                    <button id="imsProductList" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                        <i class="la la-cog"></i>
                                                    </button>
                                                    <span aria-labelledby="imsProductList" class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="ft-eye"></i> @lang('labels.details')</a>
                                                        <a href="#" class="dropdown-item"><i class="ft-edit-2"></i> @lang('labels.edit')</a>
                                                        <div class="dropdown-divider"></div>

                                                        {!!

                                                            Form::open([
                                                              'method'=>'DELETE',
                                                              'url' => [''],
                                                              'style' => 'display:inline'
                                                                ])
                                                         !!}

                                                        {!!
                                                           Form::button('<i class="ft-trash"></i> '.trans('labels.delete'), array(
                                                           'type' => 'submit',
                                                           'class' => 'dropdown-item',
                                                           'title' => 'Delete the user',
                                                           'onclick'=>'return confirm("Confirm delete?")',
                                                                   ))
                                                                   !!}
                                                        {!! Form::close() !!}
                                                    </span>
                                                </span>
                                            </td>
                                        </tr>
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
