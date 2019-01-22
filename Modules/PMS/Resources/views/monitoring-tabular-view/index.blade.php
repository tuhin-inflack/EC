@extends('pms::layouts.master')
@section('title', trans('pms::project.project_monitoring_tabular_view'))

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('pms::project.project_monitoring_tabular_view')</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col" rowspan="2" class="text-center">@lang('pms::attribute.attribute')</th>
                                        @foreach($attributeValueSumsByMonth as $date => $value)
                                            <th colspan="3" class="text-center">@lang('month.' . explode(' ', $date)[0]) ({{ explode(' ', $date)[1] }})</th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach($attributeValueSumsByMonth as $month => $value)
                                            <th>@lang('pms::attribute.planned_value')</th>
                                            <th>@lang('pms::attribute.achieved_value')</th>
                                            <th>%</th>
                                        @endforeach
                                    </tr>
                                    <tbody>
                                    @foreach($projectProposal->organizations as $organization)
                                        @foreach($organization->attributes as $attribute)
                                            <tr>
                                                <td>{{ $attribute->name }}</td>
                                                @foreach($attributeValueSumsByMonth as $value)
                                                    <td>
                                                        @if(isset($value[$attribute->id]))
                                                            {{ $value[$attribute->id]['total_planned_values'] }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(isset($value[$attribute->id]))
                                                            {{ $value[$attribute->id]['total_achieved_values'] }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(isset($value[$attribute->id]))
                                                            {{ ($value[$attribute->id]['total_achieved_values'] / $value[$attribute->id]['total_planned_values']) * 100 }}
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
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

