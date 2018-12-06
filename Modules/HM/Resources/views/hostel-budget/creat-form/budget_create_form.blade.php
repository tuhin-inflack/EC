<div class="form-body">
    <h4 class="form-section"><i class="ft-grid"></i> Hostel Budget form </h4>
    <div class="row">

        <div class="col-md-5">
            <div class="form-group">
                <div class="form-group {{ $errors->has('hostel_budget_title_id') ? ' error' : '' }}">
                    {{ Form::label('hostel_budget_title_id', 'Title') }}
                    {{ Form::select('hostel_budget_title_id', $budgetTitles, null, ['class' => 'form-control', 'placeholder' => 'Select Budget Title', 'required' => 'required', 'data-validation-required-message'=>'Please select budget title']) }}
                    <div class="help-block"></div>
                    @if ($errors->has('hostel_budget_title_id'))
                        <div class="help-block">  {{ $errors->first('hostel_budget_title_id') }}</div>
                    @endif
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <div class="repeater-default">
                <div data-repeater-list="hostel_budgets">
                    <div data-repeater-item="" style="">
                        <div class="form row">
                            <div class="form-group mb-1 col-sm-12 col-md-5">
                                <label>Section <span class="danger">*</span></label>
                                <br>
                                <input type="text" name="section" class="form-control"
                                       placeholder="e.g Furniture" required>
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-5">
                                <label>Amount <span class="danger">*</span></label>
                                <br>
                                <input type="number" name="amount" min="1" id=""
                                       class="form-control" placeholder="e.g 10" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                <button type="button" class="btn btn-outline-danger"
                                        data-repeater-delete=""><i
                                            class="ft-x"></i>
                                </button>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="form-group overflow-auto">
                    <div class="col-12">
                        <button type="button" data-repeater-create=""
                                class="pull-right btn btn-sm btn-outline-primary">
                            <i class="ft-plus"></i> Add
                        </button>
                    </div>
                </div>

                <div class="form-actions text-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                    <a class="btn btn-warning mr-1" role="button" href="#">
                        <i class="ft-x"></i> Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
