@extends('ims::layouts.master')
@section('title', 'Note')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('ims::auction.add_menu_title')</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements" style="top: 5px;">
                        <ul class="list-inline mb-1">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                    <div class="heading-elements mt-2" style="margin-right: 10px;">
                        <a href="{{ route('auctions.index') }}" class="btn btn-primary btn-sm">
                            <i class="ft-list white">@lang('ims::auction.list_menu_title')</i>
                        </a>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form action="{{ route('auctions.store') }}" method="POST">
                            @csrf
                            <h4 class="form-section"><i class="la la-puzzle-piece"></i> @lang('ims::auction.title')</h4>
                            <div class="row">
                                <!-- Auction Title -->
                                <div class="col">
                                    <label for="auction_title"> @lang('ims::auction.name')</label>
                                    <input id="auction_title" name="auction_title" type="text" class="form-control"
                                        placeholder="@lang('ims::auction.name')" required>
                                </div>
                                <!-- Auction Date -->

                                <div class="col">
                                    <label class="required">@lang('ims::auction.date')</label>
                                    {{ Form::text('auction_date', date('d/m/Y'), ['class' => 'form-control']) }}
                                </div>

                            </div>



                            <h4 class="form-section"><i class="la la-puzzle-piece"></i> @lang('ims::auction.scrap_add')
                            </h4>
                            @php
                            $scrapCategory=['Chair - 100 Available',"Table - 200 Available"]
                            @endphp
                            <!-- Scrap Products -->
                            <div class="repeater-default">
                                <div data-repeater-list="scrap_product">
                                    <div data-repeater-item>
                                        <div class="form row">
                                            <!--Scrap Category -->
                                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                                <label class="required">{{ trans('ims::auction.category') }}</label>
                                                <br>
                                                {!! Form::select('category_id', $scrapCategory, null, [
                                                'class' => 'form-control category-type-select required',
                                                'placeholder' => 'Select Category',
                                                'onChange' => '',
                                                'data-msg-required' => Lang::get('labels.This field is required')
                                                ]) !!}
                                                <span class="select-error"></span>
                                            </div>
                                            <!-- Scrap Quantity -->
                                            <div class="form-group mb-1 col-sm-12 col-md-2">
                                                <label class="required"
                                                    for="quantity">{{ trans('ims::auction.quantity') }}</label>
                                                <br>

                                                {!! Form::number('quantity', null, [
                                                'class' => 'form-control required', 'placeholder' => 'e.g. 2',
                                                'data-msg-required' => trans('labels.This field is required'),
                                                'min' => 1,
                                                'data-msg-min'=> trans('labels.At least 1 characters'),
                                                'max' => 100,
                                                'data-msg-max'=> trans('labels.At most 100 characters'),
                                                ]) !!}
                                            </div>

                                            <div class="form-group col-sm-12 col-md-1 text-center mt-2">
                                                <button type="button" class="btn btn-outline-danger"
                                                    data-repeater-delete="">
                                                    <i class="ft-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>

                                <div class="form-group overflow-auto">
                                    <div class="col-12">
                                        <button type="button" data-repeater-create id="add_scrap_product"
                                            class="pull-right btn btn-sm btn-outline-primary">
                                            <i class="ft-plus"></i> @lang('labels.add')
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Labels -->
                            <div class="form-actions mb-lg-3">
                                <a class="btn btn-warning pull-right" role="button" href="{{ route('auctions.index') }}"
                                    style="margin-left: 2px;">
                                    <i class="ft-x"></i> {{trans('labels.cancel')}}
                                </a>
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="la la-check-square-o"></i> {{trans('labels.save')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('page-css')
<link rel="stylesheet" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
<link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/checkboxes-radios.css') }}">
<link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/wizard.css') }}">

<link rel="stylesheet" href="{{  asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
<link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css')  }}">
<link rel="stylesheet" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css')  }}">
@endpush

@push('page-js')
<script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('theme/js/scripts/pickers/dateTime/pick-a-datetime.js') }}"></script>

<script src="{{ asset('theme/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
<script src="{{ asset('theme/vendors/js/extensions/jquery.steps.min.js') }}"></script>
<script src="{{ asset('theme/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('theme/js/scripts/forms/wizard-steps.js') }}"></script>
{{-- @include('hm::booking-request.partials.javascript') --}}
<script src="{{ asset('js/booking-request/step.js') }}"></script>
<script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('theme/js/scripts/forms/checkbox-radio.js') }}"></script>

<script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/booking-request/page.js') }}"></script>

<script type="text/javascript">
        //global array contains all id's
        let allValues=[0,1];
        // datepicker
        $('input[name=auction_date]').pickadate({
                min: new Date(),
                format: 'dd/mm/yyyy'
        });

        $('#auction_date').pickadate();

        $('#add_scrap_product').click(function(){
                
                var scrapProducts = {0:"Chair - 100 Available", 1:"Table - 200 Available"}; 
                let allSelectedValues=[];   
                let difference=[];   
                // print("There are " +$('. category-type-select').not(':last').length +"Available");
                $('.category-type-select').not(':last').each(function(){
                    //this returns only the selected value 
                    let selectedValue=$(this).val();
                    if(selectedValue)
                        allSelectedValues.push(parseInt(selectedValue));
                });
                //get the difference between the two array
                difference = allValues.filter(x => !allSelectedValues.includes(x));
                lastSelectElement=$('.category-type-select').last();
                lastSelectElement.empty()
                difference.forEach(element => {
                    lastSelectElement.append('<option value="'+element+'">'+scrapProducts[element]+'</option>')
                });
        });


        function print(value)
        {
            console.log(value);
        }

    
</script>

@endpush