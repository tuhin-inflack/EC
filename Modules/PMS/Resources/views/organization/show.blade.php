@extends('pms::layouts.master')
@section('title', trans('pms::project_proposal.menu_title'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('organization.organization')</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <dl class="row">
                            <dt class="col-sm-3">@lang('pms::project.title')</dt>
                            <dd class="col-sm-9"><a href="{{ route('project.show', $project->id) }}">{{ $project->title }}</a></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3">@lang('pms::project_proposal.organization_name')</dt>
                            <dd class="col-sm-9">{{ $organization->name }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3">@lang('labels.email_address')</dt>
                            <dd class="col-sm-9">{{ $organization->email }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3">@lang('labels.mobile')</dt>
                            <dd class="col-sm-9">{{ $organization->mobile }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3">@lang('labels.address')</dt>
                            <dd class="col-sm-9">{{ $organization->address }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3">@lang('division.division')</dt>
                            <dd class="col-sm-9">{{ $organization->division->name }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3">@lang('district.district')</dt>
                            <dd class="col-sm-9">{{ $organization->district->name }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3">@lang('thana.thana')</dt>
                            <dd class="col-sm-9">{{ $organization->thana->name }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3">@lang('union.union')</dt>
                            <dd class="col-sm-9">{{ $organization->union->name }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('pms::organization-member.partials.table')
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
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/forms/checkboxes-radios.css') }}">
@endpush

@push('page-js')
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/checkbox-radio.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <script>
        {{--async function getAttributeValueDetailsByMonthYear(attributeId) {--}}
        {{--let attributeGraphUrl = `/attributes/${attributeId}/graphs`;--}}
        {{--return await $.get(attributeGraphUrl);--}}
        {{--}--}}

        {{--function generateChart(uniqueMonthYear, attributeValue, chartType) {--}}
        {{--function doesChartExist() {--}}
        {{--return chartObject !== undefined;--}}
        {{--}--}}

        {{--function destroyChart() {--}}
        {{--if (doesChartExist()) {--}}
        {{--chartObject.destroy();--}}
        {{--}--}}
        {{--}--}}

        {{--let chartContext = $('#chart');--}}
        {{--let chartPersistentKey = "chart";--}}
        {{--let chartObject = chartContext.data(chartPersistentKey);--}}
        {{--let chartOptions = {--}}
        {{--responsive: true,--}}
        {{--maintainAspectRatio: false,--}}
        {{--legend: {--}}
        {{--position: 'bottom',--}}
        {{--},--}}
        {{--hover: {--}}
        {{--mode: 'label'--}}
        {{--},--}}
        {{--scales: {--}}
        {{--xAxes: [{--}}
        {{--display: true,--}}
        {{--gridLines: {--}}
        {{--color: "#f3f3f3",--}}
        {{--drawTicks: false,--}}
        {{--},--}}
        {{--scaleLabel: {--}}
        {{--display: true,--}}
        {{--labelString: '{!! trans('month.month') !!}'--}}
        {{--},--}}
        {{--ticks: {--}}
        {{--beginAtZero: true--}}
        {{--}--}}
        {{--}],--}}
        {{--yAxes: [{--}}
        {{--display: true,--}}
        {{--gridLines: {--}}
        {{--color: "#f3f3f3",--}}
        {{--drawTicks: false,--}}
        {{--},--}}
        {{--scaleLabel: {--}}
        {{--display: true,--}}
        {{--labelString: '{!! trans('attribute.value') !!}'--}}
        {{--},--}}
        {{--ticks: {--}}
        {{--beginAtZero: true--}}
        {{--}--}}
        {{--}]--}}
        {{--},--}}
        {{--title: {--}}
        {{--display: true,--}}
        {{--text: '{!! trans('attribute.attribute_values_line_chart') !!}'--}}
        {{--}--}}
        {{--};--}}
        {{--let chartData = {--}}
        {{--labels: uniqueMonthYear,--}}
        {{--datasets: [{--}}
        {{--label: `${attributeValue.name} - {!! trans('attribute.planned') !!}`,--}}
        {{--data: attributeValue.monthly_planned_values,--}}
        {{--fill: false,--}}
        {{--borderDash: [5, 5],--}}
        {{--backgroundColor: 'rgba(255, 99, 132, 0.2)',--}}
        {{--borderColor: 'rgba(255,99,132,1)',--}}
        {{--borderWidth: 1--}}
        {{--}, {--}}
        {{--label: `${attributeValue.name} - {!! trans('attribute.achieved') !!}`,--}}
        {{--data: attributeValue.monthly_achieved_values,--}}
        {{--lineTension: 0,--}}
        {{--fill: false,--}}
        {{--backgroundColor: 'rgba(54, 162, 235, 0.2)',--}}
        {{--borderColor: 'rgba(54, 162, 235, 1)',--}}
        {{--borderWidth: 1--}}
        {{--}]--}}
        {{--};--}}
        {{--let chartConfig = {--}}
        {{--type: chartType,--}}
        {{--options: chartOptions,--}}
        {{--data: chartData--}}
        {{--};--}}

        {{--if (chartType == 'polarArea') {--}}
        {{--delete chartOptions['scales'];--}}
        {{--}--}}

        {{--destroyChart();--}}
        {{--chartContext.data(chartPersistentKey, new Chart(chartContext, chartConfig));--}}
        {{--}--}}

        {{--$(document).ready(function () {--}}
        {{--$('.attribute-table, .member-table').DataTable({--}}
        {{--pageLength: 5--}}
        {{--});--}}

        {{--let attributeId = $('select[name=attribute_id]').val();--}}
        {{--let self = this;--}}
        {{--let uniqueMonthYear = [];--}}
        {{--let attributeValue = {};--}}

        {{--getAttributeValueDetailsByMonthYear(attributeId)--}}
        {{--.then(({uniqueMonthYear, attributeValue}) => {--}}
        {{--self.uniqueMonthYear = uniqueMonthYear;--}}
        {{--self.attributeValue = attributeValue;--}}
        {{--let chartType = $('input[type=radio][name=chart_type]:checked').val();--}}
        {{--generateChart(uniqueMonthYear, attributeValue, chartType);--}}
        {{--})--}}
        {{--.catch(error => {--}}
        {{--// TODO: show lang error message--}}
        {{--console.log(error)--}}
        {{--});--}}

        {{--$('select[name=attribute_id]').on('change', function () {--}}
        {{--let attributeId = $(this).val();--}}
        {{--getAttributeValueDetailsByMonthYear(attributeId)--}}
        {{--.then(({uniqueMonthYear, attributeValue}) => {--}}
        {{--self.uniqueMonthYear = uniqueMonthYear;--}}
        {{--self.attributeValue = attributeValue;--}}
        {{--let chartType = $('input[type=radio][name=chart_type]:checked').val();--}}
        {{--generateChart(uniqueMonthYear, attributeValue, chartType);--}}
        {{--})--}}
        {{--.catch(error => {--}}
        {{--// TODO: show lang error message--}}
        {{--console.log(error)--}}
        {{--});--}}
        {{--});--}}

        {{--$('input[type=radio][name=chart_type]').on('ifChecked', function (event) {--}}
        {{--let chartType = $(this).val();--}}
        {{--generateChart(self.uniqueMonthYear, self.attributeValue, chartType);--}}
        {{--});--}}
        {{--});--}}
    </script>
@endpush