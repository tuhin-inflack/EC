<h6>{{ trans('tms::training.general_info') }}</h6>
<fieldset>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstName1" class="required">@lang('tms::training.fathers_name') : </label>
                        <input type="text" class="form-control" id="firstName1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastName1" class="required">@lang('tms::training.mothers_name') : </label>
                        <input type="text" class="form-control" id="lastName1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress1" class="required">@lang('tms::training.birth_place') :</label>
                        <input type="email" class="form-control" id="emailAddress1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="location1" class="required">@lang('tms::training.marital_status') :</label>
                            <select class="custom-select form-control" id="location1" name="location">
                                <option value="">@lang('tms::training.select')</option>
                                <option value="Amsterdam">Married</option>
                                <option value="Berlin">Unmarried</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="shortDescription1" class="required">@lang('tms::training.present_address') :</label>
                        <textarea name="shortDescription" id="shortDescription1" rows="4" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>

