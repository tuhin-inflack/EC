@extends('pms::layouts.master')
@section('title', trans('pms::attribute.create_attribute'))

@section('content')
    <div class="container">
        <div class="row match-height">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">@lang('pms::attribute.attribute_value_input')</h4>
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
                            {!! Form::open(['route' =>  ['attribute-values.store', $attribute->id], 'class' => 'form']) !!}
                            <div class="form-body">
                                <h4 class="form-section"><i
                                            class="ft-at-sign"></i>@lang('pms::attribute.attribute_value_input_form')
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="attribute"
                                                   class="form-label required">@lang('pms::attribute.attribute_name')</label>
                                            {!! Form::text('attribute', $attribute->name, ['class' => 'form-control', 'disabled']) !!}
                                            {!! Form::hidden('attribute_id', $attribute->id) !!}

                                            @if ($errors->has('date'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date"
                                                   class="form-label required">@lang('labels.date')</label>
                                            {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'required', 'min' => 0]) !!}

                                            @if ($errors->has('date'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="value"
                                                   class="form-label required">@lang('pms::attribute.planned_value')
                                                <i>( {{ $attribute->unit }} )</i></label>
                                            {!! Form::number('planned_value', null, ['class' => 'form-control' . ($errors->has('planned_value') ? ' is-invalid' : ''), 'required', 'min' => 0]) !!}

                                            @if ($errors->has('planned_value'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('planned_value') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="value"
                                                   class="form-label required">@lang('pms::attribute.achieved_value')
                                                <i>( {{ $attribute->unit }} )</i></label>
                                            {!! Form::number('achieved_value', null, ['class' => 'form-control' . ($errors->has('achieved_value') ? ' is-invalid' : ''), 'required', 'min' => 0]) !!}

                                            @if ($errors->has('achieved_value'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('achieved_value') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> {{trans('labels.save')}}
                                    </button>
                                    <a class="btn btn-warning mr-1" role="button"
                                       href="{{ route('attributes.index') }}">
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