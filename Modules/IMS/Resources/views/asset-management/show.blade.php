@extends('ims::layouts.master')
@section('title', trans('labels.details'))

@section('content')
    {{--{{ dd($employee) }}--}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">@lang('labels.details')</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    {{--<li><a data-action="close"><i class="ft-x"isFlowCompleted></i></a></li>--}}
                </ul>
            </div>
        </div>
        <div class="card-content collapse show" style="">
            <div class="card-body">

                <div class="tab-content ">
                    <div class="tab-pane active show" role="tabpanel" id="general" aria-labelledby="general-tab"
                         aria-expanded="true">
                        <table class="table ">
                            <tbody>

                            <tr>
                                <th class="">@lang('ims::asset.name')</th>
                                <td>{{$asset['title']}}</td>
                            </tr>
                            <tr>
                                <th class="">@lang('ims::asset.price')</th>
                                <td>{{$asset['price']}}</td>
                            </tr>
                            <tr>
                                <th class="">@lang('ims::asset.purchase_date')</th>
                                <td>{{$asset['purchase_date']}}</td>
                            </tr>
                            <tr>
                                <th class="">@lang('ims::asset.appreciation')</th>
                                <td>{{$asset['appreciation']}}</td>
                            </tr>
                            <tr>
                                <th class="">@lang('ims::asset.depreciation')</th>
                                <td>{{$asset['depreciation']}}</td>
                            </tr>
                            <tr>
                                <th class="">@lang('labels.status')</th>
                                <td>{{$asset['status']}}</td>
                            </tr>
                            </tbody>
                        </table>
                        {{--<a href="{{url('/hrm/employee/')}}"--}}
                        <a class="btn btn-small btn-info" href="{{ route('asset.list') }}">@lang('labels.back_page') </a>
                        {{--<a class="btn btn-small btn-info" href="{{ route('photocopy-management.list') }}">@lang('labels.edit') </a>--}}

                    </div>


                </div>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body"></div>
        </div>
    </div>

@endsection