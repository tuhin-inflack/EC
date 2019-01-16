@extends('pms::layouts.master')
@section('title', 'Add New Attribute')

@section('content')
    <div class="container">
        <div class="row match-height">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">@lang('pms::attribute.create_attribute')</h4>
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
                            {!! Form::open(['url' =>  '/user/role', 'class' => 'form', 'novalidate']) !!}
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-at-sign"></i>@lang('pms::attribute.attribute_create_form')</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="organization_id" class="form-label required">@lang('pms::attribute.organization')</label>
                                            {!! Form::select('organization_id', [], null, ['class' => 'form-control select2' . ($errors->has('organization_id') ? ' is-invalid' : ''), 'placeholder' => trans('labels.select')]) !!}

                                            @if ($errors->has('organization_id'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('organization_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label required">@lang('labels.name')</label>
                                            {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="unit" class="form-label required">@lang('pms::attribute.unit')</label>
                                            {!! Form::text('unit', null, ['class' => 'form-control' . ($errors->has('unit') ? ' is-invalid' : '')]) !!}

                                            @if ($errors->has('unit'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('unit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> {{trans('labels.save')}}
                                    </button>
                                    <a class="btn btn-warning mr-1" role="button" href="{{url('/user/role')}}">
                                        <i class="ft-x"></i> {{trans('labels.cancel')}}
                                    </a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection