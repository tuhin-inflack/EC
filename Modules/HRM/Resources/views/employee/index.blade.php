@extends('hrm::layouts.master')
@section('employee_list', 'active')
@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('hrm.name') !!}
    </p>
@stop
