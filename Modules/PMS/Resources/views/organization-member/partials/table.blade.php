<div class="card">
    <div class="card-header">
        <h4 class="card-title">@lang('member.member_list')</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="{{ route('pms-organization-members.create', [$project->id, $organization->id]) }}"
                       class="btn btn-sm btn-primary"><i
                                class="ft-plus"></i> @lang('member.add_member')</a></li>
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="member-table table table-striped table-bordered alt-pagination">
                <thead>
                <th>@lang('labels.serial')</th>
                <th>@lang('labels.name')</th>
                <th>@lang('labels.gender')</th>
                <th>@lang('labels.mobile')</th>
                <th>@lang('labels.address')</th>
                <th>@lang('labels.nid_number')</th>
                <th>@lang('pms::member.member_age')</th>
                <th>@lang('labels.action')</th>
                </thead>
                <tbody>
                @foreach($organization->members as $member)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $member->name }}</td>
                        <td>@lang('labels.' . $member->gender)</td>
                        <td>{{ $member->mobile }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->nid }}</td>
                        <td>{{ $member->age }}</td>
                        <td class="text-center">
                            <span class="dropdown">
                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false" class="btn btn-info btn-sm dropdown-toggle"><i
                                            class="la la-cog"></i></button>
                                <span aria-labelledby="btnSearchDrop2"
                                      class="dropdown-menu mt-1 dropdown-menu-right">
                                    <a href="{{ route('organization-members.show', [$project->id, $organization->id, $member->id]) }}"
                                       class="dropdown-item"><i
                                                class="ft-eye"></i> {{trans('labels.details')}}</a>
                                    <a href="{{ route('pms-organization-members.edit', [$project->id, $organization->id, $member->id]) }}"
                                       class="dropdown-item"><i
                                                class="ft-edit-2"></i> {{trans('labels.edit')}}</a>
                                </span>
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>