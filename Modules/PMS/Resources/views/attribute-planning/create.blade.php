@extends('pms::layouts.master')
@section('title', trans('pms::attribute_planning.enter_planning'))

@section('content')
    <section>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('pms::attribute_planning.enter_planning')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            {!! Form::open(['route' =>  ['attribute-plannings.store', $project->id], 'class' => 'form']) !!}
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> Attribute Planning Form</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date"
                                                   class="form-label required">@lang('labels.date')</label>
                                            {!! Form::text('date', null, [
                                                'class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''),
                                                'autocomplete' => 'off'
                                            ]) !!}

                                            @if ($errors->has('date'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($project->attributes as $attribute)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label required">{{ $attribute->name }}</label>
                                            {{ Form::hidden('planning[' . $loop->iteration . '][attribute_id]', $attribute->id) }}
                                            {{ Form::number('planning[' . $loop->iteration . '][planned_value]', null, [
                                                'class' => 'form-control',
                                                'min' => 0
                                            ]) }}

                                            <div class="help-block"></div>
                                            @if ($errors->has($attribute->id))
                                                <span class="invalid-feedback">
                                                        <strong>{{ $errors->first($attribute->id) }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> {{trans('labels.save')}}
                                </button>
                                <a class="btn btn-warning mr-1" role="button"
                                   href="{{ route('project.show', $project->id) }}">
                                    <i class="ft-x"></i> {{trans('labels.cancel')}}
                                </a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@push('page-css')
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/ui/jquery-ui.min.css') }}">
    <style>
        .ui-datepicker-calendar {
            display: none;
        }
    </style>
@endpush

@push('page-js')
    <script src="{{ asset('theme/js/core/libraries/jquery_ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/ui/jquery-ui/date-pickers.js') }}"></script>
    <script src="{{ asset('js/month-year/custom-jquery-datepicker.js') }}"></script>
    <script>
        $(document).ready(function () {
            monthYearDatePicker('input[name=date]');
        });
    </script>
@endpush