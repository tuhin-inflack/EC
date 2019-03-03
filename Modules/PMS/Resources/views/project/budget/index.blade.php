@extends('pms::layouts.master')
@section('title', trans('pms::project_budget.title'))

@section('content')
    <div class="container">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12">
                <div class="btn-group float-md-left" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group" role="group">
                        <a class="btn btn-outline-info round" href="{{  route('project.show', $project->id) }}">
                            <i class="ft-eye"></i> @lang('pms::project.title') @lang('labels.details')
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group" role="group">
                        <a href="{{route('project-budget.create', $project->id)}}" class="btn btn-primary btn-sm">
                            <i class="ft-plus white"></i> @lang('labels.create') @lang('pms::project_budget.budgeting')
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row justify-content-center">
            @include('pms::project.budget.partials.annexure-4')
            @include('pms::project.budget.partials.annexure-5')
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