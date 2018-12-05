@extends('hm::layouts.master')
@section('title', 'Hostel')

@section('content')
    <h1>Hello World</h1>
    <p>
        This view is loaded from module: {!! config('hm.name') !!}
    </p>
@stop
