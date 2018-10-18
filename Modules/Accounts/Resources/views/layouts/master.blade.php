@extends('layouts.app')

@section('master')

    @include('accounts::layouts.partials.menu')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>

@endsection