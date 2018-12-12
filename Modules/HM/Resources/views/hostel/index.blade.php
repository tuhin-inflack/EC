@extends('hm::layouts.master')
@section('title', __('hm::hostel.title'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('hm::hostel.title') @lang('labels.list')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{ route('hostels.create') }}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> @lang('labels.new') @lang('hm::hostel.title')</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered alt-pagination">
                                <thead>
                                <tr>
                                    <th scope="col">@lang('labels.serial')</th>
                                    <th scope="col">@lang('labels.name')</th>
                                    <th scope="col">@lang('hm::hostel.total_floor')</th>
                                    <th scope="col">@lang('hm::hostel.total_rooms')</th>
                                    <th scope="col">@lang('labels.action')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hostels as $hostel)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $hostel->name }}</td>
                                        <td>{{ $hostel->total_floor }}</td>
                                        <td>{{ count($hostel->rooms) }}</td>
                                        <td>
                                            <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false" class="btn btn-info dropdown-toggle"><i
                                                            class="la la-cog"></i></button>
                                                <span aria-labelledby="btnSearchDrop2"
                                                      class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{ route('hostels.show', $hostel->id) }}"
                                                   class="dropdown-item"><i class="ft-eye"></i> Details</a>

                                                    <a class="dropdown-item" href="{{ route('rooms.create', $hostel->id) }}" class="dropdown-item"><i
                                                            class="ft-plus"></i> Add Rooms</a>
                                                {{--<a href="{{ route('hostels.edit', $hostel->id) }}"--}}
                                                   {{--class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>--}}
                                                <div class="dropdown-divider"></div>
                                                    {!! Form::open([
                                                        'method'=>'DELETE',
                                                        'url' => route('hostels.destroy', $hostel->id),
                                                        'style' => 'display:inline'
                                                    ]) !!}
                                                    {!! Form::button('<i class="ft-trash"></i> Delete ', array(
                                                        'type' => 'submit',
                                                        'class' => 'dropdown-item',
                                                        'title' => 'Delete the hostel',
                                                        'onclick'=>'return confirm("Confirm delete?")',
                                                    )) !!}
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
@endsection
