@extends('hm::layouts.master')
@section('title', 'Booking create')

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
                                    <h4 class="card-title">Form wizard with number tabs</h4>
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
                                        <form action="#" class="number-tab-steps wizard-circle">
                                            <!-- Step 1 -->
                                            <h6>Step 1</h6>
                                            <fieldset>
                                                <h4 class="form-section"><i class="la  la-building-o"></i>Booking Details</h4>
                                                <div class="row">
                                                    <!-- Start of .col-md-6 -->
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="">Booking Date</label>
                                                                <input type="text" class="form-control" id=""
                                                                       value="{{ date('d-m-Y') }}" disabled="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="">Room Type</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="skin skin-flat">
                                                                            <fieldset>
                                                                                <input type="checkbox" id="room-type">
                                                                                <label for="">AC</label>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="skin skin-flat">
                                                                            <fieldset>
                                                                                <input type="checkbox" id="room-type">
                                                                                <label for="">Non AC</label>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="skin skin-flat">
                                                                            <fieldset>
                                                                                <input type="checkbox" id="room-type">
                                                                                <label for="">Delux</label>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="skin skin-flat">
                                                                            <fieldset>
                                                                                <input type="checkbox" id="room-type">
                                                                                <label for="">Double</label>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="">Booking Type</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="skin skin-flat">
                                                                            <fieldset>
                                                                                <input type="checkbox" id="booking-type">
                                                                                <label for="">General Purpose</label>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="skin skin-flat">
                                                                            <fieldset>
                                                                                <input type="checkbox" id="booking-type">
                                                                                <label for="">Training</label>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- End of .col-md-6 -->
                                                    <!-- Start of .col-md-6 -->
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="">Duration of stay</label>
                                                                <div class='input-group'>
                                                                    <input type='text' class="form-control datetime"
                                                                           id="check-in-out"/>
                                                                    <span class="input-group-addon">
                                                                        <span class="ft-calendar"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="">Number of rooms</label>
                                                                <select name="" id="no-of-rooms-select"
                                                                        class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End of .col-md-6 -->
                                                </div>
                                                <h4 class="form-section"><i class="la  la-building-o"></i>Occupation Detials</h4>
                                                <div class="row">
                                                    <!-- Start of .col-md-6 -->
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="">Organization</label>
                                                                <input type="text" class="form-control" id=""
                                                                       value="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="">Organization Type</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="skin skin-flat">
                                                                            <fieldset>
                                                                                <input type="checkbox" id="organization-type">
                                                                                <label for="">Government</label>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="skin skin-flat">
                                                                            <fieldset>
                                                                                <input type="checkbox" id="organization-type">
                                                                                <label for="">Private</label>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="skin skin-flat">
                                                                            <fieldset>
                                                                                <input type="checkbox" id="organization-type">
                                                                                <label for="">Foreign</label>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="skin skin-flat">
                                                                            <fieldset>
                                                                                <input type="checkbox" id="organization-type">
                                                                                <label for="">Others</label>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End of .col-md-6 -->
                                                    <!-- Start of .col-md-6 -->
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="">Designation</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End of .col-md-6 -->
                                                </div>
                                            </fieldset>
                                            <!-- Step 2 -->
                                            <h6>Step 2</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="proposalTitle1">Proposal Title :</label>
                                                            <input type="text" class="form-control" id="proposalTitle1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="emailAddress2">Email Address :</label>
                                                            <input type="email" class="form-control" id="emailAddress2">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="videoUrl1">Video URL :</label>
                                                            <input type="url" class="form-control" id="videoUrl1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="jobTitle1">Job Title :</label>
                                                            <input type="text" class="form-control" id="jobTitle1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="shortDescription1">Short Description :</label>
                                                            <textarea name="shortDescription" id="shortDescription1"
                                                                      rows="4" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Step 3 -->
                                            <h6>Step 3</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="eventName1">Event Name :</label>
                                                            <input type="text" class="form-control" id="eventName1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="eventType1">Event Type :</label>
                                                            <select class="custom-select form-control" id="eventType1"
                                                                    data-placeholder="Type to search cities"
                                                                    name="eventType1">
                                                                <option value="Banquet">Banquet</option>
                                                                <option value="Fund Raiser">Fund Raiser</option>
                                                                <option value="Dinner Party">Dinner Party</option>
                                                                <option value="Wedding">Wedding</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="eventLocation1">Event Location :</label>
                                                            <select class="custom-select form-control"
                                                                    id="eventLocation1" name="location">
                                                                <option value="">Select City</option>
                                                                <option value="Amsterdam">Amsterdam</option>
                                                                <option value="Berlin">Berlin</option>
                                                                <option value="Frankfurt">Frankfurt</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="jobTitle2">Event Date - Time :</label>
                                                            <div class='input-group'>
                                                                <input type='text' class="form-control datetime"
                                                                       id="jobTitle2"/>
                                                                <span class="input-group-addon">
                                                                  <span class="ft-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="eventStatus1">Event Status :</label>
                                                            <select class="custom-select form-control" id="eventStatus1"
                                                                    name="eventStatus">
                                                                <option value="Planning">Planning</option>
                                                                <option value="In Progress">In Progress</option>
                                                                <option value="Finished">Finished</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Requirements :</label>
                                                            <div class="c-inputs-stacked">
                                                                <div class="d-inline-block custom-control custom-checkbox">
                                                                    <input type="checkbox" name="status1"
                                                                           class="custom-control-input" id="staffing1">
                                                                    <label class="custom-control-label" for="staffing1">Staffing</label>
                                                                </div>
                                                                <div class="d-inline-block custom-control custom-checkbox">
                                                                    <input type="checkbox" name="status1"
                                                                           class="custom-control-input" id="catering1">
                                                                    <label class="custom-control-label" for="catering1">Catering</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Step 4 -->
                                            <h6>Step 4</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="meetingName1">Name of Meeting :</label>
                                                            <input type="text" class="form-control" id="meetingName1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="meetingLocation1">Location :</label>
                                                            <input type="text" class="form-control"
                                                                   id="meetingLocation1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="participants1">Names of Participants</label>
                                                            <textarea name="participants" id="participants1" rows="4"
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="decisions1">Decisions Reached</label>
                                                            <textarea name="decisions" id="decisions1" rows="4"
                                                                      class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Agenda Items :</label>
                                                            <div class="c-inputs-stacked">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="agenda1"
                                                                           class="custom-control-input" id="item11">
                                                                    <label class="custom-control-label" for="item11">1st
                                                                        item</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="agenda1"
                                                                           class="custom-control-input" id="item12">
                                                                    <label class="custom-control-label" for="item12">2nd
                                                                        item</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="agenda1"
                                                                           class="custom-control-input" id="item13">
                                                                    <label class="custom-control-label" for="item13">3rd
                                                                        item</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="agenda1"
                                                                           class="custom-control-input" id="item14">
                                                                    <label class="custom-control-label" for="item14">4th
                                                                        item</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="agenda1"
                                                                           class="custom-control-input" id="item15">
                                                                    <label class="custom-control-label" for="item15">5th
                                                                        item</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/wizard.css') }}">
@endpush

@push('page-js')
    <script src="{{ asset('theme/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/dateTime/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/wizard-steps.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/tables/components/table-components.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#check-in-out').daterangepicker();
            $('#no-of-rooms-select').select2();
        });
    </script>
@endpush