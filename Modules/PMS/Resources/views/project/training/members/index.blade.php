@extends('pms::layouts.master')
@section('title', trans('pms::project.project_training'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('member.member_list')</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><button class="btn btn-primary btn-sm submit-btn"><i class="ft-plus white"></i> @lang('pms::project.add')</button></li>
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <table class="member-table table table-striped table-bordered responsive">
                            <thead>
                            <tr>
                                <th>@lang('labels.serial')</th>
                                <th>test</th>
                                <th>@lang('labels.name')</th>
                                <th>@lang('labels.gender')</th>
                                <th>@lang('labels.mobile')</th>
                                <th>@lang('labels.address')</th>
                                <th>@lang('labels.nid_number')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $member['id'] }}</td>
                                    <td><a href="">{{ $member['name'] }}</a></td>
                                    <td>{{ $member['gender'] }}</td>
                                    <td>{{ $member['mobile'] }}</td>
                                    <td>{{ $member['address'] }}</td>
                                    <td>{{ $member['nid'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <form action="{{ route('projectTraining-members.store', [$project->id, $training->id]) }}" method="post" style="display: none" id="form">
                            @csrf
                            <input type="text" name="members">
                            <input type="text" name="project_id" value="{{ $project->id }}">
                            <input type="text" name="training_id" value="{{ $training->id }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('theme/vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>
    <script src="{{ asset('theme/js/scripts/tables/datatables-extensions/datatable-select.js')}}"></script>
    <script>
        function getMemberId($memberTable, indexes) {
            let selectedRowData = $memberTable.rows(indexes).data().eq(0);
            let memberId = selectedRowData[1];
            return memberId;
        }

        function removeMember(selectedMembers, memberId) {
            selectedMembers.splice(selectedMembers.indexOf(memberId), 1);
        }

        $(document).ready(function () {
            let $memberTable = $('.member-table').DataTable({
                select: {
                    style: 'multi'
                },
                columnDefs: [
                    {
                        targets: [1],
                        visible: false,
                        searchable: false
                    }
                ]
            });

            let selectedMembers = [];

            $memberTable.on('select', function (e, dt, type, indexes) {
                if (type === 'row') {
                    let memberId = getMemberId($memberTable, indexes);

                    selectedMembers.push(memberId);
                }
            });

            $memberTable.on('deselect', function (e, dt, type, indexes) {
                if (type === 'row') {
                    let memberId = getMemberId($memberTable, indexes);

                    removeMember(selectedMembers, memberId);
                }
            });

            $('.submit-btn').on('click', function () {
                console.log(selectedMembers);
                $('input[name="members"]').val(selectedMembers);
                console.log($('input[name="members"]').val());
                $('#form').submit();
            });
        });
    </script>
@endpush
