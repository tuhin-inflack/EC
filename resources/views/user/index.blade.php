@extends('layouts.master')
@section('title', 'User list')

@section('content')
    <section id="user-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('usermanagement.user_list_page_title')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url('/system/user/create')}}" class="btn btn-primary btn-sm"><i
                                    class="ft-plus white"></i> {{trans('usermanagement.create_user_button')}}</a>
                            <a href="{{url('/system/user')}}" class="btn btn-warning btn-sm"> <i class="ft-download white"></i></a>

                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered alt-pagination">
                                <thead>
                                <tr>
                                    <th>{{trans('labels.serial')}}</th>
                                    <th>{{trans('labels.name')}}</th>
                                    <th>{{trans('labels.username')}}</th>
                                    <th>{{trans('labels.mobile')}}</th>
                                    <th>{{trans('labels.email_address')}}</th>
                                    <th>{{trans('usermanagement.user_type')}}</th>
                                    <th>{{trans('labels.status')}}</th>
                                    <th>{{trans('labels.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->mobile}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->user_type}}</td>
                                        <td>{{$user->status}}</td>
                                        <td>
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{URL::to( '/system/user/'.$user->id)}}" class="dropdown-item"><i class="ft-eye"></i> {{trans('labels.details')}}</a>
                                                <a href="{{URL::to( '/system/user/'.$user->id.'/edit')}}" class="dropdown-item"><i class="ft-edit-2"></i> {{trans('labels.edit')}}</a>
                                                <div class="dropdown-divider"></div>
                                                  {!! Form::open([
                                                  'method'=>'DELETE',
                                                  'url' => [ '/system/user', $user->id],
                                                  'style' => 'display:inline'
                                                  ]) !!}
                                                  {!! Form::button('<i class="ft-trash"></i> '.trans('labels.delete'), array(
                                                  'type' => 'submit',
                                                  'class' => 'dropdown-item',
                                                  'title' => 'Delete the user',
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
