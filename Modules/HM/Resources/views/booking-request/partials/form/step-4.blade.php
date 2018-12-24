<h6>{{ trans('hm::booking-request.step_4') }}</h6>
<fieldset>
    <h4 class="form-section"><i class="la  la-building-o"></i>{{ trans('hm::booking-request.billing_information') }}</h4>
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
</fieldset>