@extends('layouts.master')

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Role List</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url('/user/role/create')}}" class="btn btn-primary btn-sm"><i
                                    class="ft-plus white"></i> New Role</a>
                            <a href="{{url('/user/role/create')}}" class="btn btn-warning btn-sm"> <i
                                    class="ft-download white"></i></a>

                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            @if(Session::get('message'))
                                <h4>
                                    {{Session::get('message')}}
                                </h4>
                            @endif
                            <table class="table table-striped table-bordered alt-pagination">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $index = 1; ?>
                                @foreach($roles as $role)
                                    <tr>
                                        <th scope="row">{{$index}}</th>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->description}}</td>
                                        <td>
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{URL::to( '/user/role/'.$role->id)}}" class="dropdown-item"><i class="ft-eye"></i> Details</a>
                                                <a href="{{URL::to( '/user/role/'.$role->id.'/edit')}}" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                                <div class="dropdown-divider"></div>
                                                  {!! Form::open([
                                      'method'=>'DELETE',
                                      'url' => [ '/user/role', $role->id],
                                      'style' => 'display:inline'
                                      ]) !!}
                                                  {!! Form::button('<i class="ft-trash"></i> Delete ', array(
                                                  'type' => 'submit',
                                                  'class' => 'dropdown-item',
                                                  'title' => 'Delete the role',
                                                  'onclick'=>'return confirm("Confirm delete?")',
                                                  )) !!}
                                                  {!! Form::close() !!}
                                              </span>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php $index++; ?>
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
