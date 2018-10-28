@extends('hrm::layouts.master')

@section('content')
    <h1>This is the landing page of HRM</h1>

    <p>
        This view is loaded from module: {!! config('hrm.name') !!}
    </p>
@stop
