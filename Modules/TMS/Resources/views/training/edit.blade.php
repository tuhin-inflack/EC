@extends('tms::layouts.master')
@section('title', 'Training Edit')
@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
@endpush
@section('content')
    <body onload="dateDifference()">
    <section id="user-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">{{trans('tms::training.edit_card_title')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            {!! Form::open(['url' =>  route('training.update', ['training_id' => $training->id]), 'class' => 'form', 'novalidate', 'method' => 'post']) !!}
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> {{trans('tms::training.edit_form_title')}}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training_id" class="form-label required">{{trans('tms::training.training_id')}}</label>
                                            <input id="training_id" type="text"
                                                   class="form-control {{ $errors->has('training_id') ? ' is-invalid' : '' }}"
                                                   name="training_id" value="{{$training->training_id}}" readonly required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.training_id')])}}" autofocus>
                                            <div class="help-block"></div>
                                            @if ($errors->has('training_id'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('training_id') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training_name" class="form-label required">{{trans('tms::training.training_name')}}</label>
                                            <input id="training_name" type="text" class="form-control {{ $errors->has('training_title') ? ' is-invalid' : '' }}" name="training_title" value="{{ $training->training_title }}" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.training_name')])}}">
                                            <div class="help-block"></div>
                                            @if ($errors->has('training_title'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('training_title') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_date"
                                                   class="form-label required">{{trans('tms::training.start_date')}}</label>

                                            <input type="date"
                                                   class="form-control" name="start_date" id="start_date" value="{{$training->start_date}}" onchange="dateDifference()" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.start_date')])}}">
                                            <div class="help-block"></div>
                                            @if ($errors->has('start_date'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date"
                                                   class="form-label required">{{trans('tms::training.end_date')}}</label>
                                            <input type="hidden" name="status" value="1">
                                            <input type="date"
                                                   class="form-control {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                                   name="end_date" id="end_date" value="{{$training->end_date}}"  onchange="dateDifference()" onkeyup="dateDifference()" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.end_date')])}}">
                                            <div class="help-block"></div>
                                            @if ($errors->has('end_date'))
                                                <span class="invalid-feedback" role="alert"><strong>{{$errors->first('end_date') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training_len"
                                                   class="form-label">{{trans('tms::training.training_period')}}</label>
                                            <input type="text" name="training_len" id="training_len" class="form-control" readonly>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date"
                                                   class="form-label required">{{trans('tms::training.training_participant_no')}}</label>
                                            <input type="number"
                                                   class="form-control {{ $errors->has('no_of_trainee') ? ' is-invalid' : '' }}"
                                                   name="no_of_trainee" id="no_of_trainee" value="{{$training->no_of_trainee}}"  required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.training_participant_no')])}}">
                                            <div class="help-block"></div>
                                            @if ($errors->has('no_of_trainee'))
                                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('no_of_trainee') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ft-check-square"></i> {{trans('labels.save')}}
                                </button>
                                <button class="btn btn-warning" type="button" onclick="window.location = '{{route('training.index')}}'">
                                    <i class="ft-x"></i> {{trans('labels.cancel')}}
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@push('page-js')
    <script type="text/javascript" src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/scripts/forms/checkbox-radio.min.js') }}"></script>
    <script type="text/javascript">

        function dateDifference() {

            var val1 =  document.getElementById('start_date').value;
            document.getElementById('end_date').setAttribute('min',val1);
            var val2 =  document.getElementById('end_date').value;
            var date1 = new Date(val1);
            var date2 = new Date(val2);

            if(date2 > date1)
            {
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                if(diffDays>0)
                    document.getElementById('training_len').value = diffDays + " days";
                else
                    document.getElementById('training_len').value = "...";
            }
            else
                document.getElementById('training_len').value = "...";
        }
    </script>
@endpush
