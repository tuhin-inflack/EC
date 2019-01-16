@extends('pms::layouts.master')
@section('title', trans('pms::attribute.create_attribute'))

@section('content')
    <div class="container">
        <div class="row match-height">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Attribute Value Input</h4>
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
                                <h4 class="form-section"><i class="ft-at-sign"></i>Attribute Value Input Form</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="attribute"
                                                   class="form-label required">Attribute</label>
                                            {!! Form::text('attribute', $attribute->name, ['class' => 'form-control', 'disabled']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date"
                                                   class="form-label required">Date</label>
                                            {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'required', 'min' => 1]) !!}

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
                                                   class="form-label required">Value</label>
                                            {!! Form::number('value', null, ['class' => 'form-control' . ($errors->has('value') ? ' is-invalid' : ''), 'required', 'min' => 1]) !!}

                                            @if ($errors->has('value'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('value') }}</strong>
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