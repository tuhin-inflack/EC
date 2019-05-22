<div class="form-body">
    <h4 class="form-section"><i class="ft-grid"></i> {{ trans('hm::hostel_budget.add_form_card_title') }}</h4>
    <div class="row">

        <div class="col-md-5">
            <div class="form-group {{ $errors->hostelBudget->has('hostel_budget_title_id') ? ' error' : '' }} ">
                {{ Form::label('hostel_budget_title_id', trans('hm::hostel_budget.budget_for') ,  ['class' => 'form-label required'])}}
                {{ Form::select('hostel_budget_title_id', $budgetTitles, null, ['class' => 'form-control', 'placeholder' => 'Select Budget Year', 'required' => 'required', 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('hm::hostel_budget.budget_for')])]) }}
                <div class="help-block"></div>
                @if ($errors->hostelBudget->has('hostel_budget_title_id'))
                    <div class="help-block">  {{ $errors->hostelBudget->first('hostel_budget_title_id') }}</div>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="repeater_hostel_budget">
                <div data-repeater-list="hostel_budgets">
                    @php
                        $oldBudget = old();
                    @endphp
                    @if(isset($oldBudget['hostel_budgets']) && count($oldBudget['hostel_budgets'])>0)
                        @foreach($oldBudget['hostel_budgets'] as $key => $budget)

                            <div data-repeater-item="" style="">
                                <div class="form row">
                                    <div class="form-group  mb-1 col-sm-12 col-md-5 {{ $errors->hostelBudget->has("hostel_budgets.".$key.".hostel_budget_section_id") ? 'error' : '' }}">
               
                                        {{ Form::label('hostel_budget_title_id', trans('hm::hostel_budget.section') ,  ['class' => 'form-label required'])}}
                                        {{ Form::select('hostel_budget_section_id', $budgetSections, $budget['hostel_budget_section_id'], ['placeholder' =>'Select budget section',   'class' => ' form-control .( $errors->has("hostel_budgets.".$key.".hostel_budget_section_id") ? "is-invalid" : "")', 'required' => 'required', 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('hm::hostel_budget.section')])]) }}
                                        <div class="help-block"></div>
                                        @if ($errors->hostelBudget->has("hostel_budgets.".$key.".hostel_budget_section_id"))
                                            <div class="help-block">  {{ $errors->hostelBudget->first('hostel_budgets.*.hostel_budget_section_id') }}</div>
                                        @endif

                                    </div>
                                    <div class="form-group  mb-1 col-sm-12 col-md-5 {{ $errors->hostelBudget->has("hostel_budgets.".$key.".budget_amount") ? 'error' : '' }}">
                                    {{ Form::label('budget_amount', trans('hm::hostel_budget.amount'), ['class' => 'required']) }}
                                        {{ Form::number('budget_amount', $budget['budget_amount'], ['min' => 1, 'class' => 'form-control', 'placeholder' => '','required' => 'required', 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('hm::hostel_budget.amount')])]) }}
                                        <div class="help-block"></div>
                                        @if ($errors->hostelBudget->has("hostel_budgets.".$key.".budget_amount"))
                                            <div class="help-block">  {{ $errors->hostelBudget->first('hostel_budgets.*.budget_amount') }}</div>
                                        @endif
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
                        @endforeach
                    @else
                        <div data-repeater-item="" style="">
                            <div class="form row">
                                <div class="form-group mb-1 col-sm-12 col-md-5">
                                    {{--<br>--}}
                                    {{ Form::label('hostel_budget_section_id', trans('hm::hostel_budget.section'), ['class' => 'required']) }}
                                    {{--selectize-select--}}
                                    {{ Form::select('hostel_budget_section_id', $budgetSections, null, ['placeholder' =>'Select budget section',   'class' => 'item-select   form-control ', 'required' => 'required', 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('hm::hostel_budget.section')])]) }}
                                    <div class="help-block"></div>


                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-5">
                                    
                                    {{ Form::label('budget_amount', trans('hm::hostel_budget.amount'), ['class' => 'required']) }}
                                    {{ Form::number('budget_amount', null, ['min' => 1, 'class' => 'form-control', 'placeholder' => '','required' => 'required', 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('hm::hostel_budget.amount')])]) }}
                                    <div class="help-block"></div>

                                </div>
                                <div class="form-group col-sm-12 col-md-2 text-center mt-2" id="cd">
                                    <button type="button" class="btn btn-outline-danger"
                                            data-repeater-delete=""><i
                                                class="ft-x"></i>
                                    </button>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endif
                </div>
                <div class="form-group overflow-auto">
                    <div class="col-12">
                        <div class="text-center">
                            <b>@lang('labels.total'): <span id="total_budget_amount">0</span></b>
                        </div>
                        <button type="button" data-repeater-create=""
                                class="pull-right btn btn-sm btn-outline-primary addMoreBudgetSection">
                            <i class="ft-plus"></i> {{ trans('labels.add') }}
                        </button>
                    </div>
                </div>
                
                <div class="form-actions text-center">
                    <button type="submit" class="btn btn-primary submit">
                        <i class="la la-check-square-o"></i> {{ trans('labels.save') }}
                    </button>
                    <a class="btn btn-warning mr-1" role="button" href="{{ route('hostel-budgets.index') }}">
                        <i class="ft-x"></i> {{ trans('labels.cancel') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
