@extends('hm::layouts.master')
@section('title', $type=='checkin' ? trans('hm::booking-request.check_in'): trans('hm::booking-request.title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Form wizard with number tabs section start -->
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ $type=='checkin' ? trans('hm::booking-request.check_in_card_title')
                                    : trans('hm::booking-request.card_title')}}</h4>
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
                                        @include('hm::booking-request.form', ['page' => 'create'])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with number tabs section end -->
            </div>
        </div>
    </div>
@endsection

@push('page-css')
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/checkboxes-radios.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/wizard.css') }}">

    <link rel="stylesheet" href="{{  asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css')  }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css')  }}">
@endpush

@push('page-js')
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/pickers/dateTime/pick-a-datetime.js') }}"></script>

    <script src="{{ asset('theme/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/wizard-steps.js') }}"></script>
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


        // added by sumon
        let minimum = '{!! trans('hm::checkin.minimum') !!}';
        let maximum = '{!! trans('hm::checkin.maximum') !!}';
        let minimum_message = '{!! trans('hm::checkin.minimum_message') !!}';
        let maximum_message = '{!! trans('hm::checkin.maximum_message') !!}';
        let room = '{!! trans('hm::checkin.room') !!}';
        let wrong_selection = '{!! trans('hm::checkin.wrong_selection') !!}';
        let at_least = '{!! trans('hm::checkin.at_least') !!}';
        let at_most = '{!! trans('hm::checkin.at_most') !!}';
        let room_selection = '{!! trans('hm::checkin.room_selection') !!}';
        let the = '{!! trans('hm::checkin.the') !!}';
        let current_lang = '{!!  Lang::locale()  !!}';
        // end by sumon



        // select2 placeholder localization
        let selectPlaceholder = '{!! trans('labels.select') !!}';

        // entities variables passed from server
        let roomTypes = JSON.parse('{!! json_encode($roomTypes) !!}');
        let employees = JSON.parse('{!! json_encode($employees) !!}');
        let designations = JSON.parse('{!! json_encode($designations) !!}');
        let departments = JSON.parse('{!! json_encode($departments) !!}');
        let room_type_names = JSON.parse('{!! json_encode($roomTypes->pluck('name', 'id')) !!}');
        let pageType = JSON.parse('{!! json_encode($type) !!}');

        // url to get trainees of selected training
        let traineesUrl = '{!! url('/tms/get-trainees-of-training') !!}';
    </script>
    <script src="{{ asset('js/booking-request/step.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/checkbox-radio.js') }}"></script>

    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/booking-request/page.js') }}"></script>

@endpush
        