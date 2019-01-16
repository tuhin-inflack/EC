@extends('pms::layouts.master')
@section('title', __('pms::task.create_card_title'))
@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">

    <link rel="stylesheet" type="text/css" href="{{  asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css')  }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css')  }}">
@endpush
@section('content')
    <section id="user-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">{{trans('pms::task.create_card_title')}}</h4>
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
                            {!! Form::open(['url' =>  route('task.store', $project->id), 'class' => 'form', 'novalidate', 'method' => 'post']) !!}
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> {{trans('pms::task.create_form_title')}}</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{trans('pms::task.task_for')}}: <span class="badge bg-blue-grey">{{$project->title}}</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training_id" class="form-label required">{{trans('pms::task.task_name')}}</label>
                                            <select class="select2 form-control{{ $errors->has('send_to') ? ' is-invalid' : '' }} required" multiple="multiple" name="task_name" data-msg-required="kfdjkfjdkf">
                                                @foreach($taskNames as $taskName)
                                                    <option value="{{$taskName->id}}">{{$taskName->name}}</option>
                                                @endforeach
                                            </select>

                                            <div class="help-block"></div>
                                            @if ($errors->has('task_id'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('task_id') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training_start_date"
                                                   class="form-label required">{{trans('pms::task.expected_start_date')}}</label>
                                            <input type="text" class="form-control required {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                                   name="expected_start_time" placeholder="Pick Date" id="training_start_date" value="{{ old('start_date') }}" onchange="dateDifference()" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('pms::task.start_date')])}}">
                                            <input type="hidden" name="status" value="1">
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
                                            <label for="training_end_date required" class="form-label required">{{trans('pms::task.expected_end_date')}}</label>
                                            <input type='text' onchange="dateDifference()"
                                                   class="form-control required {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                                   placeholder="Pick a Date" id="training_end_date" name="expected_end_time" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('pms::task.end_date')])}}">
                                            <div class="help-block"></div>
                                            @if ($errors->has('end_date'))
                                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('end_date') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training_len"
                                                   class="form-label">{{trans('pms::task.task_description')}}</label>
                                            <input type="text" name="training_len" id="training_len" class="form-control" readonly>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date"
                                                   class="form-label required">{{trans('pms::task.training_participant_no')}}</label>
                                            <input type="number"
                                                   class="form-control {{ $errors->has('no_of_trainee') ? ' is-invalid' : '' }}"
                                                   name="no_of_trainee" id="no_of_trainee" value="{{ old('no_of_trainee') }}" required data-validation-required-message="{{trans('validation.required', ['attribute' => trans('pms::task.training_participant_no')])}}">
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

    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.js')  }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/pickers/dateTime/pick-a-datetime.js')  }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>

    <script type="text/javascript">
        $('#training_start_date').change(function(){
            $('#training_end_date').pickadate('picker').set('min', new Date($(this).val()));
        });

        $('#training_start_date, #training_end_date').pickadate({
            format: 'yyyy-mm-dd',
        });

        function dateDifference() {
            var val1 =  document.getElementById('training_start_date').value;
            var val2 =  document.getElementById('training_end_date').value;
            var date1 = new Date(val1);
            var date2 = new Date(val2);

            console.log('triggered');

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
