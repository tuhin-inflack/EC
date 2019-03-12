<h6>{{ trans('tms::training.emergency_contact') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstName1" class="required">@lang('tms::training.name') : </label>
                        <input type="text" class="form-control" id="firstName1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastName1" class="required">@lang('tms::training.mobile') : </label>
                        <input type="text" class="form-control" id="lastName1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.relation') :</label>
                        <input type="email" class="form-control" id="emailAddress1">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="shortDescription1" class="required">@lang('tms::training.address') :</label>
                    <textarea name="shortDescription" id="shortDescription1" rows="4" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
    <br>
</fieldset>

