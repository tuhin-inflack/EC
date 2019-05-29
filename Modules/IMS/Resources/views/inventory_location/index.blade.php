@extends('ims::layouts.master')
@section('title', trans('ims::location.location_list'))

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('ims::location.location_list')}}</h4>

                        <div class="heading-elements">
                            <a href="{{ route('inventory-locations.create') }}" class="btn btn-primary btn-sm">
                                <i class="ft-plus white"></i> {{trans('ims::location.create_new_location')}}
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
                                        <th scope="col">@lang('ims::location.department')</th>
                                        <th scope="col">@lang('ims::location.type')</th>
                                        <th scope="col">@lang('ims::location.description')</th>
                                        <th scope="col">@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($inventoryLocations as $inventoryLocation)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                <a href="{{ route('inventory-locations.show', $inventoryLocation->id) }}">{{ $inventoryLocation->name }}</a>
                                            </td>
                                            <td>{{ $inventoryLocation->departments->name }}</td>
                                            <td>
                                                @if($inventoryLocation->type == 'store')
                                                    <p>@lang('ims::location.store')</p>
                                                @else
                                                    <p>@lang('ims::location.general')</p>
                                                @endif
                                            </td>
                                            <td>{{ $inventoryLocation->description }}</td>
                                            <td>
                                                <span class="dropdown">
                                                    <button id="imsProductList" type="button" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"
                                                            class="btn btn-info dropdown-toggle">
                                                        <i class="la la-cog"></i>
                                                    </button>
                                                    <span aria-labelledby="imsProductList"
                                                          class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{ route('inventory-locations.show', $inventoryLocation->id) }}"
                                                           class="dropdown-item"><i
                                                                    class="ft-eye"></i> @lang('labels.details')</a>
                                                        <a href="{{ route('inventory-locations.edit', $inventoryLocation->id) }}"
                                                           class="dropdown-item"><i
                                                                    class="ft-edit-2"></i> @lang('labels.edit')</a>
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
