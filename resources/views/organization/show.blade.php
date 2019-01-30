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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Members</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a href="{{ route($module . '-organization-members.create', $organization->id) }}"
                                       class="btn btn-sm btn-primary"><i class="ft-plus"></i> Add Member</a></li>
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <th>@lang('labels.serial')</th>
                                <th>Member</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($organization->members as $member)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td class="text-center"><a href="{{ route('rms-organization-members.edit', [$organization->id, $member->id]) }}" class="btn btn-sm btn-info"><i class="ft ft-edit"></i></a></td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Attributes</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a href="#" class="btn btn-sm btn-primary"><i class="ft-plus"></i> Add Attribute</a>
                                </li>
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <th>@lang('labels.serial')</th>
                                <th>Attribute</th>
                                <th>Unit</th>
                                </thead>
                                <tbody>
                                @foreach($organization->attributes as $attribute)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $attribute->name }}</td>
                                        <td>{{ $attribute->unit }}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection