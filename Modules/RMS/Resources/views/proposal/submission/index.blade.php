@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.submitted_research_proposal'))

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('rms::research_proposal.submitted_research_proposal_list')</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination proposal-submission-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('labels.serial')</th>
                                        <th scope="col">@lang('labels.title')</th>
                                        <th scope="col">@lang('rms::research_proposal.submitted_by')</th>
                                        <th scope="col">@lang('rms::research_proposal.submission_date')</th>
                                        <th scope="col">@lang('rms::research_proposal.type')</th>
                                        <th scope="col">@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proposals as $proposal)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $proposal->title }}</td>
                                        <td>{{ $proposal->submittedBy->name }}</td>
                                        <td>{{ date('d/m/y', strtotime($proposal->created_at)) }}</td>
                                        <td>@lang('rms::research_proposal.' . $proposal->type)</td>
                                        <td>
                                            <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                    <i class="la la-cog"></i>
                                                </button>
                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                    <a href="{{ route('research-proposal-submission.show', 1) }}"
                                                   class="dropdown-item"><i class="ft-eye"></i>@lang('labels.details')</a>
                                                    @if($proposal->type == 'draft')
                                                    <a href="{{ route('research-proposal-submission.edit', $proposal->id) }}"
                                                       class="dropdown-item"><i class="ft-edit-2"></i>@lang('labels.edit')</a>
                                                    @endif
                                                    <a href=""
                                                       class="dropdown-item"><i class="ft-file-plus"></i>@lang('rms::research_proposal.download_attachments')</a>
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
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-js')
    <script>
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                let filterValue = $('#filter-select').val() || '{!! trans('rms::research_proposal.publish') !!}';
                if (data[4] == filterValue) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function () {
            let table = $('.proposal-submission-table').DataTable();

            $("div.dataTables_length").append(`
                <label style="margin-left: 20px">
                    {{ trans('labels.filtered') }}
                <select id="filter-select" class="form-control form-control-sm" style="width: 100px">
                    <option value="{{ trans('rms::research_proposal.publish') }}">{{ trans('rms::research_proposal.publish') }}</option>
                    <option value="{{ trans('rms::research_proposal.draft') }}">{{ trans('rms::research_proposal.draft') }}</option>
                        </select>
                    {{ trans('labels.records') }}
                </label>
            `);

            $('#filter-select').on('change', function () {
                table.draw();
            });
        });
    </script>
@endpush

