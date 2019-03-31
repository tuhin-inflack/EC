@extends('ims::layouts.master')

@section('title', trans('ims::inventory.list_page_title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('ims::inventory.list_page_title')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements" style="top: 10px;">
                            <ul class="list-inline mb-1">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                        <tr>
                                            <th>{{trans('labels.serial')}}</th>
                                            <th>@lang('ims::inventory-list-table.columns.code.title')</th>
                                            <th>@lang('ims::inventory-list-table.columns.name.title')</th>
                                            <th>@lang('ims::inventory-list-table.columns.hs_code.title')</th>
                                            <th>@lang('ims::inventory-list-table.columns.quantity.title')</th>
                                            <th>@lang('ims::inventory-list-table.columns.alert_quantity.title')</th>
                                            <th>@lang('ims::inventory-list-table.columns.warehouses.0.title')</th>
                                            <th>@lang('ims::inventory-list-table.columns.warehouses.1.title')</th>
                                            <th>@lang('ims::inventory-list-table.columns.warehouses.2.title')</th>
                                            <th>@lang('ims::inventory-list-table.columns.warehouses.3.title')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>12</td>
                                            <td>Chair</td>
                                            <td>hs-120</td>
                                            <td>2100</td>
                                            <td>20</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>134</td>
                                            <td>Light</td>
                                            <td>hs-144</td>
                                            <td>2100</td>
                                            <td>20</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>23</td>
                                            <td>Table</td>
                                            <td>hs-139</td>
                                            <td>2100</td>
                                            <td>20</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>26</td>
                                            <td>Fan</td>
                                            <td>hs-127</td>
                                            <td>2100</td>
                                            <td>20</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>12</td>
                                            <td>Chair</td>
                                            <td>hs-199</td>
                                            <td>2100</td>
                                            <td>20</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>134</td>
                                            <td>Light</td>
                                            <td>hs-239</td>
                                            <td>2100</td>
                                            <td>20</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>23</td>
                                            <td>Table</td>
                                            <td>hs-349</td>
                                            <td>2100</td>
                                            <td>20</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">8</th>
                                            <td>26</td>
                                            <td>Fan</td>
                                            <td>hs-111</td>
                                            <td>2100</td>
                                            <td>20</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>100</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop