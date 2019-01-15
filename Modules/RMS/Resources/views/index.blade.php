@extends('rms::layouts.master')
@section('title', trans('labels.RMS'))

@section('content')
    <h1>Research Management System</h1>

    <p>
        This view is loaded from module: {!! config('rms.name') !!}
    </p>
@stop
