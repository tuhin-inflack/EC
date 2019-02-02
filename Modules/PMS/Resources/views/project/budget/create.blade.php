@extends('pms::layouts.master')
@section('title', trans('pms::project_budget.title'))
@push('page-css')
    <style>
        .table > thead {
            text-align: center;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@lang('labels.create') @lang('pms::project_budget.budgeting')</h4>
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
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th rowspan="3" width="8%">Economy Code</th>
                                                    <th rowspan="3" width="8%">Economy Code Detail</th>
                                                    <th colspan="5">Total financial and implementation plans</th>
                                                    <th colspan="3">Years of finance -- 1</th>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">একক</th>
                                                    <th rowspan="2">একক দর</th>
                                                    <th rowspan="2">পরিমাণ</th>
                                                    <th rowspan="2">মোট ব্যয়</th>
                                                    <th rowspan="2">ওজন (Weight)</th>
                                                    <th rowspan="2">আর্থিক পরিমাণ (লক্ষ টাকা)</th>
                                                    <th colspan="2">বাস্তব</th>
                                                </tr>
                                                <tr>
                                                    <th>অঙ্গের শতকার হার</th>
                                                    <th>প্রকল্পের শতকরা হার</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/assets/css/style.css') }}">
    <!-- END Custom CSS-->
@endpush

@push('page-js')
    <script src="{{ asset('theme/js/scripts/pickers/dateTime/pick-a-datetime.js')  }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.js')  }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.date.js') }}"></script>

    <script src="{{ asset('theme/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/wizard-steps.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/checkbox-radio.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/editors/ckeditor/ckeditor.js')  }}"></script>
    <script>
        $(document).ready(function () {
            // datepicker
            $('#end_date, #start_date').pickadate({
                min: new Date()
            });

            $('#end_date, #start_date').pickadate();


            // validation
            $('.project-submission-tab-steps').validate({
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
                    if (element.attr('type') == 'radio') {
                        error.insertBefore(element.parents().siblings('.radio-error'));
                    } else if (element[0].tagName == "SELECT") {
                        error.insertAfter(element.siblings('.select2-container'));
                    } else if (element.attr('id') == 'ckeditor') {
                        error.insertAfter(element.siblings('#cke_ckeditor'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    title: {
                        maxlength: 100
                    },
                    remarks: {
                        maxlength: 5000
                    }
                },
            });

        });


    </script>
@endpush
