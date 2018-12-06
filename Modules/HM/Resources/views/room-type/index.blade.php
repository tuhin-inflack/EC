@extends('hm::layouts.master')
@section('title', 'Room type list')

@section('content')
    <section id="user-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User List</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url(route('room-types.create'))}}" class="btn btn-primary btn-sm"><i
                                    class="ft-plus white"></i> New Room Type</a>
                            <a href="{{url('room-types.index')}}" class="btn btn-warning btn-sm"> <i
                                    class="ft-download white"></i></a>

                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered alt-pagination">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Capacity</th>
                                    <th>General Rate</th>
                                    <th>Govt. Rate</th>
                                    <th>BARD Employee Rate</th>
                                    <th>Special Rate</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roomTypes as $type)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$type->name}}</td>
                                        <td>{{$type->capacity}}</td>
                                        <td>{{$type->general_rate}}</td>
                                        <td>{{$type->govt_rate}}</td>
                                        <td>{{$type->bard_emp_rate}}</td>
                                        <td>{{$type->special_rate}}</td>
                                        <td>
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{URL::to( '/hm/room-types/'.$type->id.'/edit')}}" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                                <div class="dropdown-divider"></div>
                                                  {!! Form::open([
                                                  'method'=>'DELETE',
                                                  'url' => [ '/hm/room-types', $type->id],
                                                  'style' => 'display:inline'
                                                  ]) !!}
                                                  {!! Form::button('<i class="ft-trash"></i> Delete ', array(
                                                  'type' => 'submit',
                                                  'class' => 'dropdown-item',
                                                  'title' => 'Delete the room type',
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
    </section>
@endsection
