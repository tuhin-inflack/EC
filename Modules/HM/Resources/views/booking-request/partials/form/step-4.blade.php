<h6>{{ trans('hm::booking-request.step_4') }}</h6>
<fieldset>
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.billing_information') }}
    </h4>
    <div class="row">
        <div class="col-md-6">
            <strong>Name: </strong><span id="primary-contact-name">Tanvir</span><br>
            <strong>Contact: </strong><span id="primary-contact-contact">Tanvir</span>
        </div>
        <div class="col-md-3">
            <strong>Start Date: </strong><span id="start_date"></span>
        </div>
        <div class="col-md-3">
            <strong>End Date: </strong><span id="end_date"></span>
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
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.bard_reference') }}
    </h4>
    <div class="row">
        <div class="col-md-6">
            <strong>Name: </strong><span id="bard-referee-name"></span><br>
            <strong>Contact: </strong><span id="bard-referee-contact"></span><br>
            <strong>Department: </strong><span id="bard-referee-department"></span><br>
        </div>
    </div>
</fieldset>