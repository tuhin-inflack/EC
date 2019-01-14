@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.research_proposal_creation'))

@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css')  }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css')  }}">
@endpush

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
                                    <h4 class="card-title">@lang('rms::research_proposal.research_proposal_creation')</h4>
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

                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 style="border-bottom: 1px solid #2C303B;">
                                            <i class="la la-briefcase"></i> @lang('rms::research_proposal.proposal_invitation_info')
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">@lang('labels.title')</h5>
                                        <pre>{{ $researchRequest->title }}</pre>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">@lang('rms::research_proposal.invitation_date')</h5>
                                        <pre>{{ date('d/m/Y', strtotime($researchRequest->created_at)) }}</pre>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ trans('rms::research_proposal.last_sub_date') }}</h5>
                                        <pre>{{ date('d/m/Y', strtotime($researchRequest->end_date)) }}</pre>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ trans('labels.remarks') }}</h5>
                                        <pre>{{ $researchRequest->remarks }}</pre>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        @include('rms::proposal.submission.form')
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

@push('page-js')
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.js')  }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/pickers/dateTime/pick-a-datetime.js')  }}"></script>
@endpush
