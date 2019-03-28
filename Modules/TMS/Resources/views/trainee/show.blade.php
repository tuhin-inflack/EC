@extends('tms::layouts.master')
@section('title', trans('tms::training.trainee_details'))

@section('content')
    <section id="user-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('tms::training.trainee_details')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><button onclick="printTraineeDetails()">@lang('labels.print')</button></li>
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-underline no-hover-bg">
                                    @include('tms::trainee.partials.tab')
                                </ul>
                                <div class="tab-content px-1 pt-1" id="section-to-print">
                                    <div role="tabpanel" class="tab-pane active" id="personal_info" aria-expanded="true"
                                         aria-labelledby="base-tab31">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th style="border-top: none;" class="hide">@lang('labels.image')</th>
                                                <td style="border-top: none;">

                                                    <img src="{{ url("/file/get?filePath=" .  $trainee->photo) }}"
                                                         width="200px" height="200px">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.full_name')
                                                    (@lang('tms::training.in_bangla'))
                                                </th>
                                                <td>{{$trainee->bangla_name}}</td>
                                            </tr>
                                            <tr>

                                                <th class="">@lang('tms::training.full_name')
                                                    (@lang('tms::training.in_english'))
                                                </th>
                                                <td>{{$trainee->english_name}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.gender')</th>
                                                <td>{{$trainee->trainee_gender}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.dob')</th>
                                                <td>{{$trainee->dob}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.email')</th>
                                                <td>{{$trainee->email}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.mobile')</th>
                                                <td>{{$trainee->mobile}}</td>
                                            </tr>

                                            <tr>
                                                <th class="">@lang('tms::training.phone')</th>
                                                <td>{{$trainee->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.fax')</th>
                                                <td>{{$trainee->fax}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="general_info" aria-labelledby="base-tab32">
                                        <table class="table ">
                                            <tbody>
                                            <tr>
                                                <th style="border-top: none;">@lang('tms::training.fathers_name')</th>
                                                <td style="border-top: none;">{{$trainee->generalInfos->fathers_name}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.mothers_name')
                                                </th>
                                                <td>{{$trainee->generalInfos->mothers_name}}</td>
                                            </tr>
                                            <tr>

                                                <th class="">@lang('tms::training.birth_place')
                                                </th>
                                                <td>{{$trainee->generalInfos->birth_place}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.marital_status')</th>
                                                <td>{{$trainee->generalInfos->marital_status}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.present_address')</th>
                                                <td>{{$trainee->generalInfos->present_address}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="educational_info" aria-labelledby="base-tab33">
                                        <table class="table ">
                                            <tbody>
                                            <tr>
                                                <th style="border-top: none;">@lang('tms::training.degree_name')</th>
                                                <td style="border-top: none;">{{$trainee->educations->degree}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.degree_subject')
                                                </th>
                                                <td>{{$trainee->educations->subject}}</td>
                                            </tr>
                                            <tr>

                                                <th class="">@lang('tms::training.passing_year')
                                                </th>
                                                <td>{{$trainee->educations->passing_year}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.education_board') / @lang('tms::training.university')</th>
                                                <td>{{$trainee->educations->institution}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="trainee_service" aria-labelledby="base-tab34">
                                        <table class="table ">
                                            <tbody>
                                            <tr>
                                                <th style="border-top: none;">@lang('tms::training.designation')</th>
                                                <td style="border-top: none;">{{$trainee->services->designation}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.organization')
                                                </th>
                                                <td>{{$trainee->services->organization}}</td>
                                            </tr>
                                            <tr>

                                                <th class="">@lang('tms::training.service_code')
                                                </th>
                                                <td>{{$trainee->services->service_code}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.joining_date')</th>
                                                <td>{{$trainee->services->joining_date}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="emergency_contact" aria-labelledby="base-tab35">
                                        <table class="table ">
                                            <tbody>
                                            <tr>
                                                <th style="border-top: none;">@lang('tms::training.name')</th>
                                                <td style="border-top: none;">{{$trainee->emergencyContacts->name}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.mobile')
                                                </th>
                                                <td>{{$trainee->emergencyContacts->mobile_no}}</td>
                                            </tr>
                                            <tr>

                                                <th class="">@lang('tms::training.relation')
                                                </th>
                                                <td>{{$trainee->emergencyContacts->relation}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">@lang('tms::training.address')</th>
                                                <td>{{$trainee->emergencyContacts->contact_address}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-css')
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #section-to-print, #section-to-print * {
                visibility: visible;
            }
            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
            }
            .tab-content > .tab-pane {
                display: block;
            }
            .hide{
                display: none;
            }

        }
    </style>
@endpush

@push('page-js')
    <script>
        $(document).ready(function () {
            var url = document.URL;
            var hash = url.substring(url.indexOf('#'));

            $(".nav-tabs").find("li a").each(function (key, val) {
                if (hash == $(val).attr('href')) {
                    $(val).click();
                }

                $(val).click(function (ky, vl) {
                    location.hash = $(this).attr('href');
                });
            });

        })
    </script>

    <script>
        function printTraineeDetails() {
            window.print();
        }
    </script>
@endpush
