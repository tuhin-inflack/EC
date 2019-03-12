<h6>{{ trans('tms::training.trainee_service') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstName1" class="required">@lang('tms::training.designation') : </label>
                        <input type="text" class="form-control" id="firstName1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastName1" class="required">@lang('tms::training.organization') : </label>
                        <input type="text" class="form-control" id="lastName1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.service_code') :</label>
                        <input type="email" class="form-control" id="emailAddress1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="location1" class="required">@lang('tms::training.joining_date') :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <span class="la la-calendar-o"></span>
                                    </span>
                                </div>
                                <input type='text' class="form-control pickadate" placeholder="Basic Pick-a-date"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.experience') :</label>
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

