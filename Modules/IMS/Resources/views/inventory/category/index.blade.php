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
                                        {{--<th scope="col">@lang('ims::inventory.short_code')</th>--}}
                                        <th scope="col">@lang('ims::inventory.type')</th>
                                        <th scope="col">@lang('ims::inventory.unit')</th>
                                        <th scope="col">@lang('labels.status')</th>
                                        <th scope="col">@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                <a href="{{ route('inventory-item-category.show', $category->id) }}">{{ $category->name }}</a>
                                            </td>
                                            <td>
                                                @if($category->type == 'fixed asset')
                                                    <p>@lang('ims::inventory.fixed_asset')</p>
                                                @else
                                                    <p>@lang('ims::inventory.stationery')</p>
                                                @endif
                                            </td>
                                            <td>{{ $category->unit }}</td>
                                            <td>
                                                @if($category->is_active == 0)
                                                    <p>@lang('labels.inactive')</p>
                                                @else
                                                    <p>@lang('labels.active')</p>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="dropdown">
                                                    <button id="imsProductList" type="button" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"
                                                            class="btn btn-info dropdown-toggle">
                                                        <i class="la la-cog"></i>
                                                    </button>
                                                    <span aria-labelledby="imsProductList"
                                                          class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{ route('inventory-item-category.show', $category->id) }}" class="dropdown-item"><i class="ft-eye"></i> @lang('labels.details')</a>
                                                        <a href="{{ route('inventory-item-category.edit', $category->id) }}" class="dropdown-item"><i class="ft-edit-2"></i> @lang('labels.edit')</a>
                                                        <div class="dropdown-divider"></div>

                                                        {!!

                                                            Form::open([
                                                              'method'=>'DELETE',
                                                              'url' => [''],
                                                              'style' => 'display:inline'
                                                                ])
                                                         !!}

                                                        {!!
                                                           Form::button('<i class="ft-trash"></i> '.trans('labels.delete'), array(
                                                           'type' => 'submit',
                                                           'class' => 'dropdown-item',
                                                           'title' => 'Delete the user',
                                                           'onclick'=>'return confirm("Confirm delete?")',
                                                                   ))
                                                                   !!}
                                                        {!! Form::close() !!}
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
