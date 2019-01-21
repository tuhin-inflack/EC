@extends('pms::layouts.master')
@section('title', 'Monitoring Tabular View')

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Project Monitoring Tabular View</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col" rowspan="2" class="text-center">Attributes</th>
                                        @foreach($groupedAttributeValuesByMonth as $month => $value)
                                            <th colspan="3" class="text-center">{{ $month }}</th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach($groupedAttributeValuesByMonth as $month => $value)
                                            <th>Planned</th>
                                            <th>Achieved</th>
                                            <th>%</th>
                                        @endforeach
                                    </tr>
                                    <tbody>
                                    @foreach($projectProposal->organizations as $organization)
                                        @foreach($organization->attributes as $attribute)
                                            <tr>
                                                <td>{{ $attribute->name }}</td>
                                                @foreach($groupedAttributeValuesByMonth as $month => $value)
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

