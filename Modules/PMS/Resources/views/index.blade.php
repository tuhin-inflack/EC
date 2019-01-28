@extends('pms::layouts.master')
@section('title', trans('labels.PMS'))

@section('content')
    <h1>Project Management System</h1>

    <p>
        This view is loaded from module: {!! config('pms.name') !!}
    </p>
@stop
