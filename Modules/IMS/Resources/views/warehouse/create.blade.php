@extends('ims::layouts.master')

@section('title', trans('ims::warehouse.create_page_title'))

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('ims.subTitle') !!}
    </p>
@stop
