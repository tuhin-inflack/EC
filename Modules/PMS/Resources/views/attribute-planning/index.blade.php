@extends('pms::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-header"></div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped alt-pagination">
                            <thead>
                            <tr>
                                <th>@lang('labels.serial')</th>
                                <th>Month Year</th>
                                <th>Name</th>
                                <th>Total Planned Value</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($monthlyAttributePlannings as $monthlyAttributePlanning)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($monthlyAttributePlanning->date)->format('F Y') }}</td>
                                    <td>{{ $monthlyAttributePlanning->attribute_id }}</td>
                                    <td>{{ $monthlyAttributePlanning->total_planned_value }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection