@extends('tms::layouts.master')
@section('title', trans('tms::training.title'))

@section('content')
    <h1>
        @lang('labels.dashboard')
        <span class="font-size-base">
        </span>
    </h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">@lang('tms::training.menu_title')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>@lang('tms::training.menu_title')</th>
                                        <th>@lang('tms::training.training_participant_no')</th>
                                        <th>@lang('tms::training.start_date')</th>
                                        <th>@lang('tms::training.end_date')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="la la-building warning font-large-2"></i>
                                                </div>
                                                <div class="col-10">
                                                    <h1 class="">
                                                        <a href="tms/training"
                                                               class="text-capitalize">Training Name</a>
                                                    </h1>

                                                </div>
                                            </div>
                                        </th>
                                        <th><h2>25</h2></th>
                                        <th><h2>-</h2></th>
                                        <th><h2>-</h2></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="la la-building warning font-large-2"></i>
                                                </div>
                                                <div class="col-10">
                                                    <h1 class="">
                                                        <a href="tms/training"
                                                           class="text-capitalize">Training Name</a>
                                                    </h1>

                                                </div>
                                            </div>
                                        </th>
                                        <th><h2>67</h2></th>
                                        <th><h2>-</h2></th>
                                        <th><h2>-</h2></th>
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
