@extends('layouts.public')
@section('title', trans('tms::training.training_registration'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert bg-success alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <span style="color: black">{!! session('success') !!}</span>
                        <a href="{{ route('public-booking-requests.create') }}" class="btn btn-amber btn-accent-4" style="color: white"><b>@lang('hm::booking-request.create_booking_request')</b></a>

                    </div>
                @else
                <!-- Form wizard with number tabs section start -->
                    <section id="number-tabs">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">@lang('tms::training.training_registration_form')</h4>
                                        <a class="heading-elements-toggle"><i
                                                    class="la la-ellipsis-h font-medium-3"></i></a>
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
                                            {!! Form::open(['class' => 'number-tab-steps wizard-circle', 'enctype' => 'multipart/form-data']) !!}
                                                <!-- Step 1 -->
                                                @include('tms::public.training-registration.partials.form.step-1')
                                                <!-- Step 2 -->
                                                @include('tms::public.training-registration.partials.form.step-2')
                                                <!-- Step 3 -->
                                                @include('tms::public.training-registration.partials.form.step-3')
                                                <!-- Step 4 -->
                                                @include('tms::public.training-registration.partials.form.step-4')
                                                <!-- Step 5 -->
                                                @include('tms::public.training-registration.partials.form.step-5')
                                                <!-- Step 6 -->
                                                @include('tms::public.training-registration.partials.form.step-6')
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Form wizard with number tabs section end -->
                @endif
            </div>
        </div>
    </div>
@endsection

@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/checkboxes-radios.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/photo-upload.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/core/colors/palette-gradient.css')  }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/forms/selects/select2.min.css')  }}">
@endpush

@push('page-js')
    <script src="{{ asset('theme/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/pickers/dateTime/pick-a-datetime.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/dateTime/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/wizard-steps.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/select/form-select2.js') }}"></script>
    <script>
        /*
        *  Creation of js variables from php variables to be used in page.js and step.js
        * */
        // jquery step buttons localization
        let labels = {
            finish: '{!! trans('labels.submit') !!}',
            next: '{!! trans('labels.next') !!}',
            previous: '{!! trans('labels.previous') !!}',
        };
        //  localization
        let male = '{!! trans('labels.male') !!}';
        let female = '{!! trans('labels.female') !!}';
        let firstNameLabel = '{!! trans('labels.first_name') !!}';
        let lastNameLabel = '{!! trans('labels.last_name') !!}';
        let genderLabel = '{!! trans('labels.gender') !!}';
        let mobileLabel = '{!! trans('labels.mobile') !!}';
        // select2 placeholder localization
        let selectPlaceholder = '{!! trans('labels.select') !!}';



        // url to get trainees of selected training
        let traineesUrl = '{!! url('/tms/get-trainees-of-training') !!}';
    </script>
    <script src="{{ asset('js/booking-request/step.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/checkbox-radio.js') }}"></script>

    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}"></script>
@endpush