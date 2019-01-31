@php
    if ($organizableType == \Illuminate\Support\Facades\Config::get('constants.research')) {
        $module = 'rms';
        $title = trans('rms::research_proposal.menu_title');
    } else {
        $module = 'pms';
        $title = trans('pms::project_proposal.menu_title');
    }
@endphp

@extends($module . '::layouts.master')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @include('organization-member.partials.table')
            </div>
            <div class="col-md-6">
                @include('attribute.partials.table')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('attribute-value.tabular-view')
            </div>
        </div>
    </div>
@endsection

@push('page-css')
    <style>
        .card-body-min-height {
            min-height: 465px;
            height: auto;
        }
    </style>
@endpush

@push('page-js')
    <script>
        $(document).ready(function () {
            $('.attribute-table, .member-table').DataTable({
                pageLength: 5
            });
        });
    </script>
@endpush