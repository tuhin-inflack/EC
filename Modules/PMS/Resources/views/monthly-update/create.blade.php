<?php
/**
 * Created by PhpStorm.
 * User: bs110
 * Date: 1/20/19
 * Time: 3:53 PM
 */
?>
@extends('pms::layouts.master')
@section('title', __('monthly-update.title'))
@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css')  }}">
@endpush

@section('content')
    <section id="user-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">{{trans('monthly-update.create_card_title')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            @include('monthly-update.form', ['page'=>'create'])
                        </div>
                    <iv>
                </iv>
            </div>
        </div>
    </section>
@endsection
@push('page-js')
    <script type="text/javascript" src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/scripts/forms/checkbox-radio.min.js') }}"></script>

    <script src="{{ asset('theme/vendors/js/pickers/daterange/daterangepicker2.js') }}"></script>

    <script type="text/javascript">

        $('#month_year').daterangepicker({

        });

        $('#add').click(function () {
            $('#repeat-attachments').append('<br><input type="file" class="form-control" name="attachments[]">');
        });

        $('.select2').select2({
            placeholder: "{{__('monthly-update.select_tasks')}}",
        });

    </script>
@endpush
