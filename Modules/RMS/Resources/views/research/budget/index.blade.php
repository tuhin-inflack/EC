@extends('rms::layouts.master')
@section('title', trans('rms::research_budget.title'))

@section('content')
    <div class="container">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12">
                <div class="btn-group float-md-left" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group" role="group">
                        <a class="btn btn-outline-info round" href="{{  route('research.show', $research->id) }}">
                            <i class="ft-eye"></i> @lang('rms::research.title') @lang('labels.details')
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group" role="group">
                        <a href="{{route('research-budget.create', $research->id)}}" class="btn btn-primary btn-sm">
                            <i class="ft-plus white"></i> @lang('labels.create') @lang('rms::research_budget.budgeting')
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row justify-content-center">
            @include('rms::research.budget.partials.annexure-4')
            @include('rms::research.budget.partials.annexure-5')
        </div>
    </div>
@endsection

@push('page-js')
@endpush

@push('page-css')
    <style type="text/css">

        .table thead {
            text-align: center;
        }
        .table thead th{
            vertical-align: inherit;
        }
        .table th, .table td {
            padding: 0.15rem 0.15rem;
        }

    </style>
@endpush