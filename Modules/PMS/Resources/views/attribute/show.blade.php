@extends('pms::layouts.master')
@section('title', trans('attribute.attribute'))

@section('content')
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('attribute.attribute')</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('pms::project.title')</dt>
                                    <dd class="col-sm-9"><a
                                                href="{{ route('project.show', $project->id) }}">{{ $project->title }}</a>
                                    </dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('labels.name')</dt>
                                    <dd class="col-sm-9">{{ $attribute->name }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">@lang('labels.unit')</dt>
                                    <dd class="col-sm-9">{{ $attribute->unit }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4 class="card-title">Attribute Details</h4></div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-resposive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Month Year</th>
                                        <th>Planned Value</th>
                                        <th>Achieved Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($achievedPlannedValuesByMonthYear as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->monthYear }}</td>
                                            <td>{{ $item->total_planned_value }}</td>
                                            <td>{{ $item->total_achieved_value }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection