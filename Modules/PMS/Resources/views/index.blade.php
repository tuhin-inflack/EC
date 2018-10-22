@extends('pms::layouts.master')

@section('content')
    <h1>This is the landing page of PMS</h1>

    <p>
        This view is loaded from module: {!! config('pms.name') !!}
    </p>
@stop
