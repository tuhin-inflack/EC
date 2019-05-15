@extends('ims::layouts.master')
@section('title', trans('ims::inventory.item_category_list'))

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('ims::inventory.item_category_list')}}</h4>

                        <div class="heading-elements">
                            <a href="{{ route('inventory-item-category.create') }}" class="btn btn-primary btn-sm">
                                <i class="ft-plus white"></i> {{trans('ims::inventory.create_new_category')}}
                            </a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('labels.serial')</th>
                                        <th scope="col">@lang('labels.name')</th>
                                        <th scope="col">@lang('ims::inventory.short_code')</th>
                                        <th scope="col">@lang('ims::inventory.type')</th>
                                        <th scope="col">@lang('ims::inventory.unit')</th>
                                        <th scope="col">@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    {{--@foreach($projects as $project)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                <a href="{{ route('project.show', $project->id) }}">{{ $project->title }}</a>
                                            </td>
                                            <td>

                                                @if(isset($project->budget))
                                                    {{$project->budget}}
                                                @else
                                                    <p class="text-danger">Not Added</p>
                                                @endif

                                            </td>
                                            <td>
                                                @if(isset($project->duration))
                                                    {{$project->duration}}
                                                @else
                                                    <p class="text-danger">Not Added</p>
                                                @endif
                                            </td>
                                            <td>{{ $project->projectSubmittedByUser->name }}</td>
                                            <td>{{ date('d/m/Y, h:iA', strtotime($project->created_at)) }}</td>
                                            <td>@lang('pms::project_proposal.' . $project->status)</td>
                                            <td>
                                                <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        class="btn btn-info dropdown-toggle">
                                                    <i class="la la-cog"></i>
                                                </button>
                                                <span aria-labelledby="btnSearchDrop2"
                                                      class="dropdown-menu mt-1 dropdown-menu-right">
                                                    <a href="{{ route('project.show', $project->id) }}"
                                                       class="dropdown-item"><i class="ft-eye"></i>@lang('labels.details')</a>
                                                    <a href="{{ route('project-budget.index', $project->id) }}"
                                                       class="dropdown-item"><i class="ft-folder"></i>@lang('pms::project_budget.title')</a>
                                                </span>
                                            </span>
                                            </td>
                                        </tr>
                                    @endforeach--}}
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
