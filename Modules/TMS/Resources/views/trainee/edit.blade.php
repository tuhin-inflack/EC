@extends('tms::layouts.master')
@section('title', 'Edit Trainee')
@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
@endpush
@section('content')
    <section id="user-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">{{trans('tms::training.edit_trainee')}}</h4>
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
                            {!! Form::open(['url' =>  '/tms/trainee/edit/'.$traineeId, 'class' => 'form', 'novalidate', 'method' => 'post']) !!}
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> {{trans('tms::training.edit_trainee_form_title')}}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training_id" class="form-label required">{{trans('tms::training.training_id')}}</label>
                                            <input type="hidden" name="training_id" value="{{$trainee->training_id}}" required>
                                            <input id="training_id" type="text"
                                                   class="form-control {{ $errors->has('training_id') ? ' is-invalid' : '' }}"
                                                   name="training_id" value="{{$trainee->trainingId}}" readonly required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.training_id')])}}" autofocus>
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
                                            <input id="training_name" type="text" class="form-control {{ $errors->has('training_title') ? ' is-invalid' : '' }}" name="training_title" value="{{$trainee->training_title }}" required readonly data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.training_name')])}}">
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
                                            <label for="trainee_first_name"
                                                   class="form-label required">{{trans('tms::training.trainee_first_name')}}</label>

                                            <input type="text"
                                                   class="form-control" name="trainee_first_name" id="trainee_first_name" value="{{ $trainee->trainee_first_name }}" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.trainee_first_name')])}}">
                                            <div class="help-block"></div>
                                            @if ($errors->has('trainee_first_name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('trainee_first_name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date"
                                                   class="form-label required">{{trans('tms::training.trainee_last_name')}}</label>
                                            <input type="hidden" name="status" value="1">
                                            <input type="hidden" name="training_id" value="{{$trainee->id}}">
                                            <input type="text"
                                                   class="form-control {{ $errors->has('trainee_last_name') ? ' is-invalid' : '' }}"
                                                   name="trainee_last_name" id="trainee_last_name" value="{{ $trainee->trainee_last_name}}"
                                                   required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.trainee_last_name')])}}">
                                            <div class="help-block"></div>
                                            @if ($errors->has('trainee_last_name'))
                                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('trainee_last_name') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training_len" class="form-label">{{trans('tms::training.trainee_gender')}}</label>
                                            <select class="form-control" name="trainee_gender" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('tms::training.trainee_gender')])}}">
                                                <option value=""> - Select Gender -</option>
                                                <option value="Male" {{($trainee->trainee_gender == 'Male')? 'selected':''}}>Male</option>
                                                <option value="Female" {{($trainee->trainee_gender == 'Female')? 'selected':''}}>Female</option>
                                            </select>
                                            <div class="help-block"></div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date"
                                                   class="form-label required">{{trans('labels.mobile')}}</label>
                                            <input type="text"
                                                   class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                                   name="mobile" id="mobile" value="{{ $trainee->mobile}}" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('labels.mobile')])}}">
                                            <div class="help-block"></div>
                                            @if ($errors->has('mobile'))
                                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('mobile') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ft-check-square"></i> {{trans('labels.save')}}
                                </button>
                                <button class="btn btn-warning" type="button" onclick="window.history.back();">
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
@endpush
