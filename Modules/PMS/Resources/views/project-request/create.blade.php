@extends('pms::layouts.master')
@section('title', 'Add New Project Proposal Request ')

@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css')  }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css')  }}">
    {{--<style>
        .form-label:after{
            content:'*';
            color:red;
            padding-left:5px;
        }
    </style>--}}
@endpush

@section('content')
    @include('pms::project-request.form')
@endsection

@push('page-js')
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.js')  }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/pickers/dateTime/pick-a-datetime.js')  }}"></script>
@endpush
