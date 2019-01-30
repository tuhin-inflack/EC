<div class="card">
    <div class="card-header">
        <h4 class="card-title">@lang('organization.organization_list')</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="{{ $url }}"
                       class="btn btn-sm btn-primary"><i
                                class="ft ft-plus"></i> @lang('organization.add_organization')</a></li>
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered organization-table">
                    <thead>
                    <tr>
                        <th>@lang('labels.serial')</th>
                        <th>@lang('organization.organization')</th>
                        <th>@lang('member.member')</th>
                        <th>@lang('organization.attribute')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($organizable->organizations as $organization)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ $organizationShowRoute($organizable->id, $organization->id) }}">{{ $organization->name }}</a></td>
                            <td>{{ $organization->members->count() }}</td>
                            <td>{{ $organization->attributes->count() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>