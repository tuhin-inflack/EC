@extends('ims::layouts.master')

@section('title', trans('ims::product.create_page_title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('ims::product.create_page_title')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements" style="top: 5px;">
                            <ul class="list-inline mb-1">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                        <div class="heading-elements mt-2" style="margin-right: 10px;">
                            <a href="{{ route('inventory.product.list') }}" class="btn btn-primary btn-sm">
                                <i class="ft-list white">@lang('ims::product-list-table.links.list')</i>
                            </a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            {{ Form::open(['class' => 'form', 'novalidate']) }}
                            <h4 class="form-section"><i class="la la-puzzle-piece"></i> @lang('ims::product-create-form.title')</h4>
                            <div class="row">
                                <div class="col-4">
                                    {!! Form::label('name', __('ims::product-create-form.fields.name.title'), ['class' => 'form-label required']) !!}
                                    {!! Form::text('name', '', ['class' => "form-control", "required ", "placeholder" => __('ims::product-create-form.fields.name.placeholder'),
                                    "data-validation-required_message" => trans('validation.required', ['attribute' => __('ims::product-create-form.fields.name.title')])]) !!}
                                    <div class="help-block"></div>
                                </div>
                                <div class="col-4">
                                    {!! Form::label('code', __('ims::product-create-form.fields.code.title'), ['class' => 'form-label required']) !!}
                                    {!! Form::text('code', '', ['class' => "form-control", "required ", "placeholder" => __('ims::product-create-form.fields.code.placeholder'),
                                    "data-validation-required_message" => trans('validation.required', ['attribute' => __('ims::product-create-form.fields.code.title')])]) !!}
                                    <div class="help-block"></div>
                                </div>
                                <div class="col-4">
                                    {!! Form::label('date', __('ims::product-create-form.fields.date.title'), ['class' => 'form-label required']) !!}
                                    {{ Form::text('date', date('j F, Y'), ['id' => 'date', 'class' => 'form-control required',
                                    'placeholder' => __('ims::product-create-form.fields.date.placeholder'), "required ", 'disabled']) }}
                                    {{ Form::hidden('date', date('j F, Y')) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="row mt-lg-2">
                                <div class="col-4">
                                    {!! Form::label('sh_code', __('ims::product-create-form.fields.sh_code.title'), ['class' => 'form-label required']) !!}
                                    {!! Form::text('sh_code', '', ['class' => "form-control", "required ", "placeholder" => __('ims::product-create-form.fields.sh_code.placeholder'),
                                    "data-validation-required_message" => trans('validation.required', ['attribute' => __('ims::product-create-form.fields.hs_code.title')])]) !!}
                                    <div class="help-block"></div>
                                </div>
                                <div class="col-4">
                                    {!! Form::label('bar_code', __('ims::product-create-form.fields.bar_code.title'), ['class' => 'form-label required']) !!}
                                    {!! Form::text('bar_code', '', ['class' => "form-control", "required ", "placeholder" => __('ims::product-create-form.fields.bar_code.placeholder'),
                                    "data-validation-required_message" => trans('validation.required', ['attribute' => __('ims::product-create-form.fields.bar_code.title')])]) !!}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="form-actions mb-lg-3">
                                <a class="btn btn-warning pull-right" role="button" href="{{ route('inventory.product.list') }}" style="margin-left: 2px;">
                                    <i class="ft-x"></i> {{trans('labels.cancel')}}
                                </a>
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="la la-check-square-o"></i> {{trans('labels.save')}}
                                </button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
