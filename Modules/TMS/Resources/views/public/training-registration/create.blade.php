@extends('layouts.public')
@section('title', trans('tms::training.training_registration'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert bg-success alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <span style="color: black">{!! session('success') !!}</span>
                        <a href="{{ route('training-registration.index') }}" class="btn btn-amber btn-accent-4" style="color: white"><b>@lang('tms::training.registration_for_training')</b></a>

                    </div>
                @else
                <!-- Form wizard with number tabs section start -->
                <section id="validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@lang('tms::training.training_registration_form')</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
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
                                            {!! Form::open(['route' =>  ['training-registration.store', $training->id], 'class' => 'wizard-circle training-steps', 'enctype' => 'multipart/form-data']) !!}
                                                <!-- Step 1 -->
                                            {{--@include('tms::public.training-registration.partials.form.step-1')
                                            <!-- Step 2 -->
                                            @include('tms::public.training-registration.partials.form.step-2')
                                            <!-- Step 3 -->
                                            @include('tms::public.training-registration.partials.form.step-3')
                                            <!-- Step 4 -->
                                            @include('tms::public.training-registration.partials.form.step-4')
                                            <!-- Step 5 -->
                                            @include('tms::public.training-registration.partials.form.step-5')--}}
                                            <!-- Step 6 -->
                                            {{--@include('tms::public.training-registration.partials.form.step-6')--}}
                                            <!-- Step 7 -->
                                            @include('tms::public.training-registration.partials.form.step-7')
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
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/plugins/forms/wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/photo-upload.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/checkboxes-radios.css') }}">

@endpush

@push('page-js')
    <script src="{{ asset('theme/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/dateTime/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('theme/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('theme/js/core/app.js') }}"></script>
    <script>
        let trainingForm = '.training-steps';
        var form = $(trainingForm).show();

        $(trainingForm).steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: '{!! trans('labels.submit') !!}',
                next: '{!! trans('labels.next') !!}',
                previous: '{!! trans('labels.previous') !!}',
            },
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex)
                {
                    return true;
                }
                // Forbid next action on "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age-2").val()) < 18)
                {
                    return false;
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                $('.training-steps').submit();
            }
        });
    </script>
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/checkbox-radio.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('.training-steps').validate({
                ignore: 'input[type=hidden]', // ignore hidden fields
                errorClass: 'danger',
                successClass: 'success',
                highlight: function (element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                unhighlight: function (element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                errorPlacement: function (error, element) {
                    if (element.attr('type') === 'radio') {
                        error.insertAfter(element.parents().siblings('.radio-error'));
                    } else if (element[0].tagName === "SELECT") {
                        error.insertAfter(element.siblings('.select2-container'));
                    } else if (element.attr('id') === 'start_date' || element.attr('id') === 'end_date') {
                        error.insertAfter(element.parents('.input-group'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    end_date: {
                        greaterThanOrEqual: '#start_date'
                    },
                    first_name: {
                        maxlength: 50
                    },
                    // 'room-show': {
                    //     CheckRoomValidation: 0
                    // },
                    contact: {
                        minlength: 11,
                        maxlength: 11
                    },
                    address: {
                        maxlength: 300
                    },
                    nid: {
                        minlength: 10,
                        maxlength: 10
                    },
                },
            });
        });
    </script>

    <script src="{{ asset('theme/js/scripts/forms/select/form-select2.js') }}"></script>
@endpush

