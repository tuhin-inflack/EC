@extends('pms::layouts.master')
@section('title', 'Monitoring Tabular View')

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Project Monitoring Tabular View</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                {{ $projectProposal }}
                                {{--<table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{trans('labels.serial')}}</th>
                                        <th scope="col">@lang('pms::attribute.organization')</th>
                                        <th scope="col">@lang('labels.name')</th>
                                        <th scope="col">@lang('pms::attribute.unit')</th>
                                        <th scope="col">@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($attributes as $attribute)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $attribute->organization->name }}</td>
                                            <td>{{ $attribute->name }}</td>
                                            <td>{{ $attribute->unit }}</td>
                                            <td>
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info btn-sm dropdown-toggle"><i
                                                        class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2"
                                                    class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{ route('attribute-values.create', $attribute->id) }}"
                                                   class="dropdown-item"><i
                                                            class="la la-keyboard-o"></i>@lang('pms::attribute.enter_value')</a>
                                                <a href="{{ route('attributes.edit', $attribute->id) }}"
                                                   class="dropdown-item"><i
                                                            class="ft-edit-2"></i> {{trans('labels.edit')}}</a>
                                                <div class="dropdown-divider"></div>
                                                  {!! Form::open([
                                                  'method'=>'DELETE',
                                                  'route' => [ 'attributes.destroy', $attribute->id],
                                                  'style' => 'display:inline'
                                                  ]) !!}
                                                  {!! Form::button('<i class="ft-trash"></i> '.trans('labels.delete'), array(
                                                  'type' => 'submit',
                                                  'class' => 'dropdown-item',
                                                  'title' => 'Delete the role',
                                                  'onclick'=>'return confirm(" ' . trans('labels.confirm_delete') . ' ")',
                                                  )) !!}
                                                  {!! Form::close() !!}
                                              </span>
                                            </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

