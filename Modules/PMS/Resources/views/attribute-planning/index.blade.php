@extends('pms::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-header">
                    <h4 class="card-title"><a href="{{ route('project.show', $project->id) }}">{{ $project->title }}</a> - {{ $attribute->name }} - Planning list</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a href="#" class="btn btn-sm btn-primary"><i class="ft ft-plus"></i> Enter Planning</a>
                            </li>
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped alt-pagination">
                            <thead>
                            <tr>
                                <th>@lang('labels.serial')</th>
                                <th>Month Year</th>
                                <th>Total Planned Value</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($monthlyAttributePlannings as $monthlyAttributePlanning)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $monthlyAttributePlanning->monthYear }}</td>
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