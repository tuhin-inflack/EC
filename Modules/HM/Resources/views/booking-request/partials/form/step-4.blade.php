<h6>{{ trans('hm::booking-request.step_4') }}</h6>
<fieldset>
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.billing_information') }}
    </h4>
    <div class="row">
        <div class="col-md-4">
            <strong>@lang('labels.name'): </strong><span id="primary-contact-name"></span><br>
            <strong>@lang('labels.contact'): </strong><span id="primary-contact-contact"></span>
        </div>
        <div class="col-md-4">
            <strong>@lang('hm::booking-request.start_date'): </strong><span id="start_date_display"></span>
        </div>
        <div class="col-md-4">
            <strong>@lang('hm::booking-request.end_date'): </strong><span id="end_date_display"></span>
        </div>
    </div>
    <br>
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.room_type') }}
    </h4>
    <div class="row">
        <div class="table-responsive">
            <table id="billing-table"
                   class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{{ trans('hm::booking-request.room_type') }}</th>
                    <th>{{ trans('hm::booking-request.quantity') }}</th>
                    <th>{{ trans('hm::booking-request.duration') }}</th>
                    <th>{{ trans('hm::booking-request.rate_type') }}</th>
                    <th>{{ trans('hm::booking-request.rate') }}</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.guest_information') }}
    </h4>
    <div class="row">
        <div class="table-responsive">
            <table id="guests-info-table"
                   class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{{ trans('hm::booking-request.name') }}</th>
                    <th>{{ trans('hm::booking-request.age') }}</th>
                    <th>{{ trans('hm::booking-request.gender') }}</th>
                    <th>{{ trans('hm::booking-request.relation') }}</th>
                    <th>{{ trans('hm::booking-request.address') }}</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.bard_reference') }}
    </h4>
    <div class="row">
        <div class="col-md-6">
            <strong>@lang('labels.name'): </strong><span id="bard-referee-name"></span><br>
            <strong>@lang('hm::booking-request.designation'): </strong><span id="bard-referee-designation"></span><br>
            <strong>@lang('hm::booking-request.department'): </strong><span id="bard-referee-department"></span><br>
        </div>
    </div>
</fieldset>