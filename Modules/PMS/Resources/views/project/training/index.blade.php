@extends('pms::layouts.master')
@section('title', trans('pms::project.project_training'))

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('pms::project.project_training_list')</h4>

                        <div class="heading-elements">
                            <a href="{{route('project-training.create', $project->id)}}" class="btn btn-primary btn-sm">
                                <i class="ft-plus white"></i> @lang('pms::project.add_training')
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
                                        <th scope="col">@lang('labels.title')</th>
                                        <th scope="col">{{trans('labels.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td><a href="">Project Training 1</a></td>
                                            <td>
                                                <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                    <i class="la la-cog"></i>
                                                </button>
                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                    <a href=""
                                                       class="dropdown-item"><i class="ft-eye"></i>@lang('labels.details')</a>
                                                    <a href=""
                                                       class="dropdown-item"><i class="ft-folder"></i>@lang('pms::project_budget.title')</a>
                                                </span>
                                            </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td><a href="">Project Training 2</a></td>
                                            <td>
                                                <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                    <i class="la la-cog"></i>
                                                </button>
                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                    <a href=""
                                                       class="dropdown-item"><i class="ft-eye"></i>@lang('labels.details')</a>
                                                    <a href=""
                                                       class="dropdown-item"><i class="ft-folder"></i>@lang('pms::project_budget.title')</a>
                                                </span>
                                            </span>
                                            </td>
                                        </tr>
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