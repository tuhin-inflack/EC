@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Role Management</div>

                    <div class="card-body">
                        @if(Session::get('message'))
                            <h4>
                                {{Session::get('message')}}
                            </h4>
                        @endif
                        <div class="row">
                            <h3 class="col-md-6">
                                User Role List
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{url( '/user/role/create')}}" class="btn btn-primary waves-effect">
                                    <span>Create New Role</span>
                                </a>
                            </div>
                        </div>
                        @if($roles->isEmpty())
                            <div class="row">
                                <div class="col-md-8 col-md-offset-1"><h4>No Roles Available</h4></div>
                            </div>
                        @else

                            <div class="body table-responsive">
                                <table class="table">
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
                                                <a href="{{URL::to( '/user/role/'.$role->id)}}" class="btn btn-info">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Details
                                                </a>
                                                <a href="{{URL::to( '/user/role/'.$role->id.'/edit')}}" class="btn btn-primary">
                                                    <i class="material-icons" aria-hidden="true">edit</i>&nbsp;Edit</a>
                                                {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => [ '/user/role', $role->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                                {!! Form::button('<i class="material-icons" aria-hidden="true">delete</i> ', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger',
                                                'title' => 'Delete the role',
                                                'onclick'=>'return confirm("Confirm delete?")',
                                                )) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        <?php $index++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
