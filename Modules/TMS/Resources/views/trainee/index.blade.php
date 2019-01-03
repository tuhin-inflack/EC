@extends('tms::layouts.master')
@section('title', 'Trainee list')

@section('content')
    <section id="user-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('tms::training.trainee_card_title')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>

                        <div class="heading-elements">
                            <a href="{{url('/tms/training/create')}}" class="btn btn-primary btn-sm"><i
                                    class="ft-plus white"></i> {{trans('tms::training.create_button')}}</a>
                            <a href="{{url('/system/user')}}" class="btn btn-warning btn-sm"> <i class="ft-download white"></i></a>
                        </div>

                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="card-body">
                                {!! Form::open(['url' =>  '/tms/trainee', 'class' => 'form', 'novalidate', 'method' => 'post']) !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="training_id" class="form-control">
                                                <option value=""> - Select Training -</option>
                                                @foreach($trainings as $key=>$training)
                                                    <option value="{{$training->id}}">{{$training->training_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit" name="search_trainee">Show Trainee</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <table class="table table-striped table-bordered alt-pagination">
                                <thead>
                                <tr>
                                    <th>{{trans('labels.serial')}}</th>
                                    <th>{{trans('tms::training.training_id')}}</th>
                                    <th>{{trans('tms::training.trainee_name')}}</th>
                                    <th>{{trans('tms::training.trainee_gender')}}</th>
                                    <th>{{trans('labels.mobile')}}</th>

                                    <th>{{trans('labels.status')}}</th>
                                    <th>{{trans('labels.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(isset($trainees))
                                    @foreach($trainees as $trainee)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$trainee['trainingId']}}</td>
                                            <td>{{$trainee['trainee_first_name']." ".$trainee['trainee_last_name']}}</td>
                                            <td>{{$trainee['trainee_gender']}}</td>
                                            <td>{{$trainee['mobile']}}</td>
                                            <td>{{($trainee['status'] == 1)? "Active":"Inactive"}}</td>
                                            <td>
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{URL::to( '/tms/trainee/edit/'.$trainee['id'])}}" class="dropdown-item"><i class="ft-edit-2"></i> {{trans('labels.edit')}}</a>
                                                <div class="dropdown-divider"></div>
                                                  {!! Form::open([
                                                  'method'=>'DELETE',
                                                  'url' => [ '/tms/trainee/delete', $trainee['id']],
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
                                    @else
                                    <center><span class="alert alert-info">Choose a Training to show the trainee list</span></center>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
