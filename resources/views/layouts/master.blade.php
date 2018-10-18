@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('app-content')
    @yield('content')
@endsection