@extends('tms::layouts.master')
@section('title', 'tms::task.tilte')

@section('content')
    <section id="user-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('tms::training.card_title')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url('/tms/training/create')}}" class="btn btn-primary btn-sm"><i
                                    class="ft-plus white"></i> {{trans('tms::training.create_button')}}</a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered alt-pagination">
                                <thead>
                                <tr>
                                    <th>{{trans('labels.serial')}}</th>
                                    <th>{{trans('tms::training.training_id')}}</th>
                                    <th>{{trans('tms::training.training_name')}}</th>
                                    <th>{{trans('tms::training.training_participant_no')}}</th>
                                    <th>{{trans('tms::training.start_date')}}</th>
                                    <th>{{trans('tms::training.end_date')}}</th>
                                    {{--<th>{{trans('labels.status')}}</th>--}}
                                    <th>{{trans('labels.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($trainings as $training)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><a href="{{route('training.show', ['training_id' => $training->id])}}">{{$training->training_id}}</a></td>
                                        <td><a href="{{route('training.show', ['training_id' => $training->id])}}">{{$training->training_title}}</a></td>
                                        <td>{{$training->no_of_trainee}}</td>
                                        <td>{{$training->start_date}}</td>
                                        <td>{{$training->end_date}}</td>
                                        {{--<td>{{($training->status == 1)? "Active":"Inactive"}}</td>--}}
                                        <td>
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{route('training.show', ['training_id' => $training->id])}}" class="dropdown-item"><i class="ft-eye"></i> {{trans('labels.details')}}</a>
                                                <a href="{{route('training.edit', ['training_id' => $training->id])}}" class="dropdown-item"><i class="ft-edit-2"></i> {{trans('labels.edit')}}</a>
                                                <a href="{{route('trainee.add', ['training_id' => $training->id])}}" class="dropdown-item"><i class="ft-plus"></i> {{trans('tms::training.add_trainee')}}</a>
                                                <a href="{{route('trainee.import', ['training_id' => $training->id])}}" class="dropdown-item"><i class="ft-download"></i> {{trans('tms::training.trainee_import')}}</a>
                                                <div class="dropdown-divider"></div>
                                                  {!! Form::open([
                                                  'method'=>'DELETE',
                                                  'url' => [ '/tms/training', $training->id],
                                                  'style' => 'display:inline'
                                                  ]) !!}
                                                  {!! Form::button('<i class="ft-trash"></i> '.trans('labels.delete'), array(
                                                  'type' => 'submit',
                                                  'class' => 'dropdown-item',
                                                  'title' => 'Delete the training',
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
